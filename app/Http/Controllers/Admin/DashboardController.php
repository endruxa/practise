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
        $count_categories  = Category::count();
        $count_articles  = Article::count();
        return view('admin.new_app_admin', [
            'categories' => $categories,
            'articles' => $articles,
            'count_categories' => $count_categories,
            'count_articles' => $count_articles
        ]);
    }

}
