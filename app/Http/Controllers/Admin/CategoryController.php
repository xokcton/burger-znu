<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\StoreCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        $category = new Category();
        $this->saveFormValues($request, $category);
        return redirect('/admin/category')->with('success', 'Category "' . $category->name . '" has been successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategory $request, $id)
    {
        $category = Category::findOrFail($id);
        $this->saveFormValues($request, $category);
        return redirect('/admin/category')->with('success', 'Category "' . $category->name . '" has been successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $name = $category->name;
        $category->delete();
        return redirect('/admin/category')->with('success', 'Category "' . $name . '" has been successfully deleted!');
    }

    public function saveFormValues(StoreCategory $request, Category $category)
    {
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->text = $request->text;

        $file = $request->file('img');
        if ($file) {
            $fName = trim(strval(time())) . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fName);
            $category->img = '/uploads/' . $fName;
        }

        $category->save();
    }
}
