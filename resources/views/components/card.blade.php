@props(['item', 'type'])

<div class="card card-specific flex column gap-10">
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