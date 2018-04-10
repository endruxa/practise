<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
class BlogController extends Controller
{
    public function category($slug)
    {
      if($category = Category::where('slug', $slug)->first()){
      $articles = $category->articles()->where('published', 1)->paginate(5);
      return view('blog.category', [
            'category' => $category,
            'articles' => $articles
        ]);
      }
      abort(404);
    }

    public function article($slug)
    {
       if($article = Article::where('slug', $slug)->first()){
           return view('blog.article', [
               'article' => $article
           ]);
       }
       abort(404);
    }
}
