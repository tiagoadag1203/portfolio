@extends('layouts.app')

@section('titulo', 'Login')

@section('conteudo')
<div class="flex column centered container-login">
    <h2>Login</h2>
    <form class="flex column centered gap-10 form-login" method="POST" action="/login">
        @csrf
        <x-input label="E-mail:" name="email" id="email" type="email" required />
        <x-input label="Senha:" name="password" id="password" type="password" required />
        <button class="button" type="submit">Entrar</button>
    </form>
</div>
@endsection