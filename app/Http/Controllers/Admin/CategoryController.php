<?php

namespace App\Http\Controllers\Admin;

use App\Category;;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin.categories.index', [
            'categories' => $categories
        ]);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
                                                               //Get parent category
        $categories = Category::with('children')->where('parent_id', 0)->get();

        return view('admin.categories.create', [
            'category'   => collect(),
            'categories' => $categories,
            'delimiter'  => ''                                //элемент вложенности категорий
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        try{
            $this->validate($request, [
                'title'     => 'required|string|min:4|max:20',
                'parent_id' => 'integer',
                'published' => 'integer'
            ]);

            DB::beginTransaction();
            Category::create($request->all());
            DB::commit();
            \session()->flash('success', 'Категория  успешно добавлена!');
        }catch (\Exception $e){
            DB::rollBack();
            \session()->flash('error', 'Категория не добавлена!');
            return back()->withInput()->withErrors($e->getMessage());
        }
        return redirect()->route('category.index');
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
        try{
            $this->validate($request, [
                'title'     => 'required|string|min:4|max:20',
                'parent_id' => 'integer',
                'published' => 'integer'
            ]);

        $category->update($request->except('slug'));

        \session()->flash('success', 'Категория успешно отредактирована');

        }catch (\Exception $e){

        \session()->flash('error', $e->getMessage());
        return back()->withInput();
        }
        return redirect()->route('category.index');
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

        return redirect()->route('category.index');
    }
}
