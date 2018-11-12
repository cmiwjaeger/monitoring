@extends('layouts.app');
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
      <th>{{$product['id']}}</th>
      <th>{{$product['nameproduct']}}</th>
      <td>{{$product['value']}}</td>
      <!-- action('PassportController@edit', $product['id']) action('PassportController@destroy', $product['id']) -->
      <td>
      <a href="" class="btn btn-warning">Edit</a>
      
      
      
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

<form action="{{route('product.store')}}" method="POST">
  <div class="form-group">
    <label>Name Product</label>
    <input type="text" class="form-control" name="nameproduct">
  </div>
  <div class="form-group">
    <label>Value</label>
    <input type="text" class="form-control" name="value">
  </div>
    <center>
    {{ csrf_token()}}
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-info">Reset</button>
  </center>
</form>

</div>

@endsection