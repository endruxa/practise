<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Requests\BlogRequestController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(2);
        return view('admin.articles.index', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $category = Category::with('children')->where('parent_id', 0)->get();
        return view('admin.articles.create', [
            'article'    => collect(),
            'categories' => $category,
            'delimiter'  => ''

        ]);
    }

    /**
     * @param BlogRequestController $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogRequestController $request)
    {
        $article = Article::create($request->all());

        //Categories

        if($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::with('children')->where('parent_id', 0)->get();
        return view('admin.articles.edit', [
            'article'    => $article,
            'categories' => $categories,
            'delimiter'  => ''
        ]);
    }

    /**
     * @param BlogRequestController $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BlogRequestController $request, Article $article)
    {
        $article->update($request->except('slug'));

        $article->categories()->detach();
        if($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.article.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->categories()->detach();
        $article->delete();

        return redirect()->route('admin.article.index');

    }
}
