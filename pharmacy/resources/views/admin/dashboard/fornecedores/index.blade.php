@extends('admin.layouts.app')

@section('title', 'Suppliers - GesPharm S.')
@section('content')
    <div class="pagetitle">
        <h1>Lista dos Fornecedores</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboards.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item"><a class="active" href="{{ route('fornecedores.fornecedor') }}">Suppliers
                        list</a>
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
                            <a href="{{ route('fornecedores.create') }}" class="btn btn-primary"> Cadastrar Novo
                                Fornecedor</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome Fornecedor</th>
                                        <th scope="col">Empresa</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col">Endereço</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Update At</th>
                                        <th scope="col">Acções</th>
                                    </tr>
                                </thead>

                                <tbody class="table-group-divider" style="font-size: .95rem">
                                    @foreach ($fornecedores as $key=>$fornecedor )
                                       <tr>
                                            <td scope="row">{{++$key}}</td>
                                            <td class="text-success ">{{$fornecedor->suppliers_name}}</td>
                                            <td>{{$fornecedor->suppliers_company}}</td>
                                            <td>{{$fornecedor->suppliers_email}}</td>
                                            <td>{{$fornecedor->contact_number}}</td>
                                            <td>{{$fornecedor->celphone}}</td>
                                            <td>{{$fornecedor->address}}</td>
                                            <td>{{ date('d-m-Y H:i:s', strtotime($fornecedor->created_at)) }}</td>
                                            <td>{{ date('d-m-Y H:i:s', strtotime($fornecedor->updated_at)) }}</td>

                                            <td>

                                                <div class="d-flex">
                                                    <a href="{{ route('fornecedores.edit', [$fornecedor->id])}}" class="btn btn-success  mx-1">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="{{ route('fornecedores.destroy', [$fornecedor->id]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="deleteConfirm(event)">
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
