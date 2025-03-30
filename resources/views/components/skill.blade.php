@props(['skill', 'img', 'name'])

<div class="skill flex center-vertical space-between">
    <div class="flex gap-10 center-vertical">
        <img src="{{ $img }}" alt="{{ $name }}" class="skill-icon">
        <p class="skill-name">{{ $name }}</p>
    </div>
    <div>
        <span class="info material-symbols-outlined" onclick="openModal('modal-{{ $name }}')">
            info
        </span>
    </div>
    <x-modal id="modal-{{ $name }}" title="{{ $name }}">
        <div class="flex column gap-20">
            <h3>Descrição:</h3>
            <p>{{ $skill->description }}</p>
            <h3>Certificados:</h3>
            <div class="flex gap-20 wrap">
                @if ($skill->certificates->isEmpty())
                    <p>Não há certificados disponíveis.</p>
                @endif
                @foreach ($skill->certificates as $certificate)
                    <x-card :item="$certificate" type=""></x-card>
                @endforeach
            </div>
        </div>
    </x-modal>
</div>

<style>
    .skill {
        width: 200px;
        background-color: var(--secondary-background-color);
        border: 1px solid var(--gray);
        border-radius: 100px;
        padding: 10px;
    }

    .skill-icon {
        width: 40px;
        height: 40px;
        border-radius: 100px;
    }

    .skill-name {
        font-size: 1.2rem;
        font-weight: bold;
    }

    span.info:hover {
        cursor: pointer;
        color:rgb(255, 199, 14);
        transition: 0.3s;
    }
</style>