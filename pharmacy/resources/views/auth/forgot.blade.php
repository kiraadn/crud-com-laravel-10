@extends('layouts.auth')

@section('title', 'Forgot - Pharmacy M.S')

@section('content')
    <div class="card-body">

        <div class="pt-4 pb-1">
            <h5 class="card-title text-center pb-0 fs-4">Recuperar Minha Senha</h5>
            <p class="text-center small">Insira seu email para login</p>
        </div>

        <form class="row g-3 needs-validation" novalidate>

            <div class="col-12">
                <label for="yourEmail" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="email" name="email" class="form-control" id="yourEmail" required>
                    <div class="invalid-feedback">Por favor, insira seu email.</div>
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Trocar senha</button>
            </div>
            <div class="col-12">
                <p class="small mb-0">Lembrei a Senha! <a href="{{ route('auth.login') }}">Login</a></p>
            </div>
        </form>

    </div>
@endsection
