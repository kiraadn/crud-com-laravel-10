@extends('admin.layouts.app')

@section('title', 'Suppliers  - GesPharm S.')
@section('content')
    <div class="pagetitle">
        <h1>Cadastrar Fornecedor</h1>
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
                        <h5 class="card-title">Ficha de Cadastro</h5>

                        <form action="{{ route('fornecedores.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="suppliers_name" class="col-sm-3 col-form-label">Nome Completo
                                    <span style="color: red">*</span>
                                </label>
                                <div class="has-validation col-sm-9">
                                    <input type="text" name="suppliers_name" class="form-control" id="suppliers_name"
                                        required>
                                    <div class="invalid-feedback">Por favor, insira um nome válido.</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="suppliers_company" class="col-sm-3 col-form-label">Nome da Empresa</label>
                                <div class="has-validation col-sm-9">
                                    <input type="text" name="suppliers_company" class="form-control" id="suppliers_company">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="suppliers_email" class="col-sm-3 col-form-label">Email
                                    <span style="color: red">*</span>
                                </label>
                                <div class="has-validation col-sm-9">
                                    <input type="email" name="suppliers_email" class="form-control" id="suppliers_email" required>
                                    <div class="invalid-feedback">Por favor, insira um email válido.</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="contact_number" class="col-sm-3 col-form-label">Telefone
                                    <span style="color: red">*</span>
                                </label>
                                <div class="has-validation col-sm-9">
                                    <input type="number" name="contact_number" class="form-control" id="contact_number" required>
                                    <div class="invalid-feedback">Por favor, insira um telefone válido.</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="celphone " class="col-sm-3 col-form-label">Celular
                                </label>
                                <div class="has-validation col-sm-9">
                                    <input type="number" name="celphone" class="form-control" id="celphone" required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="address" class="col-sm-3 col-form-label">Endereço
                                    <span style="color: red">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" name="address" class="form-control" id="address" required>
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
