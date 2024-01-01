@extends('master')

@section('content')

    <h2>Cadastrar Usuario</h2>

    @if (session()->has('message'))
        {{ session()->get('message')}}
    @endif

    <form action="{{ route('users.store')}}" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="Your Fullname" >
        <input type="text" name="email" id="email"  placeholder="Your Email">
        <input type="password" name="password" id="password"  placeholder="Your Password">
        <button type="submit">Create</button>
    </form>

@endsection
