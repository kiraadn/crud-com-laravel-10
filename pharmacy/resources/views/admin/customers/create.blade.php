@extends('admin.layouts.app')

@section('title', 'Customers - GesPharm S.')
@section('content')
    <div class="pagetitle">
        <h1>Cadastrar Cliente</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboards.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item ">Dashboard</li>
                <li class="breadcrumb-item "><a class="active" href="{{ route('customers.create') }}">Add Customer</a>
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
                        <h5 class="card-title">Ficha de Cadastro</h5>

                        <form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="nomeCompleto" class="col-sm-3 col-form-label">Nome Completo
                                    <span style="color: red">*</span>
                                </label>
                                <div class="has-validation col-sm-9">
                                    <input type="text" name="nomeCompleto" class="form-control" id="nomeCompleto"
                                        required>
                                    <div class="invalid-feedback">Por favor, insira um nome válido.</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="telefone" class="col-sm-3 col-form-label">Telefone
                                    <span style="color: red">*</span>
                                </label>
                                <div class="has-validation col-sm-9">
                                    <input type="number" name="telefone" class="form-control" id="telefone" required>
                                    <div class="invalid-feedback">Por favor, insira um telefone válido.</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="endereco" class="col-sm-3 col-form-label">Endereço</label>
                                <div class="col-sm-9">
                                    <textarea name="endereco" id="endereco" class="form-control" cols="20" rows="4"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nomeMedico" class="col-sm-3 col-form-label">Nome do Médico
                                    <span style="color: red">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" name="nomeMedico" class="form-control" id="nomeMedico" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="enderecoMedico" class="col-sm-3 col-form-label">Endereço do Médico</label>
                                <div class="col-sm-9">
                                    <textarea  class="form-control" name="enderecoMedico" id="enderecoMedico" cols="20" rows="4"></textarea>
                                </div>
                            </div>

                            {{-- Submit button --}}
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary col-5">Cadastrar</button>
                                </div>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end Main --}}


@endsection
