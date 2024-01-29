@if (!empty($medicamento))
    <form action="{{ route('medicamentos.update', [$medicamento->id]) }}" method="post" enctype="multipart/form-data"
        class="mx-1">
        @method('PUT')
    @else
        <form action="{{ route('medicamentos.store') }}" method="post" enctype="multipart/form-data" class="mx-1">
@endif

@csrf

<div class="row mb-3">
    <label for="name" class="col-sm-3 col-form-label">Nome Comercial
        <span style="color: red">*</span>
    </label>
    <div class="col-sm-9">
        <input type="text" name="name" id="descricao"
            value="{{ old('name', !empty($medicamento) ? $medicamento->name : '') }}" class="form-control"
            id="name" required>
    </div>
</div>

<div class="row mb-3">
    <label for="generic_name" class="col-sm-3 col-form-label">Nome Farmeceutico
        <span style="color: red">*</span>
    </label>
    <div class="col-sm-9">
        <input type="text" name="generic_name"
            value="{{ old('generic_name', !empty($medicamento) ? $medicamento->generic_name : '') }}"
            class="form-control" id="generic_name" required>
    </div>
</div>

<div class="row mb-3">
    <label for="packing" class="col-sm-3 col-form-label">Lote
        <span style="color: red">*</span>
    </label>
    <div class="col-sm-9">
        <input type="text" name="packing"
            value="{{ old('packing', !empty($medicamento) ? $medicamento->packing : '') }}" class="form-control"
            id="packing" required>
    </div>
</div>

<div class="row mb-3">
    <label for="nome_fornecedor" class="col-sm-3 col-form-label">Fornecedor
        <span style="color: red">*</span>
    </label>
    <div class="col-sm-9">
        <input type="text" name="nome_fornecedor"
            value="{{ old('nome_fornecedor', !empty($medicamento) ? $medicamento->nome_fornecedor : '') }}"
            class="form-control" id="nome_fornecedor" required>
    </div>
</div>

<div class="row mb-3">
    <label for="data_validade" class="col-sm-3 col-form-label">Data Validade
        <span style="color: red">*</span>
    </label>
    <div class="col-sm-9">
        <input type="date" name="data_validade"
            value="{{ old('data_validade', !empty($medicamento) ? $medicamento->data_validade : '') }}"
            class="form-control" id="data_validade" required>
    </div>
</div>

<div class="row mb-3">
    <label for="descricao" class="col-sm-3 col-form-label">Descrição
    </label>
    <div class="col-sm-9">
        <textarea name="descricao" id="descricao"
            value="{{ old('descricao', !empty($medicamento) ? $medicamento->descricao : '') }}" class="form-control"
            cols="20" rows="4">{{ old('descricao', !empty($medicamento) ? $medicamento->descricao : '') }}</textarea>
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-3 col-form-label"></label>
    <div class="col-sm-9">
        <button type="submit" class="btn btn-primary col-6">Cadastrar</button>
    </div>
</div>

</form>
