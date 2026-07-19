<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Detection;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = Detection::with('category')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(8);

        $totalDetections = Detection::where('user_id', Auth::id())->count();

        $totalCategories = Category::count();

        return view('history.index', compact(
            'histories',
            'totalDetections',
            'totalCategories'
        ));
    }
}