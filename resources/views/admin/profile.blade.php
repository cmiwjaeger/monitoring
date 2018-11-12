@extends('layouts.app')

@section('title','Profile Page')
@section('description','Please Update Your Avatar')
@section('content')
    @foreach($users as $user)
        <form action="{{ route('user.update', $user->id) }}" method="post">
            @csrf
            @method('PATCH')
            <label>Name Product:</label>
            <input type="text" name="name" value="{{ $user->name }}">
            <label>Value:</label>
            <input type="text" name="email" value="{{ $user->email }}" disabled>
            <label>Value:</label>
            <input type="text" name="email" value="{{ $user->email }}" disabled>
            <button type="submit">Submit</button>
            <button type="reset">Cancel</button>
        </form>
    @endforeach
@endsection