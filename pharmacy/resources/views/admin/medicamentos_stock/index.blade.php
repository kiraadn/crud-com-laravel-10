@extends('admin.layouts.app')

@section('title', 'Stock Medicines - GesPharm S.')
@section('content')
    <div class="pagetitle">
        <h1>Stock de Medicamentos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboards.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item"><a class="active" href="{{ route('medicamentos.store') }}">Medicines
                        stock list</a>
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
                            <a href="{{ route('medicamento.create') }}" class="btn btn-primary"> Cadastrar Novo
                                Stock</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome Medicamento</th>
                                        <th scope="col">batch_id</th>
                                        <th scope="col">expiry_date</th>
                                        <th scope="col">quantity</th>
                                        <th scope="col">mrp</th>
                                        <th scope="col">rate</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Update At</th>
                                        <th scope="col">Acções</th>
                                    </tr>
                                </thead>

                                <tbody class="table-group-divider" style="font-size: .95rem">
                                    @foreach ($stocks as $key => $stock)
                                        <tr>
                                            <td scope="row">{{ ++$key }}</td>
                                            <td class="text-success ">{{ $stock->medicamento->name }}</td>
                                            <td>{{ $stock->batch_id }}</td>
                                            <td>{{ date('d-m-Y', strtotime($stock->expiry_date))}}</td>
                                            <td>{{ $stock->quantity }}</td>
                                            <td>{{ $stock->mrp }}</td>
                                            <td>{{ $stock->rate }}</td>
                                            <td>{{ date('d-m-Y H:i:s', strtotime($stock->created_at)) }}</td>
                                            <td>{{ date('d-m-Y H:i:s', strtotime($stock->updated_at)) }}</td>

                                            <td>

                                                <div class="d-flex">
                                                    <a href="{{ route('medicamento.edit', [$stock->id])}}" class="btn btn-success mx-1">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="{{ route('medicamento.destroy', [$stock->id]) }}" method="post">
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
