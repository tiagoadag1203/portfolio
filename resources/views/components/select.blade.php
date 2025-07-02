<div class="flex column gap-5" style="width: 100%;">
    <label for="{{ $name }}">{{ $label }}</label>
    <select class="select-input" name="{{ $name }}" id="{{ $name }}">
        {{ $slot }}
    </select>
</div>