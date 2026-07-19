<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Detection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalDetections = Detection::where('user_id', $userId)->count();

        $totalCategories = Category::count();

        $averageConfidence = Detection::where('user_id', $userId)
            ->avg('confidence');

        $averageConfidence = $averageConfidence
            ? round($averageConfidence, 2)
            : 0;

        $weeklyDetections = Detection::where('user_id', $userId)
            ->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
            ->count();

        $favoriteCategory = Detection::select(
                'categories.name',
                DB::raw('COUNT(*) as total')
            )
            ->join('categories', 'detections.category_id', '=', 'categories.id')
            ->where('detections.user_id', $userId)
            ->groupBy('categories.name')
            ->orderByDesc('total')
            ->first();

        return view('dashboard.index', [
            'totalDetections'   => $totalDetections,
            'totalCategories'   => $totalCategories,
            'averageConfidence' => $averageConfidence,
            'weeklyDetections'  => $weeklyDetections,
            'favoriteCategory'  => $favoriteCategory
        ]);
    }
}