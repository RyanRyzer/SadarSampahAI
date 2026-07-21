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

            return view('detection.index', [

                'result' => $result,

                'category' => $category,

                'uploadedImage' => asset(
                    'storage/' . $imagePath
                ),

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