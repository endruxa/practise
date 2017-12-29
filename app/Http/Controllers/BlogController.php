<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('blog.category', [
            'category' => $category,
            'articles' => $category->articles('published', 1)->paginate(12)
        ]);
    }

    public function article($slug)
    {
        $articles = Article::where('slug', $slug)->first();

        return view('blog.article', [
            'articles' => $articles,
           'category' => $articles->category('published', 1)->paginate(12)
        ]);
    }

}
