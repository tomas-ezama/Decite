@extends('layouts.app')

@section('content')
<section class="banner">
    <div></div>
    <form action="" method="POST">
        <select name="materia" id="materia">
            @foreach (App\Category::all() as $category)
            <option value="{{ $category->name }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <select name="zona" id="zona">
            <option value="0">Zona Norte</option>
            <option value="1">Zona Sur</option>
            <option value="2">Zona Oeste</option>
            <option value="3">Zona Este</option>
            <option value="4">Capital federal</option>
        </select>
        <input type="submit" value="Buscar" onclick="search(event)">
    </form>
</section>
<section class="pasos">
    <h2>Encontra profesores en tres simples pasos</h2>
    <article>
        <h2>Busca</h2>
        <i class="fas fa-search"></i>
    </article>
    <article>
        <h2>Elegi</h2>
        <i class="fas fa-chalkboard-teacher"></i>
    </article>
    <article>
        <h2>Aprende</h2>
        <i class="fab fa-leanpub"></i>
    </article>
</section>
<section class="categoria">
    <h3>Busca por categoria</h3>
    @foreach (App\Category::all() as $category)
    <article>
        <a href="{{ url('/professor?q='.$category->name) }}">{{ $category->name }}</a>
    </article>
    @endforeach
</section>
@endsection

@section('js')
    <script>
        function search(event) {
            event.preventDefault();
            const materia = document.querySelector('#materia');
            const zona = document.querySelector('#zona');
            window.location.href = '/professor?q='+materia.value+'&zona='+zona.value;
        }
    </script>
@endsection
