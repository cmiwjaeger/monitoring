@extends('layouts.app')
@section('content')
<div class="container">

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Value</th>
      <th colspan="2"><center>Handler</center></th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $product)
    <tr>
      <th>{{$product['idproduct']}}</th>
      <th>{{$product['nameproduct']}}</th>
      <td>{{$product['value']}}</td>
      <!--  action('PassportController@destroy', $product['id']) -->
      <td>
        <a href="{{ action('ProductController@edit', $product->idproduct) }}" class="btn btn-warning">Edit</a>
      </td>
      <td>
          <form action="product.destroy" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
    </tr>
  @endforeach
  </tbody>
</table>
<center>
  <a href="{{route('product.create')}}" class="btn btn-info">Add</a>
</center>
@endsection