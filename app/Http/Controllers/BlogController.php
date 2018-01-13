<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
class BlogController extends Controller
{
    public function category($slug)
    {
      $category = Category::where('slug', $slug)->firstOrFail();
      $articles = $category->articles('published', 1)->paginate(2);
      return view('blog.category', [
            'category' => $category,
            'articles' => $articles
        ]);
    }

    public function article($slug)
    {
       $article = Article::where('slug', $slug)->firstOrFail();

       return view('blog.article', [
           'article' => $article
       ]);
    }

    public function index()
    {
        $categories = Category::all();

        return view('layouts._header',
            [
               'categories' => $categories

            ]);
    }

}
