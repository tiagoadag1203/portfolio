@props(['item'])

@php
    $meses = [
        '01' => 'Jan', '02' => 'Fev', '03' => 'Mar', '04' => 'Abr', '05' => 'Mai', '06' => 'Jun',
        '07' => 'Jul', '08' => 'Ago', '09' => 'Set', '10' => 'Out', '11' => 'Nov', '12' => 'Dez'
    ];
@endphp

<div class="card card-experience flex column gap-20">
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