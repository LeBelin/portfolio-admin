<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $articleCount = Article::count();

        return view('dashboard', compact('articleCount'));
    }
}
