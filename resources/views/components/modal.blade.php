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

<script>
    function openModal(id) {
        document.getElementById(id).style.display = "flex";
    }

    function closeModal(id) {
        document.getElementById(id).style.display = "none";
    }
</script>