@extends('master')

@section('content')

    <h2>Usuarios</h2>

    <ul>
        @foreach ($users as $user)
            <li>{{$user->name}} | <a href="">Edit</a> | <a href="">Delete</a></li>
        @endforeach
    </ul>

@endsection
