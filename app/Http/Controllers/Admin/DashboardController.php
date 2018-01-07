<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //Dashboard
    public function dashboard(){
        $categories = Article::with('categories')->where('id')->get();
        $articles = Category::with('articles')->where('id')->get();

        return view('admin.dashboard', [
            'categories' => $categories,
            'articles' => $articles,
            'count_categories' => $categories->count(),
            'count_articles' => $articles->count()
        ]);
    }

}
