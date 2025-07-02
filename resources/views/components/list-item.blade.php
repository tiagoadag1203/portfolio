@props(['item', 'type'])

<div class="list-item flex center-vertical space-between gap-20">
    <div class="flex center-vertical gap-20">
        {{ $slot }}
    </div>
    <div class="flex center-vertical gap-10">
        <x-button onclick="openModal('modalEdit{{ $type }}{{ $item->id }}')" class="edit" icon="edit" label="Editar" type=""></x-button>
        <x-button onclick="openModal('modalDelete{{ $type }}{{ $item->id }}')" class="delete" icon="delete" label="Excluir" type=""></x-button>
    </div>
</div>