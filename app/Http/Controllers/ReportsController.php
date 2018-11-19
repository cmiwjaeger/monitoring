<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use PDF;


class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->filter=="good"){
            $products=Product::where('value','>=',70)->simplepaginate();
        }elseif($request->filter=="reject"){
            $products=Product::where('value','<',70)->simplepaginate();
        }else{
            $products=Product::whereNotNull('value')->simplepaginate();
        }
        $products->filter=$request->filter;
        return view('admin.reports.index',compact('products'));
    }

    public function PDFRequest(request $request)
    {
        $reports=$this->poke($request->filter);
        $pdf = PDF::loadView('admin.reports.pdf', compact('reports'));
        return $pdf->download('reports.pdf');
        return view('admin.reports.pdf', compact('reports'));
    }

    public function poke($filter)
    {
        if($filter=="good"){
            $filter=Product::where('value','>=',70)->simplepaginate();
        }elseif($filter=="reject"){
            $filter=Product::where('value','<',70)->simplepaginate();
        }else{
            $filter=Product::whereNotNull('value')->simplepaginate();
        }
        return $filter;
    }

    

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
