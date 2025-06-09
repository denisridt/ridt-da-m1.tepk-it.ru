@extends('layouts.layout')
@section('title', 'Материалы')
@section('content')
    <h1>"{{ $material->name }}"</h1>
    <span></span>
    <span></span>
    <div class="external border center">
        @foreach($products as $item)
            <div class="internal border">
                <div class="int-in">
                    <p class="int-h"> {{ $item['name'] }}</p>
                </div>
                <div class="int-in">
                    <p class="int-h"> {{ $item['quantity'] }} ед. материала</p>
                </div>
            </div>
        @endforeach
    </div>
    <a class="bott" href="{{ route('materials.index') }}">Назад</a>
@endsection
