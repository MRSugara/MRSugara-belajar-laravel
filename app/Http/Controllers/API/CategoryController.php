<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
    $category = Category::all();

    return response()->json([
        'status'=>'success',
        'massage'=>'Data ditemukan',
        'data'=>$category,
    ]);

    }
    public function show($id){
    $category = Category::find($id);
    if ($category) {
    return response()->json([
        'status'=>'success',
        'massage'=>'Data ditemukan',
        'data'=>$category,
    ]);
    }else{
    return response()->json([
        'status'=>'error',
        'massage'=>'Data tidak ditemukan',
        'data'=>null,
    ],404);
    }

    }
    public function store(Request $request)
    {
    $validate = Validator::make($request->all(),[
    'name' => 'required|string',
    ]);
    if ($validate->fails()) {
    return response()->json([
        'status'=>'errorr',
        'massage' => 'Data tidak valid',
        'Data' =>null
    ],422);
    }
    $category = Category::create([
        'name'=>$request->name,
    ]);
    return response()->json([
        'status'=>'success',
        'massage' => 'Data telah dibuat',
        'Data' => $category
    ]);

    }
    public function update(Request $request, $id){
    $validate = Validator::make($request->all(),[
    'name' => 'required|string',
    ]);
    if ($validate->fails()) {
    return response()->json([
    'status'=>'errorr',
    'massage' => 'Data tidak valid',
    'Data' =>$validate->errors()
    ],422);
    }
    $categories = Category::where('id',$id)->update([
    'name'=>$request->name,
    ]);

    if ($categories) {
    $category = Category::find($id);
    return response()->json([
    'status'=>'success',
    'massage'=>'Data berhasil di update',
    'data'=>$category
    ]);
    }

    }
    public function destroy($id){
    $category = Category::find($id);
    if (!$category) {
    return response()->json([
    'status'=>'errorr',
    'massage'=>'data tidak ditemukan',
    'data'=>null
    ],422);
    }
    $category->delete();
    return response()->json([
    'status'=>'success',
    'massage'=>'data berhasil dihapus',
    'data'=>null
    ]);
    }
}
