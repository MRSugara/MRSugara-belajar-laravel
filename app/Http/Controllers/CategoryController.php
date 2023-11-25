<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('category.index', compact('category'), ['judul' => 'Category']);
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }
        $category = Category::create([
            'name' => $request->name,
        ]);
        return redirect('/category');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'), ['judul' => 'Category']);
    }
    public function update($id, Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,'.$id.',id',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }

        $category = Category::where('id', $id)->update([
            'name' => $request->name,
        ]);
        return redirect('/category');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category');
    }
}
