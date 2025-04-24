<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        #10/0/2025
        #Validaciones
        $messages = [
            'required' => 'El campo :attribute es requerido',
            'numeric' => 'El campo :attribute debe ser numerico'
        ];
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price'=> 'required|numeric', //['required','numeric'] son sintaxis equivalentes
        ], $messages);

        $product = [
            "name"=> $request->name,
            "description"=> $request->description,
            "price"=> $request->price,
        ];
        Product::create($product);
        return redirect()->route('products.index')->with('success');
        /*$product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save*/


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('products')->where('id', $id)
        ->update(
            ["name"=> $request->name,
            "description"=> $request->description,
            "price"=> $request->price,]);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('products.index');
    }
}
