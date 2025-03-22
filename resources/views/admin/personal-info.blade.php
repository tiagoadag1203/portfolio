@extends('layouts.app')

@section('titulo', 'Dashboard')

@section('conteudo')
<main class="main flex column gap-30">
    <div class="flex center-vertical center-horizontal gap-20">
        <a onclick="history.back()"><span class="material-symbols-outlined">arrow_back</span></a>
        <h1>Perfil</h1>
    </div>
    <x-button onclick="openModal('modalExemplo')" icon="edit" label="Editar" type=""></x-button>
    <div class="flex gap-20">
        <img class="personal-img" src="{{ $personalInfo->image }}" alt="">
        <p>{{ $personalInfo->bio }}</p>
    </div>

    <x-modal-form id="modalExemplo" title="Informações Pessoais" type="submit" action="">
        <x-input label="Bio:" name="bio" id="bio" type="textarea" required />
        <x-input label="Image:" name="image" id="image" type="file" required />
    </x-modal-form>
</main>
@endsection