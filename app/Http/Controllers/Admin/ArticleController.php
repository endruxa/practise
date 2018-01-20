<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequestController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ArticleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
        $category = Category::with('children')->where('parent_id', 0)->get();
        return view('admin.articles.create', [
            'article'    => collect(),
            'categories' => $category,
            'delimiter'  => ''

        ]);
    }

    /**
     * @param ArticleRequestController $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequestController $request)
    {
        try{
        $request['user_id'] = \Auth::user()->id;
        $article = Article::create($request->all());
        //Categories
        if($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        DB::commit();
        flash()->success('Новость добавлена');
        }catch (\Exception $e){
            DB::rollBack();
            flash()->danger('Новость не добавлена');
        }
        return redirect()->route('admin.article.index');
    }

    /* public function store(Request $request)
     {
        /* try {
             DB::beginTransaction();*/
            /*$article = dd($request->all());*/
                /*->user()
                ->articles()
                ->create(dd($request->all()));*/
            /*if ($request->input('categories')) : $article->with('categories')
                ->where($request->input('categories'))->save();
            endif;*/

            /*DB::commit();
            flash()->success('Новость добавлена');*/
       /* }catch ( \Exception $e){
            DB::rollBack();
            flash()->danger('Новость не добавлена');*/
     // }

        //return redirect()->route('admin.article.index');
   // }*/

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
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
