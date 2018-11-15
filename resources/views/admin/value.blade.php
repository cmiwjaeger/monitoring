@extends('layouts.app')
@section('content')
    <div class="container" style="padding-left:25%;padding-right:25%;">
        <div class="ml-auto mr-auto">
        <form action="{{ route('updatevalue', $product->idproduct) }}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="idproduct" value="{{ $product->idproduct }}" readonly>
            <div class="form-group">
                <label>Name Product:</label>
                <input type="text" class="form-control" name="nameproduct" value="{{ $product->nameproduct }}" readonly>
            </div>
            <div class="form-group">
                <label>Name Supplier:</label>
                <input type="text" class="form-control" name="namesupplier" value="{{ $product->namesupplier }}" readonly>
            </div>
            <div class="form-group">
                <label>Quantity:</label>
                <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}" readonly>
            </div>
            <hr >
            <div class="form-group">
                <label>Quality:</label>
                <input type="text" class="form-control" name="quality" placeholder="Value>50=Good | Value<50=Bad">
            </div>
            <center>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-warning">Cancel</button>
            </center>
        </form>
    </div>
@endsection