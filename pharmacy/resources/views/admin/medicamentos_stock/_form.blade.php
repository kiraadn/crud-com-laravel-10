@if (!empty($stock))
    <form action="{{ route('medicamento.update', [$stock->id]) }}" method="post" enctype="multipart/form-data"
        class="mx-1">
        @method('PUT')
    @else
        <form action="{{ route('medicamento.store') }}" method="post" enctype="multipart/form-data" class="mx-1">
@endif

@csrf

<div class="row mb-3">
    <label for="name" class="col-sm-3 col-form-label">Nome do Medicamento
        <span style="color: red">*</span>
    </label>
    <div class="col-sm-9">
            <select name="id_medicamento" id="id_medicamento" class="form-control">
                <option disabled >Selecione o Nome do Medicamento</option>
                @foreach ($medicamentos as $medicamento )
                    <option {{ ($medicamento->id == $stock->id_medicamento) ? 'selected' : ''}}  value="{{$medicamento->id}}">{{$medicamento->name}}</option>
                    @endforeach
            </select>
    </div>
</div>

@if(!empty($stock->batch_id))

<div class="row mb-3">
    <label for="batch_id" class="col-sm-3 col-form-label">batch_id
    </label>
    <div class="col-sm-9">
        <input type="text" name="batch_id"
            value="{{ old('batch_id', !empty($stock) ? $stock->batch_id : '') }}"
            class="form-control" id="batch_id" required disabled>
    </div>
</div>
@endif

<div class="row mb-3">
    <label for="expiry_date" class="col-sm-3 col-form-label">Expiry_date
        <span style="color: red">*</span>
    </label>
    <div class="col-sm-9">
        <input type="date" name="expiry_date"
            value="{{ old('expiry_date', !empty($stock) ? $stock->expiry_date : '') }}" class="form-control"
            id="expiry_date" required>
    </div>
</div>

<div class="row mb-3">
    <label for="quantity" class="col-sm-3 col-form-label">Quantity
        <span style="color: red">*</span>
    </label>
    <div class="col-sm-9">
        <input type="text" name="quantity"
            value="{{ old('quantity', !empty($stock) ? $stock->quantity : '') }}"
            class="form-control" id="quantity" required>
    </div>
</div>

<div class="row mb-3">
    <label for="mrp" class="col-sm-3 col-form-label">MRP
    </label>
    <div class="col-sm-9">
        <input type="text" name="mrp"
            value="{{ old('mrp', !empty($stock) ? $stock->mrp : '') }}"
            class="form-control" id="mrp" required>
    </div>
</div>

<div class="row mb-3">
    <label for="rate" class="col-sm-3 col-form-label">Rate
    </label>
    <div class="col-sm-9">
        <input type="text" name="rate"
            value="{{ old('rate', !empty($stock) ? $stock->rate : '') }}"
            class="form-control" id="rate" required>
    </div>
</div>




<div class="row mb-3">
    <label class="col-sm-3 col-form-label"></label>
    <div class="col-sm-9">
        <button type="submit" class="btn btn-primary col-6">Cadastrar</button>
    </div>
</div>

</form>
