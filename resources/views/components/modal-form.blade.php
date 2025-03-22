<div id="{{ $id }}" class="modal" style="display: flex;">
    <div class="modal-content flex column">
        <div class="modal-header">
            <h2 class="modal-title">{{ $title }}</h2>
            <span onclick="closeModal('{{ $id }}')" class="material-symbols-outlined">close</span>
        </div>
        <div class="modal-body">
            <form class="flex column centered gap-20 form-login" method="POST" action="{{ $action }}">
                @csrf
                {{ $slot }}
            </form>
        </div>
        <div class="modal-footer">
            <x-button icon="save" label="Salvar" type="submit"></x-button>
        </div>
    </div>
</div>

<style>
    .modal {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: var(--background-color);
        border: 2px solid var(--title-color);
        border-radius: 20px;
        width: 600px;
        max-height: 600px;
        overflow: hidden;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        border-bottom: 1px solid var(--gray);
        padding: 20px;
    }

    .modal-body {
        padding: 20px;
        overflow-y: auto;
    }

    .modal-footer {
        display: flex;
        align-items: center;
        border-top: 1px solid var(--gray);
        padding: 20px;
    }

    .close {
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }
</style>

<script>
    function openModal(id) {
        document.getElementById(id).style.display = "flex";
    }

    function closeModal(id) {
        document.getElementById(id).style.display = "none";
    }
</script>