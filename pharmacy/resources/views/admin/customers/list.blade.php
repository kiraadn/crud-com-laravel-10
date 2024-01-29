@extends('admin.layouts.app')

@section('title', 'Customers - GesPharm S.')
@section('content')
    <div class="pagetitle">
        <h1>Lista de Clientes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboards.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item"><a class="active" href="{{ route('customers.customers') }}">Customer list</a>
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
                        <table class="table table-striped table-hover align-middle datatable">
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

                            <tbody class="table-group-divider" style="font-size: .95rem">
                                @foreach ($customers as $key => $customer)
                                    <tr>
                                        <td scope="row">{{ ++$key }}</td>
                                        <td class="text-success">{{ $customer->nomeCompleto }}</td>
                                        <td>{{ $customer->telefone }}</td>
                                        <td>{{ $customer->endereco }}</td>
                                        <td>{{ $customer->nomeMedico }}</td>
                                        <td>{{ $customer->enderecoMedico }}</td>
                                        <td>
                                            <div style="font-size: 14px;">
                                                {{ date('d-m-y H:i:s', strtotime($customer->created_at)) }}</div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('customers.edit', ['customer' => $customer->id]) }}"
                                                    class="btn btn-success  mx-1">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form id="deleteForm" action="{{ route('customers.destroy', [$customer->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="deleteConfirm(event)">
                                                        <i class="bi bi-trash"></i>
                                                    </button>

                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end Main --}}

    <script>
        window.deleteConfirm = function(e) {
            e.preventDefault();
            var form = e.currentTarget.form;
            Swal.fire({
                title: "Apagar Dados?",
                text: "Uma vez aceite, será impossível reverter esta ação!",
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
        };
    </script>
@endsection
