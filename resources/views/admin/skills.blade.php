@extends('layouts.app')

@section('titulo', 'Habilidades')

@section('conteudo')
<x-alert></x-alert>
<main class="main flex column gap-30">
    <div class="flex center-vertical gap-20">
        <a href="{{ route('dashboard') }}"><span class="material-symbols-outlined">arrow_back</span></a>
        <h1>Habilidades</h1>
    </div>
    <x-button onclick="openModal('modalAdd')" icon="edit" label="Nova Habilidade" type=""></x-button>
    <ul>
        @foreach($skills as $skill)
        <li>
            <x-list-item :item="$skill" type="skill">
                <img class="item-img" src="{{ $skill->image }}" alt="">
                <a href="{{ route('certificates.show', $skill->id) }}">
                    <p>{{ $skill->name }}</p>
                </a>
                <hr>
                <p>{{ $skill->skill_type }}</p>
                <hr>
                <p>{{ $skill->description }}</p>
                <!-- MODAL EDIÇÃO -->
                <x-modal id="modalEditskill{{ $skill->id }}" title="Editar {{ $skill->name }}">
                    <form class="flex column centered gap-20 form-login" action="{{ route('skills.update', $skill->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-input label="Nome:" name="name" id="name" type="text" required="true" value="{{ $skill->name }}" />
                        <x-select label="Tipo:" name="skill_type">
                            <option value="hard" @selected($skill->skill_type == 'hard')>Hard</option>
                            <option value="soft" @selected($skill->skill_type == 'soft')>Soft</option>
                        </x-select>
                        <x-input label="Porcentagem:" name="percentage" id="percentage" type="number" required="" value="{{ $skill->percentage }}" />
                        <x-input label="Descrição:" name="description" id="description" type="textarea" required="" value="{{ $skill->description }}" />
                        <x-input label="Imagem Link:" name="image" id="image" type="text" required="" value="{{ $skill->image }}" />
                        <x-button icon="save" label="Salvar" type="submit"></x-button>
                    </form>
                </x-modal>
                <!-- MODAL EXCLUSÃO -->
                <x-modal id="modalDeleteskill{{ $skill->id }}" title="Deletar {{ $skill->name }}">
                    <form class="flex column centered gap-20 form-login" action="{{ route('skills.destroy', $skill->id) }}" method="POST">
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
    <x-modal id="modalAdd" title="Nova Habilidade">
        <form class="flex column centered gap-20 form-login" action="{{ route('skills.store') }}" method="POST">
            @csrf
            @method('POST')
            <x-input label="Nome:" name="name" id="name" type="text" required="true" value="" />
            <x-select label="Tipo:" name="skill_type">
                <option value="hard">Hard</option>
                <option value="soft">Soft</option>
            </x-select>
            <x-input label="Porcentagem:" name="percentage" id="percentage" type="number" required="true" value="" />
            <x-input label="Descrição:" name="description" id="description" type="textarea" required="true" value="" />
            <x-input label="Imagem Link:" name="image" id="image" type="text" required="true" value="" />
            <x-button icon="save" label="Salvar" type="submit"></x-button>
        </form>
    </x-modal>
</main>
@endsection