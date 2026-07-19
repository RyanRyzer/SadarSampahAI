<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Detection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PredictionController extends Controller
{
    public function index()
    {
        return view('detection.index');
    }

    public function predict(Request $request)
    {
        $request->validate([
            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png',
                'max:5120'
            ]
        ]);

        $uploadedImage = $request->file('image');

        $imageName = Str::uuid() . '.' . $uploadedImage->getClientOriginalExtension();

        $imagePath = $uploadedImage->storeAs(
            'detections',
            $imageName,
            'public'
        );

        try {

            $response = Http::timeout(120)
                ->attach(
                    'image',
                    file_get_contents($uploadedImage->getRealPath()),
                    $uploadedImage->getClientOriginalName()
                )
                ->post(env('FLASK_API') . '/predict');

            if (!$response->successful()) {

                Storage::disk('public')->delete($imagePath);

                return back()->withErrors([
                    'ai' => 'Server AI tidak dapat dihubungi.'
                ]);
            }

            $result = $response->json();

            if (!$result['success']) {

                Storage::disk('public')->delete($imagePath);

                return view('detection.index', [
                    'result' => $result
                ]);
            }

            $category = Category::where(
                'name',
                $result['category']
            )->first();

            Detection::create([

                'user_id' => Auth::id(),

                'category_id' => optional($category)->id,

                'image' => $imagePath,

                'confidence' => $result['confidence']

            ]);

            $recommendations = [

                'Plastik' => [

                    'Pisahkan plastik berdasarkan jenisnya sebelum dibuang.',
                    'Cuci plastik agar mudah didaur ulang.',
                    'Setorkan plastik ke bank sampah.',
                    'Gunakan kembali botol plastik jika masih layak.',
                    'Hindari membakar sampah plastik.'

                ],

                'Kertas' => [

                    'Kumpulkan dalam keadaan kering.',
                    'Lipat rapi agar mudah didaur ulang.',
                    'Pisahkan dari sampah basah.',
                    'Gunakan kembali sisi kosong kertas.',
                    'Setorkan ke pengepul.'

                ],

                'Kaca' => [

                    'Bungkus pecahan kaca sebelum dibuang.',
                    'Pisahkan dari sampah organik.',
                    'Masukkan ke wadah khusus kaca.',
                    'Gunakan kembali botol kaca.',
                    'Jangan mencampur kaca pecah dengan plastik.'

                ],

                'Logam' => [

                    'Kaleng dapat dijual ke pengepul.',
                    'Bersihkan logam sebelum didaur ulang.',
                    'Pisahkan berdasarkan jenis logam.',
                    'Jangan dibuang bersama sampah organik.',
                    'Gunakan kembali jika memungkinkan.'

                ],

                'Elektronik' => [

                    'Buang ke tempat e-waste.',
                    'Jangan dibakar.',
                    'Pisahkan baterai dari perangkat.',
                    'Serahkan ke pusat daur ulang elektronik.',
                    'Hindari mencampur dengan sampah rumah tangga.'

                ],
                                'Organik' => [

                    'Olah menjadi kompos.',
                    'Pisahkan dari sampah anorganik.',
                    'Gunakan untuk pupuk tanaman.',
                    'Masukkan ke komposter rumah.',
                    'Jangan dicampur dengan plastik.'

                ],

                'B3' => [

                    'Gunakan tempat sampah khusus B3.',
                    'Jangan dibakar.',
                    'Serahkan ke TPS B3.',
                    'Gunakan APD saat menangani limbah.',
                    'Jauhkan dari jangkauan anak-anak.'

                ]

            ];

            $randomRecommendation = null;

            if ($category) {

                $list = $recommendations[$category->name] ?? [];

                if (count($list) > 0) {

                    $randomRecommendation = $list[array_rand($list)];
                }
            }

            return view('detection.index', [

                'result' => $result,

                'category' => $category,

                'uploadedImage' => asset(
                    'storage/' . $imagePath
                ),

                'recommendation' => $randomRecommendation,

                'topPredictions' => $result['top_predictions'] ?? [],

                'processingTime' => $result['processing_time'] ?? null

            ]);

        } catch (\Exception $e) {

            Storage::disk('public')->delete($imagePath);

            return back()->withErrors([

                'ai' => $e->getMessage()

            ]);
        }
    }
}