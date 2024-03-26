<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'address' => 'required',
            'degree' => 'required',
            'age' => 'required',
        ]);
        $product = new Product();

        $product->email = $request->input("email");
        $product->address = $request->input("address");
        $product->age = $request->input("age");
        $product->degree = $request->input("degree");

        $product->save();
        return response()->json($product);
    }


    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required',
            'address' => 'required',
            'degree' => 'required',
            'age' => 'required',
        ]);
        $product = Product::find($id);

        $product->email = $request->input("email");
        $product->address = $request->input("address");
        $product->age = $request->input("age");
        $product->degree = $request->input("degree");

        $product->save();
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json("Deleted Successfully");
    }
}
