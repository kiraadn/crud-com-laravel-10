@component('mail::message')

Olá, {{ $user->name }}.<br>
Lamentamos saber que está tendo problemas para fazer login
no {{ config('app.name')}}. Recebemos uma mensagem informando
que você esqueceu sua senha. Se foi você, pode redefinir
sua senha agora.
<p>Clique no link abaixo para redefinir sua senha. </p>


@component('mail::button', ['url' => url('reset/' . $user->remember_token)])
        Reset You Password

    @endcomponent

<p>
Caso você tenha algum problema ao recuperar sua senha, entre em contato conosco
usando o formulário da página page contact-as
Obrigado, </p><br>

{{ config('app.name')}}


@endcomponent
