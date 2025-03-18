<div class="flex column" style="width: 100%;">
    <label for="{{ $name }}">{{ $label }}</label>
    <input class="input" type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" {{ $required ? 'required' : '' }}>
</div>