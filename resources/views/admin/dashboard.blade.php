@extends('layouts.app')

@section('titulo', 'Dashboard')

@section('conteudo')
<main class="main flex column gap-30">
    <h1>Olá Tiago!<br>
        Seja bem-vindo 👋!
    </h1>
    <div class="flex wrap gap-20">
        <a href="">
            <div class="button-section flex column centered gap-10">
                <span class="material-symbols-outlined">face</span>
                <p>Perfil</p>
            </div>
        </a>
        <a href="">
            <div class="button-section flex column centered gap-10">
                <span class="material-symbols-outlined">cognition_2</span>
                <p>Habilidades</p>
            </div>
        </a>
        <a href="">
            <div class="button-section flex column centered gap-10">
                <span class="material-symbols-outlined">work</span>
                <p>Experiências</p>
            </div>
        </a>
        <a href="">
            <div class="button-section flex column centered gap-10">
                <span class="material-symbols-outlined">folder</span>
                <p>Projetos</p>
            </div>
        </a>
    </div>
</main>
@endsection