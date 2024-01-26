@extends('admin.layouts.app')

@section('title', 'Medicines - GesPharm S.')
@section('content')
    <div class="pagetitle">
        <h1>Cadastrar de Medicamentos</h1>
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
                        <h5 class="card-title">Ficha de Cadastro</h5>

                        <form action="{{ route('medicamentos.store') }}" method="post" enctype="multipart/form-data"
                            class="mx-1">
                            @csrf
                            <div class="row mb-3">
                                <div class="has-validation col-sm-6 mb-3">
                                    <label for="nomeProduto" class="col-form-label px-1">Nome do Produto <span
                                            style="color: red">*</span></label>
                                    <input type="text" name="nomeProduto" class="form-control" id="nomeProduto"
                                        placeholder="NOME DO PRODUTO" required>
                                    <div class="invalid-feedback">Por favor, insira um nome válido.</div>
                                </div>

                                <div class="has-validation col-sm-6 mb-3">
                                    <label for="nomeFarmaceutico" class="col-form-label px-1">Nome do Farmeceutico <span
                                            style="color: red">*</span></label>
                                    <input type="text" name="nomeFarmaceutico" class="form-control" id="nomeFarmaceutico"
                                        placeholder="NOME DO FARMACEUTICO" required>
                                    <div class="invalid-feedback">Por favor, insira um nome válido.</div>
                                </div>

                                <div class="has-validation col-sm-4 mb-3">
                                    <label for="preco" class="col-form-label px-1">Preço <span
                                            style="color: red">*</span></label>
                                    <input type="number" name="preco" class="form-control" id="preco"
                                        placeholder="PREÇO DO PRODUTO" required>
                                    <div class="invalid-feedback">Por favor, insira um preco válido.</div>
                                </div>

                                <div class="has-validation col-sm-4 mb-3">
                                    <label for="quantidadeStock" class="col-form-label px-1">Quantidade em Stock <span
                                            style="color: red">*</span></label>
                                    <input type="number" name="quantidadeStock" class="form-control" id="quantidadeStock"
                                        placeholder="QNT. NO ESTOQUE" required>
                                    <div class="invalid-feedback">Por favor, insira uma quantidade válida.</div>
                                </div>

                                <div class="has-validation col-sm-4 mb-3">
                                    <label for="data_entrada" class="col-form-label px-1">Data de Entrada <span
                                            style="color: red">*</span></label>
                                    <input type="date" name="data_entrada" class="form-control" id="data_entrada"
                                        required>
                                    <div class="invalid-feedback">Por favor, insira uma data válida.</div>
                                </div>

                                <div class="has-validation col-sm-4 mb-3">
                                    <label for="data_validade" class="col-form-label px-1">Data de Validade <span
                                            style="color: red">*</span></label>
                                    <input type="date" name="data_validade" class="form-control" id="data_validade"
                                        required>
                                    <div class="invalid-feedback">Por favor, insira uma data válida.</div>
                                </div>


                                <div class="has-validation col-sm-2 mb-3">
                                    <label for="lote" class="col-form-label px-1">Lote <span
                                            style="color: red">*</span></label>
                                    <input type="text" name="lote" class="form-control" id="lote"
                                        placeholder="lote" required>
                                    <div class="invalid-feedback">Por favor, insira um lote válido.</div>
                                </div>


                                <div class="has-validation col-sm-6 mb-3">
                                    <label for="id_fornecedor" class="col-form-label px-1">Fornecedor <span
                                            style="color: red">*</span></label>
                                    <input type="text" name="id_fornecedor" class="form-control" id="id_fornecedor"
                                        placeholder="Fornecedor" required>
                                    <div class="invalid-feedback">Por favor, insira um fornecedor válida.</div>
                                </div>


                                <div class="has-validation col-sm-12 mb-3">
                                    <label for="descricao" class="col-sm-3 col-form-label">Descrição</label>
                                    <textarea name="descricao" id="descricao" class="form-control" cols="20" rows="4"></textarea>
                                </div>

                                {{-- Submit button --}}

                                <div class=" text-center mt-2">
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
