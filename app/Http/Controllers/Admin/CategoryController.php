<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Requests\BlogRequestController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create', [
            'category'   => collect(),
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * @param BlogRequestController $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(BlogRequestController $request)
    {
        Category::create($request->all());

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
        return view('admin.categories.edit', [
            'category'   => $category,
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param BlogRequestController $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequestController $request, Category $category)
    {
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
