<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();

        return response()->json([
        'status'=>'success',
        'massage'=>'Data ditemukan',
        'data'=>$product,
        ]);

    }
    public function show($id){
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'status'=>'success',
                'massage'=>'Data ditemukan',
                'data'=>$product,
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
            'category_id' => 'required',
            'product_code' => 'required|unique:products,product_code,',
            'description' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'stock' => 'required',
            ]);
            if ($validate->fails()) {
                return response()->json([
                    'status'=>'errorr',
                    'massage' => 'Data tidak valid',
                    'Data' =>null
                ],422);
            }
        $products = Product::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'product_code'=>$request->product_code,
            'description'=>$request->description,
            'price'=>$request->price,
            'unit'=>$request->unit,
            'stock'=>$request->stock
        ]);
        return response()->json([
            'status'=>'success',
            'massage' => 'Data telah dibuat',
            'Data' => $products
        ]);

    }
    public function update(Request $request, $id){
        $validate = Validator::make($request->all(),[
            'name' => 'required|string',
            'category_id' => 'required',
            'product_code' => 'required|unique:products,product_code,'. $id.',id',
            'description' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'stock' => 'required',
        ]);
        if ($validate->fails()) {
            return response()->json([
            'status'=>'errorr',
            'massage' => 'Data tidak valid',
            'Data' =>$validate->errors()
            ],422);
        }
        $products = Product::where('id',$id)->update([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'product_code'=>$request->product_code,
            'description'=>$request->description,
            'price'=>$request->price,
            'unit'=>$request->unit,
            'stock'=>$request->stock
        ]);

        if ($products) {
            $product = Product::find($id);
            return response()->json([
                'status'=>'success',
                'massage'=>'Data berhasil di update',
                'data'=>$product
            ]);
        }

    }
    public function destroy($id){
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
            'status'=>'errorr',
            'massage'=>'data tidak ditemukan',
            'data'=>null
            ],422);
        }
        $product->delete();
        return response()->json([
            'status'=>'success',
            'massage'=>'data berhasil dihapus',
            'data'=>null
        ]);
    }
}
