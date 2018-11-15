@extends('layouts.app')

@section('title','Profile Page')
@section('content')
    @foreach($users as $user)
        <form action="{{ route('user.update', $user->id) }}" method="post" style="width:50%;margin-left:25%">
            @csrf
            @method('PATCH')
            <div class="form-group">
            <label>Name Product:</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" value="{{ $user->email }}" class="form-control" readonly>
            </div>
            <center>
            <button type="submit" class="btn btn-primary">Change</button>
        </form>
        <br><br>
        <a href="{{route('password',$user->id)}}" class="btn btn-danger">Change Password</a>
        <a href="{{route('avatar',$user->id)}}" class="btn btn-info">Change Avatar</a>
            </center>
        
    @endforeach
@endsection