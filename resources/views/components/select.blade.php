<div class="flex column gap-5" style="width: 100%;">
    <label for="{{ $name }}">{{ $label }}</label>
    <select class="select-input" name="{{ $name }}" id="{{ $name }}">
        {{ $slot }}
    </select>
</div>
<style>
    .select-input {
        width: 100%;
        background-color: var(--secondary-background-color);
        padding: 15px;
        box-sizing: border-box;
        border: none;
        border-radius: 15px;
        color: var(--title-color);
    }
</style>