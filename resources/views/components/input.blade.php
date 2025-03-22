<div class="flex column gap-5" style="width: 100%;">
    <label for="{{ $name }}">{{ $label }}</label>
    @if($type === 'textarea')
        <textarea class="input" name="{{ $name }}" id="{{ $id }}" {{ $required ? 'required' : '' }}></textarea>
    @else
        <input class="input" type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" {{ $required ? 'required' : '' }}>
    @endif
</div>
<style>
    .input {
        width: 100%;
        background-color: var(--secondary-background-color);
        padding: 15px;
        box-sizing: border-box;
        border: none;
        border-radius: 15px;
        color: var(--title-color);
    }
</style>