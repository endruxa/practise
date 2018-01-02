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
        $categories = Category::lastCategories(2);
        $articles = Article::lastArticles(2);

        return view('admin.dashboard', [
            'categories' => $categories,
            'articles' => $articles,
            'count_categories' => $categories->count(),
            'count_articles' => $articles->count()
        ]);
    }

}
