@extends('layouts.layout')
@section('title','Создание')
@section('content')
    <h2 class="head">Создание</h2>
    <form class="form" action="{{ route('materials.store')}}" method="post" enctype="application/x-www-form-urlencoded">
        @csrf
        <div class="form">
            <label>Название:</label>
            <input type="text" name="name" placeholder="Название" required>
            <label>Тип:</label>
            <select name="material_type_id" required>
                @foreach($materialTypes as $m_type)
                    <option value="{{$m_type->id}}">{{$m_type->name}}</option>
                @endforeach
            </select>
            <label>Единица измерения:</label>
            <select name="unit_id" required>
                @foreach($units as $u_type)
                    <option value="{{$u_type->id}}">{{$u_type->name}}</option>
                @endforeach
            </select>
            <label for="price">Цена:</label>
            <input type="number" step="0.1" min="1" name="price" >
            <label for="warehouse">Склад:</label>
            <input type="number" step="0.1" min="1" name="warehouse" >
            <label for="minimum">Минимум:</label>
            <input type="number" step="0.1" min="1" name="minimum" >
            <label for="packaging">В рюкзаке:</label>
            <input type="number" step="0.1" min="1" name="packaging" >
        </div>
    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <button class="bott" type="submit">Создать</button>
    </form>
    <a class="bott" href="{{route('materials.index')}}">Назад к списку</a>
@endsection
