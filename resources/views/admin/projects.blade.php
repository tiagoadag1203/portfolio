@extends('layouts.app')

@section('titulo', 'Habilidades')

@section('conteudo')
<x-alert></x-alert>
<main class="main flex column gap-30">
    <div class="flex center-vertical gap-20">
        <a href="{{ route('dashboard') }}"><span class="material-symbols-outlined">arrow_back</span></a>
        <h1>Projetos</h1>
    </div>
    <x-button onclick="openModal('modalAdd')" icon="edit" label="Novo Projeto" type=""></x-button>
    <ul>
        @foreach($projects as $project)
        <li>
            <x-list-item :item="$project" type="project">
                <img class="item-img" src="{{ $project->image }}" alt="">
                <p>{{ $project->name }}</p>
                <hr>
                <p>{{ $project->description }}</p>
                <!-- MODAL EDIÇÃO -->
                <x-modal id="modalEditproject{{ $project->id }}" title="Editar {{ $project->name }}">
                    <form class="flex column centered gap-20 form-login" action="{{ route('projects.update', $project->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-input label="Nome:" name="name" id="name" type="text" required="true" value="{{ $project->name }}" />
                        <x-input label="Descrição:" name="description" id="description" type="text" required="true" value="{{ $project->description }}" />
                        <x-input label="Imagem:" name="image" id="image" type="text" required="" value="{{ $project->image }}" />
                        <x-input label="Github Link:" name="github_link" id="github_link" type="text" required="" value="{{ $project->github_link }}" />
                        <x-input label="Site Link:" name="website_link" id="website_link" type="text" required="" value="{{ $project->website_link }}" />
                        <x-button icon="save" label="Salvar" type="submit"></x-button>
                    </form>
                </x-modal>
                <!-- MODAL EXCLUSÃO -->
                <x-modal id="modalDeleteproject{{ $project->id }}" title="Deletar {{ $project->name }}">
                    <form class="flex column centered gap-20 form-login" action="{{ route('projects.destroy', $project->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <p>Tem certeza que deseja excluir?</p>
                        <x-button class="delete" icon="delete" label="Excluir" type="submit"></x-button>
                    </form>
                </x-modal>
            </x-list-item>
        </li>
        @endforeach
    </ul>

    <!-- MODAL ADICIONAR -->
    <x-modal id="modalAdd" title="Nova Experiência">
        <form class="flex column centered gap-20 form-login" action="{{ route('projects.store') }}" method="POST">
            @csrf
            @method('POST')
            <x-input label="Nome:" name="name" id="name" type="text" required="true" value="" />
            <x-input label="Descrição:" name="description" id="description" type="text" required="true" value="" />
            <x-input label="Imagem:" name="image" id="image" type="text" required="" value="" />
            <x-input label="Github Link:" name="github_link" id="github_link" type="text" required="" value="" />
            <x-input label="Site Link:" name="website_link" id="website_link" type="text" required="" value="" />
            <x-button icon="save" label="Salvar" type="submit"></x-button>
        </form>
    </x-modal>
</main>
@endsection