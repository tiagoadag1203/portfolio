@props(['skill', 'img', 'name'])

<div class="skill flex gap-10 center-vertical space-between">
    <div class="content flex gap-10 center-vertical">
        <img src="{{ $img }}" alt="{{ $name }}" class="skill-icon">
        <p class="skill-name">{{ $name }}</p>
    </div>
    <div>
        <span class="info material-symbols-outlined" onclick="openModal('modal-{{ $name }}')">
            info
        </span>
    </div>
</div>

<x-modal id="modal-{{ $name }}" title="{{ $name }}">
    <div class="flex column gap-20">
        <h3>Descrição:</h3>
        <p>{{ $skill->description }}</p>
        <div class="flex gap-10">
            <div class="progress-bar">
                <div class="progress-fill" style="width: {{ $skill->percentage }}%"></div>
            </div>
            <p>{{ $skill->percentage }}%</p>
        </div>
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

<style>
    .skill {
        width: 200px;
        background-color: var(--secondary-background-color);
        border: 1px solid var(--gray);
        border-radius: 100px;
        padding: 10px;
    }

    .content {
        width: 100%;
    }

    .skill-icon {
        width: 40px;
        height: 40px;
        border-radius: 100px;
    }

    .skill-name {
        font-size: 15px;
        font-weight: bold;
    }

    .progress-bar {
        width: 100%;
        height: fit-content;
        background-color: var(--dark-blue);
        border-radius: 8px;
        overflow: hidden;
    }

    .progress-fill {
        height: 10px;
        background-color: var(--light-blue);
        border-radius: 100px;
    }

    span.info:hover {
        cursor: pointer;
        color: rgb(255, 199, 14);
        transition: 0.3s;
    }
</style>