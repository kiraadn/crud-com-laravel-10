@extends('admin.layouts.app')

@section('title', 'Medicines - GesPharm S.')
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
                            <a href="{{ route('medicamentos.store_stock') }}" class="btn btn-primary"> Cadastrar Novo
                                Medicamento</a>
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
