<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('product.index', compact('products', 'categories'), ['judul' => 'Product']);
    }
        public function chart()
    {
        $products = Product::all();
        return view('product.chart',  ['judul' => 'Product']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'), ['judul' => 'Product']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|unique:products,name',
            'category' => 'required',
            'product_code' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'stock' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }
        $imageName = time() . '.' . $request->image->extension();

        Storage::putFileAs('image', $request->image, $imageName);

        $products = Product::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'product_code' => $request->product_code,
            'description' => $request->description,
            'price' => $request->price,
            'unit' => $request->unit,
            'stock' => $request->stock,
            'image' => $imageName,
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
        return view('product.edit', compact('products', 'categories'), ['judul' => 'Product']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'category' => 'required',
            'product_code' => 'required|unique:products,product_code,'. $id.',id',
            'description' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'stock' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }

        if ($request->hasFile('image')) {
            $old_image = Product::find($id)->image;

            Storage::delete('image/' . $old_image);

            $imageName = time() . '.' . $request->image->extension();

            Storage::putFileAs('image', $request->image, $imageName);

            $products = Product::where('id', $id)->update([
                'name' => $request->name,
                'category_id' => $request->category,
                'product_code' => $request->product_code,
                'description' => $request->description,
                'price' => $request->price,
                'unit' => $request->unit,
                'stock' => $request->stock,
                'image' => $imageName,
            ]);
        } else {
            $products = Product::where('id', $id)->update([
                'name' => $request->name,
                'category_id' => $request->category,
                'product_code' => $request->product_code,
                'description' => $request->description,
                'price' => $request->price,
                'unit' => $request->unit,
                'stock' => $request->stock,
            ]);
        }
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
