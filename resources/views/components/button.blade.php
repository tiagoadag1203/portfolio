<button type="{{ $type ?: 'button' }}" {{ $attributes->merge(['class' => 'button']) }}>
    @if ($icon)
    <span class="material-symbols-outlined">{{ $icon }}</span>
    @endif
    @if ($label)
    <span>{{ $label }}</span>
    @endif
</button>