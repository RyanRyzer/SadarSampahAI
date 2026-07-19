<?php

namespace App\Http\Controllers;

use App\Models\Detection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalDetections = Detection::where('user_id', $user->id)->count();

        $averageConfidence = Detection::where('user_id', $user->id)
            ->avg('confidence');

        $averageConfidence = $averageConfidence
            ? round($averageConfidence, 1)
            : 0;

        $lastDetection = Detection::where('user_id', $user->id)
            ->latest()
            ->first();

        return view('profile.index', compact(
            'totalDetections',
            'averageConfidence',
            'lastDetection'
        ));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ],

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048'
            ],

            'current_password' => [
                'nullable'
            ],

            'password' => [
                'nullable',
                'confirmed',
                'min:8'
            ]
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('photo')) {

            if (
                $user->photo &&
                Storage::disk('public')->exists($user->photo)
            ) {
                Storage::disk('public')->delete($user->photo);
            }

            $user->photo = $request
                ->file('photo')
                ->store('profiles', 'public');
        }

        if ($request->filled('password')) {

            if (!Hash::check(
                $request->current_password,
                $user->password
            )) {

                return back()
                    ->withErrors([
                        'current_password' => 'Password lama salah.'
                    ])
                    ->withInput();
            }

            $user->password = Hash::make(
                $request->password
            );
                }

        $user->save();

        return redirect()
            ->route('profile.index')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}