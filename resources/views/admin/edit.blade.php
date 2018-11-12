@extends('layouts.app')
@section('content')
    @foreach($product as $prod)
        <form action="{{ route('product.update', $prod->idproduct) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <label>Name Product:</label>
            <input type="text" name="nama" value="{{ $prod->nameproduct }}">
            <label>Value:</label>
            <input type="text" name="value" value="{{ $prod->value }}">
            <button type="submit">Submit</button>
            <button type="reset">Cancel</button>
        </form>
    @endforeach
@endsection