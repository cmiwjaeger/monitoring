@extends('layouts.app')
@section('title','Production')
@section('content')
<div class="container">

<table class="table ml-auto mr-auto" style="width:80%;">
  <thead class="thead-dark text-center">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Supplier Name</th>
      <th scope="col">Quantity</th>
      <th scope="col"><center>Handler</center></th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $product)
    <tr>
      <th class="text-center">{{$product['idproduct']}}</th>
      <th >{{$product['nameproduct']}}</th>
      <td class="text-center">{{$product['namesupplier']}}</td>
      <td class="text-center">{{$product['quantity']}}</td>
      <td>
      <center>
          <form action="{{ action('ProductController@destroy', $product->idproduct) }}" method="post">
            <a href="{{ action('ProductController@edit', $product->idproduct) }}" class="btn btn-primary">Give Value</a>
            <a href="{{ action('ProductController@edit', $product->idproduct) }}" class="btn btn-warning">Edit</a>
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
      </center>
        </td>
    </tr>
  @endforeach
  </tbody>
</table>
<center>
  <a href="{{route('product.create')}}" class="btn btn-info">Add</a>
</center>
@endsection