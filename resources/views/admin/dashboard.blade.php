@extends('layouts.app')

@section('titulo', 'Dashboard')

@section('conteudo')
<x-alert></x-alert>
<main class="main flex column gap-30">
    <h1>Olá Tiago!<br>
        Seja bem-vindo 👋!
    </h1>
    <h3>Gerenciar:</h3>
    <div class="flex wrap gap-20">
        <a href="{{ route('personal-info.index') }}">
            <div class="button-section flex column center-horizontal center-vertical gap-10">
                <span class="material-symbols-outlined">face</span>
                <p>Perfil</p>
            </div>
        </a>
        <a href="{{ route('skills.index') }}">
            <div class="button-section flex column center-horizontal center-vertical gap-10">
                <span class="material-symbols-outlined">cognition_2</span>
                <p>Habilidades</p>
            </div>
        </a>
        <a href="{{ route('experiences.index') }}">
            <div class="button-section flex column center-horizontal center-vertical gap-10">
                <span class="material-symbols-outlined">work</span>
                <p>Experiências</p>
            </div>
        </a>
        <a href="{{ route('projects.index') }}">
            <div class="button-section flex column center-horizontal center-vertical gap-10">
                <span class="material-symbols-outlined">folder</span>
                <p>Projetos</p>
            </div>
        </a>
        <a href="{{ route('logout') }}">
            <div class="button-section flex column center-horizontal center-vertical gap-10 logout">
                <span class="material-symbols-outlined">logout</span>
                <p>Logout</p>
            </div>
        </a>
    </div>
    <h3>Mensagens:</h3>
    <div class="flex wrap gap-20">
        @if ($messages->isEmpty())
        <p>Não há mensagens disponíveis.</p>
        @endif
        @foreach($messages as $message)
        <x-card-message :message="$message" />
        @endforeach
    </div>


</main>
@endsection