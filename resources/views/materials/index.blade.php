@extends('layouts.layout')
@section('title', 'Материалы')
@section('content')
    <div class="nav">
        <a class="bott" href="{{route('materials.create')}}">Создать что-то</a>
        <a class="bott" href="{{ route('home') }}">← Назад</a>
    </div>
    <div class="external border center">
        @foreach ($materials as $material)
            <div class="internal border">
                <div class="int-in">
                    <a href="{{ route('materials.edit', $material->id) }}">
                        <h2 class="int-h"> {{ $material->materialType->name}} | {{$material->name}}</h2>
                    </a>
                    <div class="text">Минимальное количество: {{$material->minimum}}</div>
                    <div class="text">Количество на складе: {{$material->warehouse}}</div>
                    <div class="text">Цена: {{$material->price}}/{{$material->unit->name}} | {{$material->packaging}}</div>
                </div>
                <div>
                    <h2>{{ number_format($material->quantity, 2, '.', ' ') }}</h2>
                </div>
            </div>
            <a href="{{ route('materials.show', $material->id) }}">show</a>
        @endforeach
    </div>
    <a class="bott" href="{{route('home')}}">Назад</a>
@endsection
