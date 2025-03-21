<div class="flex column gap-5" style="width: 100%;">
    <label for="{{ $name }}">{{ $label }}</label>
    <input class="input" type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" {{ $required ? 'required' : '' }}>
</div>