<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Requests\StoreProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $product = new Product();
        $this->saveFormValues($request, $product);
        return redirect('/admin/product')->with('success', 'Product "' . $product->name . '" has been successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->saveFormValues($request, $product);
        return redirect('/admin/product')->with('success', 'Product "' . $product->name . '" has been successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $name = $product->name;
        $product->delete();
        return redirect('/admin/product')->with('success', 'Product "' . $name . '" has been successfully deleted!');
    }

    public function saveFormValues(StoreProduct $request, Product $product)
    {
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->cat_id;

        $file = $request->file('img');
        if ($file) {
            $fName = trim(strval(time())) . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fName);
            $product->img = '/uploads/' . $fName;
        }

        $product->save();
    }

    function objectToarray($data)
    {
        $array = (array)$data;
        foreach ($array as $key => &$field) {
            if (is_object($field)) $field = $this->objectToarray($field);
        }
        return $array;
    }
}
