
@extends('layouts.auth')

@section('title', 'Reset Password - Pharmacy M.S')

@section('content')
    <div class="card-body">

        <div class="pt-4 pb-2">

            @include('_message')

            <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
            <p class="text-center small">Insira a nova senha e conrfirma</p>
        </div>

        <form method="POST" action="{{ url('reset/'.$token)}}" class="row g-3 needs-validation" novalidate>
            {{csrf_field()}}
            <div class="col-12">
                <label for="password" class="form-label">Nova Senha</label>
                <div class="input-group has-validation">
                    <input type="password" name="password" class="form-control" id="password" required value="{{ old('password') }}">
                    <span style="color: red"> {{ $errors->first('password')}}</span>
                    <div class="invalid-feedback">Por favor, insira sua nova senha.</div>
                </div>
            </div>

            <div class="col-12">
                <label for="confirm_password" class="form-label">Confirmar Senha</label>
                <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
                <span style="color: red"> {{ $errors->first('confirm_password')}}</span>
                <div class="invalid-feedback">Por favor, confirma sua senha.</div>
            </div>


            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Reset</button>
            </div>

        </form>

    </div>
@endsection
