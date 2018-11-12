@extends('layouts.app');
@section('content')

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
    @csrf
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-info">Reset</button>
  </center>
</form>

</div>

@endsection