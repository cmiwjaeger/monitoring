@extends('layouts.app')
@section('title','Avatar')
@section('content')
<div class="container">
    <div class="card" style="width: 18rem;margin-left:auto;margin-right:auto;">
        @if($user->avatar==NULL)
            <img class="card-img-top" src="{{asset('avatars/no-profile.png')}}" alt="">
        @else
            <img class="card-img-top" src="{{asset('avatars/'.$user->email.'/'.$user->avatar)}}" alt="" style="width:100%;height:300px;">
        @endif
        <div class="card-body">
            <h5 class="card-title"><center>{{Auth::user()->name}}</center></h5>
            <form action="{{route('changeavatar',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <center><input type="file" class="btn btn-info" style="width:200px;margin-bottom:25px" name="avatar">
                <input type="submit" value="Change" class="btn btn-warning">
                <a href="{{route('removeAvatar',$user->id)}}" class="btn btn-danger">Remove</a>
                <a href="{{url()->previous()}}" class="btn btn-primary">Cancel</a>
                </center>
            </form>
        </div>
    </div>
</div>
@endsection