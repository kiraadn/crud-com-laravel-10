@extends('admin.layouts.app')

@section('title', 'Medicines - GesPharm S.')
@section('content')
    <div class="pagetitle">
        <h1>Lista de Medicamentos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboards.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item"><a class="active" href="{{ route('medicamentos.medicamentos') }}">Medicines
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
                            <a href="{{ route('medicamentos.create') }}" class="btn btn-primary"> Cadastrar Novo
                                Medicamento</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Nome Famaceutico</th>
                                        <th scope="col">Lote</th>
                                        <th scope="col">Fornecedor</th>
                                        <th scope="col">Validade</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Update At</th>
                                        <th scope="col">Acções</th>
                                    </tr>
                                </thead>

                                <tbody class="table-group-divider" style="font-size: .95rem">
                                    @foreach ($medicamentos as $key => $medicamento)
                                        <tr>
                                            <td scope="row">{{ ++$key }}</td>
                                            <td class="text-success ">{{ $medicamento->name }}</td>
                                            <td>{{ $medicamento->generic_name }}</td>
                                            <td>{{ $medicamento->packing }}</td>
                                            <td>{{ $medicamento->nome_fornecedor }}</td>
                                            <td>{{ $medicamento->data_validade }}</td>
                                            <td>{{ $medicamento->descricao }}</td>
                                            <td>{{ $medicamento->created_at }}</td>
                                            <td>{{ $medicamento->updated_at }}</td>
                                            <td>

                                                <div class="d-flex">
                                                    <a href="{{ route('medicamentos.edit', [$medicamento->id])}}" class="btn btn-success  mx-1">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="{{ route('medicamentos.destroy', [$medicamento->id]) }}" method="post">
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
