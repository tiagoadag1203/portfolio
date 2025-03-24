@props(['skill'])

<div class="list-item flex center-vertical space-between gap-20">
    <div class="flex center-vertical gap-20">
        {{ $slot }}
    </div>
    <div class="flex center-vertical gap-10">
        <x-button onclick="openModal('modalEdit')" class="edit" icon="edit" label="Editar" type=""></x-button>
        <x-button onclick="openModal('modalDelete')" class="delete" icon="delete" label="Excluir" type=""></x-button>
    </div>
</div>
<style>
    .list-item {
        width: 100%;
        padding: 10px;
        border-bottom: 1px solid var(--gray);
    }

    .item-img {
        width: 50px;
        height: 50px;
        border-radius: 10px;
    }

</style>