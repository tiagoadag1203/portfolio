<button class="button" type="{{ $type ? '$type' : '' }}">
    @if ($icon)
        <span class="material-symbols-outlined">{{ $icon }}</span>
    @endif
    <span>{{ $label }}</span>
</button>