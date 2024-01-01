@extends('master')

@section('content')

    <h2>Usuario - {{$user->name}}</h2>

    <div
        class="table-responsive"
    >
        <table
            class="table table-striped table-hover table-borderless table-primary align-middle"
        >
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Cadastrado</th>
                    <th>Actualizado</th>
                    <th>Acções</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr class="table-primary">
                    <td scope="row">{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>
                        <form action="{{ route('users.destroy', ['user'=>$user->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
        <a href="{{ route('users.index')}}"> Voltar</a>

@endsection
