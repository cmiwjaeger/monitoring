@extends('layouts.app')
@section('title','Production')
@section('content')
<div class="container">

<table class="table ml-auto mr-auto">
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
          <form action="{{ action('ProductController@showvalue', $product->idproduct) }}" method="post" style="margin-bottom:5px;">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <input name="idproduct" type="hidden" value="{{$product->idproduct}}">
            <button class="btn btn-primary" type="submit">Value</button>
            <a href="{{ action('ProductController@edit', $product->idproduct) }}" class="btn btn-warning">Edit</a>
          </form>
          
          <form action="{{ action('ProductController@destroy', $product->idproduct) }}" method="post">
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
<div class="ml-auto">
  {{$products->links()}}
</div>
<center>
  <a href="{{route('product.create')}}" class="btn btn-info">Add</a>
</center>
@endsection