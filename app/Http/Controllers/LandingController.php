<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();
        $products = Product::all();
        if ($request->category) {
            $product = Product::with('category')->whereHas('category', function($query)use($request){
                $query->where('name',$request->category);
            })->get();
        }else {
            $product = Product::inRandomOrder()->get();
        }
        return view('landing.landing', compact('categories','products','product'));
    }
}
