<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\BlogRequestController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(2);

        return view('admin.categories.index', [
            'categories' => $categories
        ]);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $category = Category::with('children')->where('parent_id', 0)->get();

        return view('admin.categories.create', [
            'category'   => collect(),
            'categories' => $category,
            'delimiter'  => ''
        ]);
    }

    /**
     * @param Request $request
     * @return $this
     */

    public function store(Request $request)
    {
            Category::create($request->validate([
                'title' => 'unique:categories|min:3',
            ]));

            return redirect()->route('admin.category.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::with('children')->where('parent_id', 0)->get();
        return view('admin.categories.edit', [
            'category'   => $category,
            'categories' => $categories,
            'delimiter'  => ''
        ]);
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        /*$request->validate([
            'title' => 'unique:categories|min:3',
        ]);*/
        $category->update($request->except('slug'));

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.category.index');
    }
}
