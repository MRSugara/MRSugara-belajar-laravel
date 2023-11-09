<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('product.index', compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $products = Product::create([
            'name'=>$request->name,
            'category_id'=>$request->category,
            'product_code'=>$request->product_code,
            'description'=>$request->description,
            'price'=>$request->price,
            'unit'=>$request->unit,
            'stock'=>$request->stock,
        ]);
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Product::find($id);
        $categories = Category::all();
        return view('product.edit',compact('products','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $products = Product::where( 'id',$id)->update([
            'name'=>$request->name,
            'category_id'=>$request->category,
            'product_code'=>$request->product_code,
            'description'=>$request->description,
            'price'=>$request->price,
            'unit'=>$request->unit,
            'stock'=>$request->stock,
        ]);
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect('/product');
    }
}
