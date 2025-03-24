<button type="{{ $type ?: 'button' }}" {{ $attributes->merge(['class' => 'button']) }}>
    @if ($icon)
    <span class="material-symbols-outlined">{{ $icon }}</span>
    @endif
    <span>{{ $label }}</span>
</button>
<style>
    .button {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
        background-color: var(--title-color);
        color: var(--background-color);
        padding: 8px 10px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 700;
        transition: 0.2s;
        width: fit-content;

        .material-symbols-outlined {
            font-size: 20px;
        }
    }

    .button:hover {
        opacity: 0.5;
    }

    
    .edit {
        background-color: var(--light-blue);
        color: var(--dark-blue);
    }

    .delete {
        background-color: var(--light-red);
        color: var(--dark-red);
    }
</style>