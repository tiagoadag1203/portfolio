<a href="{{ $link }}" target="_blank">
    <div class="button-social flex center-vertical center-horizontal gap-5">
        @if(!empty($icon2))
            <span class="material-symbols-outlined">{{ $icon2 }}</span>
        @elseif(!empty($icon))
            <i class="{{ $icon }}"></i>
        @endif
        <div class="btn-label">
            {{ $label }}
        </div>
    </div>
</a>