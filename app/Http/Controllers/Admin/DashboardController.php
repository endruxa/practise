<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //Dashboard
    public function dashboard($categories, $articles){
        $categories = Category::whereIn('id', []);
        $articles = Article::lastArticles('id', []);

        return view('admin.dashboard', [
            'categories' => $categories,
            'articles' => $articles,
            'count_categories' => Category::count(),
            'count_articles' => Article::count()
        ]);
    }

}
