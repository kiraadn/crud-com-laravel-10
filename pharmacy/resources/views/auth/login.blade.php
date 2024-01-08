@extends('layouts.auth')

@section('title', 'Login - Pharmacy M.S')

@section('content')
    <div class="card-body">

        <div class="pt-4 pb-2">

            @include('_message')

            <h5 class="card-title text-center pb-0 fs-4">Painel de Acesso</h5>
            <p class="text-center small">Insira seu email e senha para login</p>
        </div>

        <form method="POST" action="{{ url('login_post')}}" class="row g-3 needs-validation" novalidate>
            {{csrf_field()}}
            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="email" name="email" class="form-control" id="email" required value="{{ old('email')}}">
                    <div class="invalid-feedback">Por favor, insira seu email.</div>
                </div>
            </div>

            <div class="col-12">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" id="password" required>
                <div class="invalid-feedback">Por favor, insira sua senha.</div>
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Login</button>
            </div>
            <div class="col-12">
                <p class="small mb-0">Esqueceu as credenciais? <a href="{{ route('auth.forgot') }}">Recuperar conta</a></p>
            </div>
        </form>

    </div>
@endsection
