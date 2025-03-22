<button class="button" type="{{ $type ? '$type' : '' }}">
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
        gap: 10px;
        background-color: var(--title-color);
        color: var(--background-color);
        padding: 10px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 700;
        transition: 0.2s;
    }

    .button:hover {
        opacity: 0.5;
    }
</style>