@extends('layouts.app')
@section('content')

@if(Auth::user()->role == 2)
<div class="login-form">
    <form action="{{ route('newCat') }}" name="agregar" method="POST">
            @csrf
        <label>Agregar Categoria</label>
        <input type="text" name="name">
        <input type="submit" value="Agregar">
    </form>
    <form action="{{ route('delCat') }}" method="POST">
        @csrf
        @method('delete')
            <h4 style="margin: 15px 0px;">Eliminar Categoria</h4>
            <select name="category">
                @foreach (App\Category::all() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input type="submit" value="Eliminar">
        </form>
    </div>
@else 
No tienes permisos
@endif
@endsection
