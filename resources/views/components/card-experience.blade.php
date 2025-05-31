@props(['item'])

@php
    $meses = [
        '01' => 'Jan', '02' => 'Fev', '03' => 'Mar', '04' => 'Abr', '05' => 'Mai', '06' => 'Jun',
        '07' => 'Jul', '08' => 'Ago', '09' => 'Set', '10' => 'Out', '11' => 'Nov', '12' => 'Dez'
    ];
@endphp

<div class="card-experience flex column gap-20">
    <div class="flex center-vertical gap-10">
        <img src="{{ $item->image }}" alt="" class="card-experience-img">
        <div class="flex column gap-10">
            <h5>{{ $item->name }}</h5>
            <p>{{ $item->role }}</p>
        </div>
    </div>
    <div class="content flex space-between column gap-10">
        <p>{{ Str::limit($item->description, 50, '...') }}</p>
        <div class="period {{ empty($item->end_date) ? 'no-end-date' : 'has-end-date' }}">
            <p>
                {{ $meses[date('m', strtotime($item->start_date))] }}/{{ date('Y', strtotime($item->start_date)) }} - 
                {{ !empty($item->end_date) ? $meses[date('m', strtotime($item->end_date))] . '/' . date('Y', strtotime($item->end_date)) : 'Presente' }}
            </p>
        </div>
    </div>
</div>

<style>
    .card-experience {
        width: 350px;
        max-width: 350px;
        background-color: var(--secondary-background-color);
        border: 1px solid var(--gray);
        border-radius: 20px;
        padding: 10px;
        box-sizing: border-box;
    }

    .card-experience-img {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        object-fit: cover;
    }

    .content {
        width: 100%;
        height: 100%;
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