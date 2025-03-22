@extends('layouts.app')

@section('titulo', 'Dashboard')

@section('conteudo')
<x-alert></x-alert>
<main class="main flex column gap-30">
    <div class="flex center-vertical gap-20">
        <a onclick="history.back()"><span class="material-symbols-outlined">arrow_back</span></a>
        <h1>Perfil</h1>
    </div>
    <x-button onclick="openModal('modalEdit')" icon="edit" label="Editar" type=""></x-button>
    <div class="flex center-vertical center-horizontal gap-20">
        <img class="personal-img" src="{{ $personalInfo->image }}" alt="">
        <p>{{ $personalInfo->bio }}</p>
    </div>

    <x-modal id="modalEdit" title="Informações Pessoais">
        <form id="modalEdit" class="flex column centered gap-20 form-login" method="POST" action="{{ route('personal-info.update', $personalInfo->id) }}">
            @csrf
            @method('PUT')
            <x-input label="Bio:" name="bio" id="bio" type="textarea" required="true" value="{{ $personalInfo->bio }}" />
            <x-input label="Image:" name="image" id="image" type="text" required="" value="{{ $personalInfo->image }}" />
            <x-button icon="save" label="Salvar" type="submit"></x-button>
        </form>
    </x-modal>
</main>
@endsection