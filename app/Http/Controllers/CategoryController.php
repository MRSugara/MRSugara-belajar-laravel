<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('category.index',compact('category'));
    }
    public function create(){
        return view('category.create');
    }
    public function store(Request $request){
        $category = Category::create([
            'name'=>$request->name
        ]);
        return redirect('/category');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }
    public function update($id, Request $request){
        $category = Category::where('id', $id)->update([
            'name'=>$request->name
        ]);
        return redirect('/category');
    }
    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('/category');
    }
}
