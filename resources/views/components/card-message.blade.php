@props(['message'])

<div class="card card-message flex column gap-10">
    <div class="flex column gap-10">
        <h3>{{ $message->name }}</h3>
        <p>{{ $message->email }}</p>
        <p>{{ $message->message }}</p>
        <x-button onclick="openModal('modalDeletemessage{{ $message->id }}')" class="delete" icon="delete" label="" type=""></x-button>
    </div>
</div>
<!-- MODAL EXCLUSÃO -->
<x-modal id="modalDeletemessage{{ $message->id }}" title="Deletar {{ $message->name }}">
    <form class="flex column centered gap-20 form-login" action="{{ route('messages.destroy', $message->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <p>Tem certeza que deseja excluir?</p>
        <x-button class="delete" icon="delete" label="Excluir" type="submit"></x-button>
    </form>
</x-modal>