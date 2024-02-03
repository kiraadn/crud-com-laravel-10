@extends('admin.layouts.app')

@section('title', 'Stock Medicines - GesPharm S.')
@section('content')
    <div class="pagetitle">
        <h1>Editar Entrada de Medicamentos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboards.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item"><a class="active" href="{{ route('medicamento.store') }}">Medicines
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
                        <h5 class="card-title">Ficha de Cadastro de Entrada</h5>

                            @include('admin.medicamentos_stock._form')
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end Main --}}


@endsection
