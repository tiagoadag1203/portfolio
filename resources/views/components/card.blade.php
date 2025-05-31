@props(['item', 'type'])

<div class="card flex column gap-10">
    <img src="{{ $item->image }}" alt="" class="card-img">
    <div class="flex column gap-20">
        <h5>
            {{ Str::limit($item->name, 30, '...') }}
        </h5>
        @if ($type === 'project')
            <p class="description">
                {{ Str::limit($item->description, 50, '...') }}
            </p>
        @endif
        <div class="flex gap-10">
            <x-button-social link="{{ $item->link }}" icon2="link" label="Link"></x-button-social>
        </div>
    </div>
</div>

<style>
    .card {
        width: 220px;
        background-color: var(--secondary-background-color);
        border: 1px solid var(--gray);
        border-radius: 20px;
        padding: 10px;
        box-sizing: border-box;
    }

    .card-img {
        width: 100%;
        height: 120px;
        border-radius: 10px;
        object-fit: cover;
    }
</style>