@extends('layouts.app')
@section('content')
<div class="container">

<table class="table ml-auto mr-auto" style="width:80%;">
  <thead class="thead-dark text-center">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Date</th>
      <th scope="col">Product Name</th>
      <th scope="col">Supplier Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Value</th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $product)
    <tr>
      <th class="text-center">{{$product['idproduct']}}</th>
      <th class="text-center">{{$product['created_at']}}</th>
      <th>{{$product['nameproduct']}}</th>
      <td class="text-center">{{$product['namesupplier']}}</td>
      <td class="text-center">{{$product['quantity']}}</td>
      <td class="text-center">{{$product['value']}}</td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection