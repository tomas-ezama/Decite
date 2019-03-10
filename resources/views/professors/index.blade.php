    @extends('layouts.app')

@section('content')
<h2>Resultados de la busqueda
    @if (count($professors) != 0)
    , {{count($professors)}} {{(count($professors) > 1) ? 'profesores encontrados' : 'profesor encontrado'}} </h2>
    @endif
<ul class="professors">
    @forelse ($professors as $professor)
    <li>
        <h3>Nombre: {{ $professor->name }} {{ $professor->lastname }}</h3>
        <p>Zona: {{ $professor->getZona() }}<p>
        <a href="{{ route('professor.show', $professor->id) }}">Ver</a>
    </li>
    @empty
    <li>0 Results found </li>
    @endforelse
</ul>

@endsection
