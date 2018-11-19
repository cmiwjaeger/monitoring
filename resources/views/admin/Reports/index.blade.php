@extends('layouts.app')
@section('title','Reports')
@section('content')
<div class="container">
<form action="{{url('/reports')}}">
  <div class="input-group mb-2 w-25 ml-auto">
    <div class="input-group-prepend">
      <label class="input-group-text">Filter</label>
    </div>
    <select class="custom-select" id="inputGroupSelect01" name="filter" onChange="document.getElementById('demo').innerHTML=Date()">
      <option selected>Choose...</option>
      <option value="no-filter">No-Filter</option>
      <option value="good">Good</option>
      <option value="reject">Reject</option>
    </select>
  <button class="btn" type="submit" name="src">Search</button>
  </div>
</form>


<table class="table ml-auto mr-auto">
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

<form action="{{route('post')}}" method="post">
  <input type="hidden" name="id" value="$products">
  <button type="submit" class="btn btn-primary">Print Reports @csrf</button>
</form>

@endsection