@extends('layouts.app')
@section('title','Change Password')
@section('content')

    
    <form action="{{route('changepassword',$user->id)}}" method="post" style="width:50%;margin-left:25%">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Old Password:</label>
            <input type="text" name="old" value="" class="form-control">
        </div>
        <div class="form-group">
            <label>New Password:</label>
            <input type="text" name="new" value="" class="form-control">
        </div>
        <div class="form-group">
            <label>Confirmation Password:</label>
            <input type="text" name="confirmation" value="" class="form-control">
        </div>
        <center>
            <input type="submit" value="Submit" class="btn btn-warning">
            <a href="{{url()->previous()}}" class="btn btn-primary">Cancel</a>
        </center>
    </form>

@endsection