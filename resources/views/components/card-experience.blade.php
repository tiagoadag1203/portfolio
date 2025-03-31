@props(['item'])

<div class="card-experience flex column gap-10">
    <div class="flex center-vertical gap-10">
        <img src="{{ $item->image }}" alt="" class="card-experience-img">
        <div class="flex column gap-10">
            <h5>{{ $item->name }}</h5>
            <p>{{ $item->role }}</p>
        </div>
    </div>
    <div class="flex column gap-10">
        <p>{{ $item->description }}</p>
        <div class="period {{ empty($item->end_date) ? 'no-end-date' : 'has-end-date' }}">
            <p>{{ $item->start_date }} - {{ $item->end_date ?? 'Presente' }}</p>
        </div>
    </div>
</div>

<style>
    .card-experience {
        width: 350px;
        background-color: var(--secondary-background-color);
        border: 1px solid var(--gray);
        border-radius: 20px;
        padding: 10px;
    }

    .card-experience-img {
        width: 70px;
        height: 70px;
        border-radius: 10px;
        object-fit: cover;
    }

    .period {
        width: fit-content;
        padding: 5px 10px;
        border-radius: 100px;
    }

    .has-end-date {
        background-color: var(--dark-red);
        color: var(--light-red); /* Cor para quando há data de fim */
    }

    .no-end-date {
        background-color: var(--dark-green);
        color: var(--light-green);
    }

    @media screen and (max-width: 830px) {
        .card-experience {
            width: 100%;
        }

        .card-experience-img {
            width: 50px;
            height: 50px;
        }
    }
</style>