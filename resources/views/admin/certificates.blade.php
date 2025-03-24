@extends('layouts.app')

@section('titulo', 'Certificados')

@section('conteudo')
<x-alert></x-alert>
<main class="main flex column gap-30">
    <div class="flex center-vertical gap-20">
        <a href="{{ route('skills.index') }}"><span class="material-symbols-outlined">arrow_back</span></a>
        <h1>Certificados</h1>
    </div>
    <x-button onclick="openModal('modalAdd')" icon="edit" label="Novo Certificado" type=""></x-button>
    <div>
        @foreach($certificates as $certificate)
        <x-list-item :certificate="$certificate">
            <img class="item-img" src="{{ $certificate->image }}" alt="">
            <p>{{ $certificate->name }}</p>
            <hr>
            <p>{{ $certificate->skill->name }}</p>
            <!-- MODAL EDIÇÃO -->
            <x-modal id="modalEdit" title="Editar {{ $certificate->name }}">
                <form class="flex column centered gap-20 form-login" action="{{ route('certificates.update', $certificate->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-input label="Nome:" name="name" id="name" type="text" required="true" value="{{ $certificate->name }}" />
                    <x-input label="Link:" name="link" id="link" type="text" required="" value="{{ $certificate->link }}" />
                    <x-input label="Imagem Link:" name="image" id="image" type="text" required="" value="{{ $certificate->image }}" />
                    <x-button icon="save" label="Salvar" type="submit"></x-button>
                </form>
            </x-modal>

            <!-- MODAL EXCLUSÃO -->
            <x-modal id="modalDelete" title="Deletar {{ $certificate->name }}">
                <form class="flex column centered gap-20 form-login" action="{{ route('certificates.destroy', $certificate->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <p>Tem certeza que deseja excluir?</p>
                    <x-button class="delete" icon="delete" label="Excluir" type="submit"></x-button>
                </form>
            </x-modal>
        </x-list-item>
        @endforeach
    </div>

    <!-- MODAL ADICIONAR -->
    <x-modal id="modalAdd" title="Adicionar Certificado">
        <form class="flex column centered gap-20 form-login" action="{{ route('certificates.store') }}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="skill_id" value="{{ $skill_id }}">
            <x-input label="Nome:" name="name" id="name" type="text" required="true" value="" />
            <x-input label="Link:" name="link" id="link" type="text" required="" value="" />
            <x-input label="Imagem Link:" name="image" id="image" type="text" required="" value="" />
            <x-button icon="save" label="Salvar" type="submit"></x-button>
        </form>
    </x-modal>
</main>
@endsection