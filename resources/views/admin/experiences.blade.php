@extends('layouts.app')

@section('titulo', 'Habilidades')

@section('conteudo')
<x-alert></x-alert>
<main class="main flex column gap-30">
    <div class="flex center-vertical gap-20">
        <a href="{{ route('dashboard') }}"><span class="material-symbols-outlined">arrow_back</span></a>
        <h1>Experiências</h1>
    </div>
    <x-button onclick="openModal('modalAdd')" icon="edit" label="Nova Experiência" type=""></x-button>
    <ul>
        @foreach($experiences as $experience)
        <li>
            <x-list-item :item="$experience" type="experience">
                <img class="item-img" src="{{ $experience->image }}" alt="">
                <p>{{ $experience->name }}</p>
                <hr>
                <p>{{ $experience->role }}</p>
                <hr>
                <p>{{ $experience->start_date }}</p>
                <!-- MODAL EDIÇÃO -->
                <x-modal id="modalEditexperience{{ $experience->id }}" title="Editar {{ $experience->name }}">
                    <form class="flex column centered gap-20 form-login" action="{{ route('experiences.update', $experience->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-input label="Empresa:" name="name" id="name" type="text" required="true" value="{{ $experience->name }}" />
                        <x-input label="Cargo:" name="role" id="role" type="text" required="true" value="{{ $experience->role }}" />
                        <x-input label="Descrição:" name="description" id="description" type="textarea" required="true" value="{{ $experience->description }}" />
                        <x-input label="Logo:" name="image" id="image" type="text" required="" value="{{ $experience->image }}" />
                        <x-input label="Data de Início:" name="start_date" id="start_date" type="date" required="true" value="{{ $experience->start_date }}" />
                        <x-input label="Data de Término:" name="end_date" id="end_date" type="date" required="" value="{{ $experience->end_date }}" />
                        <x-button icon="save" label="Salvar" type="submit"></x-button>
                    </form>
                </x-modal>
                <!-- MODAL EXCLUSÃO -->
                <x-modal id="modalDeleteexperience{{ $experience->id }}" title="Deletar {{ $experience->name }}">
                    <form class="flex column centered gap-20 form-login" action="{{ route('experiences.destroy', $experience->id) }}" method="POST">
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
        <form class="flex column centered gap-20 form-login" action="{{ route('experiences.store') }}" method="POST">
            @csrf
            @method('POST')
            <x-input label="Empresa:" name="name" id="name" type="text" required="true" value="" />
            <x-input label="Cargo:" name="role" id="role" type="text" required="true" value="" />
            <x-input label="Descrição:" name="description" id="description" type="textarea" required="true" value="" />
            <x-input label="Logo:" name="image" id="image" type="text" required="" value="" />
            <x-input label="Data de Início:" name="start_date" id="start_date" type="date" required="true" value="" />
            <x-input label="Data de Término:" name="end_date" id="end_date" type="date" required="" value="" />
            <x-button icon="save" label="Salvar" type="submit"></x-button>
        </form>
    </x-modal>
</main>
@endsection