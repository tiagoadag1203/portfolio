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
<style>
    .list-item {
        width: 100%;
        padding: 10px;
        border-bottom: 1px solid var(--gray);
        box-sizing: border-box;

        p {
            margin: 0;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            max-width: 400px;
        }
    }

    .item-img {
        width: 50px;
        height: 50px;
        border-radius: 10px;
    }

    @media screen and (max-width: 1024px) {
        .list-item {
            min-width: 100%;
            overflow-x: scroll;
        }
    }
</style>