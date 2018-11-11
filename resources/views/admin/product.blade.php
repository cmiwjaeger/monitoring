@extends('layouts.app');
@section('content')
<div class="container">

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

<form action="/createProduct" action="POST">
  <div class="form-group">
    <label>Name Product</label>
    <input type="text" class="form-control" name="nameproduct">
  </div>
  <div class="form-group">
    <label>Value</label>
    <input type="text" class="form-control" name="value">
  </div>
    <center>
  <button type="submit" class="btn btn-primary">Sign in</button>
  <button type="reset" class="btn btn-info">Reset</button>
  </center>
</form>

</div>

@endsection