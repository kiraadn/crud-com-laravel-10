@extends('admin.layouts.app')

@section('title', 'Medicines - GesPharm S.')
@section('content')
    <div class="pagetitle">
        <h1>Editar dados de Medicamento</h1>
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
                        <h5 class="card-title">Editar Cadastro</h5>

                            @include('admin.medicamentos._form')
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end Main --}}


@endsection
