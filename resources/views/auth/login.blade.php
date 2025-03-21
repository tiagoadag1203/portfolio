@extends('layouts.app')

@section('titulo', 'Login')

@section('conteudo')
<x-alert></x-alert>
<main class="main flex column center-horizontal center-vertical">
    <div class="flex column center-horizontal center-vertical container-login gap-20">
        <h2>Login</h2>
        <form class="flex column center-horizontal center-vertical gap-20 form-login" method="POST" action="/login">
            @csrf
            <x-input label="E-mail:" name="email" id="email" type="email" required />
            <x-input label="Senha:" name="password" id="password" type="password" required />
            <x-button label="Entrar" type="submit" icon="login" />
        </form>
    </div>
</main>
@endsection