@extends('layouts.app')

@section('titulo', 'Dashboard')

@section('conteudo')
<main class="main flex column gap-30">
    <div class="flex gap-20">
        <a onclick="history.back()"><span class="material-symbols-outlined">arrow_back</span></a>
        <h1>Informação Pessoal</h1>
    </div>
    <x-button icon="edit" label="Editar" type=""></x-button>
    <div class="flex gap-20">
        <img class="personal-img" src="{{ $personalInfo->image }}" alt="">
        <p>{{ $personalInfo->bio }}</p>
    </div>
</main>
@endsection