<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequestController;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use DB;
use Illuminate\Session;
use App\Http\Controllers\Admin\AdminUploadImages;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.articles.index', [
            'articles' => $articles
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if(Gate::denies('create-article'))
        {
            return redirect()->back()->with(['messge' => 'У Вас нет прав!']);
        }
        $categories = Category::with('children')->where('parent_id', 0)->get();
        return view('admin.articles.create', [
            'article'    => collect(),
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
        try {
            DB::beginTransaction();
            /*$request['user_id'] = $request->user()->id;*/
            $article = Article::create($request->all());
            //Categories
            if($request->input('categories')) : $article->categories()->attach(($request->input('categories')));
            endif;

            DB::commit();
            \session()->flash('success', 'Новость успешно добавлена!');
        }catch ( \Exception $e){

            DB::rollBack();
            \session()->flash('error', 'Новость не добавлена!');

            return back()->withInput();
        }
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
     * @param ArticleRequestController $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleRequestController $request, Article $article)
    {
        try{
        $article->update($request->except('slug'));
        $article->categories()->detach();
        //Categories
        if($request->input('categories')) : $article->categories()->attach($request->input('categories'));
        endif;
        \session()->flash('success', 'Новость успешно отредактирована');
        }catch (\Exception $e)
        {
            \session()->flash('error', 'Ошибка редактирования');
            return back()->withInput();
        }
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
