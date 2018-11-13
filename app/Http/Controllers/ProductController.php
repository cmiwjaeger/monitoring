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
        $products=\App\Product::all();
        return view('admin.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=\App\Product::all();
        return view('admin.product')
        ->with('products',$products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }
        $product= new \App\Product;
        $product->nameproduct=$request->get('nameproduct');
        $product->value=$request->get('value');
        // $product->number=$request->get('number');
        // $date=date_create($request->get('date'));
        // $format = date_format($date,"Y-m-d");
        // $product->date = strtotime($format);
        // $product->office=$request->get('office');
        // $product->filename=$name;
        $product->save();
        
        return redirect('product')->with('success', 'Information has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
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
        return view('admin.edit', compact('product'));
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
        $product->value = $request->value;
        $product->save();
        return redirect()->route('user.index')->with('alert-success', 'Data berhasil diubah!');
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
