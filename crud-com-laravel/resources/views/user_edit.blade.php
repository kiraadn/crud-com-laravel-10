@extends('master')

@section('content')

    <h2>Editar Usuario</h2>

    <form action="{{ route('users.update', ['user'=>$user->id])}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT"> {{-- Campo Culto para trabalhar com requisicoes do Tipo PUT --}}
        <!-- @method('PUT') -->
        <input type="text" name="name" id="name" value="{{ $user->name}}" >
        <input type="text" name="email" id="email" value="{{ $user->email}}" >
        <button type="submit">Editar</button>
    </form>

@endsection
