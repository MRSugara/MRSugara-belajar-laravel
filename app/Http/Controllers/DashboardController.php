<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all()->count();
        $category = Category::all()->count();
        $price = Product::sum('price');
        $stock = Product::sum('stock');
        $categories = Category::with('products')->get();
        return view('index', compact('products', 'category', 'price', 'stock','categories'), ['judul' =>
        'Dashboard']);
    }
}
