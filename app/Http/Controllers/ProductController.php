<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::where('value',NULL)->paginate(5);
        return view('admin.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all();
        return view('admin.Product.product')->with('products',$products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create(request()->all());
        return redirect()->route('product.index')->with('sucMsg', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function showvalue(product $product,request $request)
    {
        $product = Product::where('idproduct', $request->idproduct)->first();
        return view('admin.Product.value', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $product = Product::where('idproduct', $product->idproduct)->get();
        return view('admin.Product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $product = Product::where('idproduct', $product->idproduct)->first();
        $product->nameproduct = $request->nameproduct;
        $product->namesupplier = $request->namesupplier;
        $product->quantity = $request->quantity;
        $product->save();
        return redirect()->route('product.index')->with('sucMsg', 'Data berhasil diubah!');
    }

    public function updatevalue(Request $request, product $product)
    {
        $product = Product::where('idproduct', $request->idproduct)->first();
        $product->value = $request->quality;
        $product->save();
        return redirect()->route('product.index')->with('sucMsg', 'Value berhasil ditambahkan, data telah masuk reports!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product=product::where('idproduct',$product->idproduct)->firstOrFail();
        $product->delete();
        return redirect()->route('product.index');
    }
}
