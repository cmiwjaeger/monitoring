@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card" style="width: 18rem;margin-left:auto;margin-right:auto;">
        <img class="card-img-top" src="{{asset('avatars/no-profile.png')}}" alt="">
        <div class="card-body">
            <h5 class="card-title"><center>{{Auth::user()->name}}</center></h5>
            <center><a href="#" class="btn btn-primary" style=>Change Avatar</a></center>
        </div>
    </div>
</div>
@endsection