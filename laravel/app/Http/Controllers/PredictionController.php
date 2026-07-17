<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Detection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PredictionController extends Controller
{
    public function index()
    {
        return view('detection.index');
    }

    public function predict(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:5120'
        ]);

        try {

            $image = $request->file('image');

            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->storeAs(
                'detections',
                $imageName,
                'public'
            );

            $response = Http::timeout(120)
                ->attach(
                    'image',
                    file_get_contents($image->getRealPath()),
                    $image->getClientOriginalName()
                )
                ->post(env('FLASK_API') . '/predict');

            if (!$response->successful()) {

                return back()->withErrors([
                    'ai' => 'AI Server tidak dapat dihubungi.'
                ]);

            }

            $result = $response->json();

            $category = null;

            if (
                isset($result['success']) &&
                $result['success'] &&
                isset($result['category'])
            ) {

                $category = Category::where(
                    'name',
                    $result['category']
                )->first();

                if ($category) {

                    Detection::create([
                        'user_id' => Auth::id(),
                        'category_id' => $category->id,
                        'image' => 'detections/' . $imageName,
                        'confidence' => $result['confidence']
                    ]);

                }

            }

            return view('detection.index', [
                'result' => $result,
                'category' => $category
            ]);

        } catch (\Exception $e) {

            return back()->withErrors([
                'ai' => 'Terjadi kesalahan saat memproses gambar.'
            ]);

        }
    }
}