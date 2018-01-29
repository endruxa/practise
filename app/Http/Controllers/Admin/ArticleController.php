<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequestController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Session;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::with('children')->where('parent_id', 0)->get();
        return view('admin.articles.create', [
            'article'    => [],
            'categories' => $categories,
            'delimiter'  => ''

        ]);
    }

    /**
     * @param ArticleRequestController $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequestController $request)
    {
        $categoryIds = $request->get('category_id');
        try {
            DB::beginTransaction();

            $article = $request->
            user()
            ->articles()
            ->create($request->all());
            $article->categories()->attach($categoryIds);
            //Categories
            if($request->input('categories')) : $article->categories()->attach(dd($request->input('categories')));
            endif;
            DB::commit();
            \session()->flash('success', 'Новость успешно добавлена!');
        }catch ( \Exception $e){
            DB::rollBack();
            \session()->flash('error', 'Новость не добавлена!');
        }
        return redirect()->route('admin.index');
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
     * @param ArticleRequestController $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleRequestController $request, Article $article)
    {
        $article->update($request->except('slug'));

        if($request->input('categories')) : $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.index');

    }
}
