<div id="{{ $id }}" class="modal" style="display: none;">
    <div class="modal-content flex column">
        <div class="modal-header">
            <h3 class="modal-title">{{ $title }}</h3>
            <span onclick="closeModal('{{ $id }}')" class="material-symbols-outlined btn-close">close</span>
        </div>
        <div class="modal-body">
            {{ $slot }}
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
        z-index: 999;
    }

    .modal-content {
        background: var(--background-color);
        border: 2px solid var(--title-color);
        border-radius: 20px;
        width: 100%;
        max-width: 600px;
        max-height: 600px;
        overflow: hidden;
        margin: 20px;
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

    .btn-close {
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