<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //Dashboard
    public function dashboard(){
        $categories = Category::lastCategories(5);
        $articles = Article::lastArticles(5);

        return view('admin.layouts.dashboard', [
            'categories' => $categories,
            'articles' => $articles,
            'count_categories' => $categories->count(),
            'count_articles' => $articles->count()
        ]);
    }

}
