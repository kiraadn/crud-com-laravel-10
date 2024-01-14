@extends('admin.layouts.app')

@section('title', 'Customers - GesPharm S.')
@section('content')
    <div class="pagetitle">
        <h1>Lista de Clientes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboards.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item ">Dashboard</li>
                <li class="breadcrumb-item "><a class="active" href="{{ route('customers.customers') }}">Customer list</a>
                </li>
            </ol>
        </nav>
    </div>
    {{-- End Page Title --}}
    {{-- Main --}}
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <a href="{{ route('customers.create') }}" class="btn btn-primary"> Cadastrar Novo
                                Cliente</a>
                        </div>
                        <div class="table-responsive mt-4">
                            <table class="table datatable table-striped table-hover  align-middle">
                                <thead>

                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">Endereço</th>
                                        <th scope="col">Nome Médico</th>
                                        <th scope="col">Endereço do Médico</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Acções</th>
                                    </tr>

                                </thead>

                                <tbody class="table-group-divider">
                                    @foreach ($customers as $key => $customer)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td scope="row">{{ $customer->nomeCompleto }}</td>
                                            <td scope="row">{{ $customer->telefone }}</td>
                                            <td scope="row">{{ $customer->endereco }}</td>
                                            <td scope="row">{{ $customer->nomeMedico }}</td>
                                            <td scope="row">{{ $customer->enderecoMedico }}</td>
                                            <td scope="row">{{ date('d-m-y H:i:s', strtotime($customer->created_at)) }}
                                            </td>
                                            <td scope="row" class="">
                                                <a href="{{ route('customers.edit', ['customer' => $customer->id]) }}"
                                                    class="btn btn-success">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{ route('customers.destroy', $customer->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a type="submit" class="btn btn-danger" onclick="deleteConfirm(event)">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end Main --}}

    <script>
        window.deleteConfirm = function(e) {
            e.preventDefault();
            var form = e.target.form;
            Swal.fire({
                title: "Apagar Dados?",
                text: "Uma vez aceite, será impossivel reverter esta acção!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim, apagar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>

@endsection
