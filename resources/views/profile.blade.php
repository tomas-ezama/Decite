@extends('layouts.app')

@section('content')
<article class="perfil">
    <h1>Bienvenido {{ Auth::user()->name }}</h1>
    <ul>
        <li>
            <img src="/images/users/{{Auth::user()->profilePic}}" style="widht:150px;  heigth:150px; border-radius:50%" >
        </li>
    </ul>
</article>
<div class="login-form">
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <h5 style="margin: 5px 0px;">Nombre: {{Auth::user()->name ." " . Auth::user()->lastname}}</h5>
        <h5 style="margin: 5px 0px;">Email: {{Auth::user()->email}}</h5>
        <h5 style="margin: 5px 0px;">Fecha de nacimiento: {{Auth::user()->birthdate}} </h5>
        @if(Auth::user()->role == 0)
        <h5 style="margin: 5px 0px 25px;">Rol: Alumno</h5>
        @elseif(Auth::user()->role == 1)
        <h5 style="margin: 5px 0px 25px;">Rol: Profesor</h5>
        @else
        <h5 style="margin: 5px 0px 25px;">Rol: Like a Boss</h5>
        @endif
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="{{ old('name') ? old('name') : Auth::user()->name }}">
        @if ($errors->has('name'))
        <span class="text-red">{{ $errors->first('name') }}</span><br>
        @endif
        <label for="">Apellido:</label>
        <input type="text" name="lastName" value="{{ old('lastName') ? old('lastName') : Auth::user()->lastname }}">
        @if ($errors->has('lastName'))
        <span class="text-red">{{ $errors->first('lastName') }}</span><br>
        @endif
        <label for="">Fecha de nacimiento:</label>
        <input type="date" name="birthdate" value="{{ old('birthdate') ? old('birthdate') : Auth::user()->birthdate }}">
        @if ($errors->has('birthdate'))
        <span class="text-red">{{ $errors->first('birthdate') }}</span><br>
        @endif
        @if(Auth::user()->role == 1)
        <label for="zona">Zona:</label>
        <select name="zona">
            <option value="0" {{ (Auth::user()->zona == 0) ? 'selected' : '' }}>Zona Norte</option>
            <option value="1" {{ (Auth::user()->zona == 1) ? 'selected' : '' }}>Zona Sur</option>
            <option value="2" {{ (Auth::user()->zona == 2) ? 'selected' : '' }}>Zona Oeste</option>
            <option value="3" {{ (Auth::user()->zona == 3) ? 'selected' : '' }}>Zona Este</option>
            <option value="4" {{ (Auth::user()->zona == 4) ? 'selected' : '' }}>Capital federal</option>
        </select>
        @if ($errors->has('zona'))
        <span class="text-red">{{ $errors->first('zona') }}</span><br>
        @endif
        <label for="about">Sobre mi</label>
        <textarea name="about" rows="5">{{ old('about') ? old('about') : Auth::user()->about }}</textarea>
        @if ($errors->has('about'))
        <span class="text-red">{{ $errors->first('about') }}</span><br>
        @endif
        <label for="price">Precio por hora</label>
        <input type="text" name="price" value="{{ old('price') ? old('price') : Auth::user()->price }}">
        @if ($errors->has('price'))
        <span class="text-red">{{ $errors->first('price') }}</span><br>
        @endif
        <label for="start">Horario disponible inicio</label>
        <select name="start" id="start" onchange="endChange();">
            <option value="01">01:00</option>
            <option value="02">02:00</option>
            <option value="03">03:00</option>
            <option value="04">04:00</option>
            <option value="05">05:00</option>
            <option value="06">06:00</option>
            <option value="07">07:00</option>
            <option value="08">08:00</option>
            <option value="09">09:00</option>
            <option value="10">10:00</option>
            <option value="11">11:00</option>
            <option value="12">12:00</option>
            <option value="13">13:00</option>
            <option value="14">14:00</option>
            <option value="15">15:00</option>
            <option value="16">16:00</option>
            <option value="17">17:00</option>
            <option value="18">18:00</option>
            <option value="19">19:00</option>
            <option value="20">20:00</option>
            <option value="21">21:00</option>
            <option value="22">22:00</option>
            <option value="23">23:00</option>
            <option value="00">00:00</option>
        </select>
        @if ($errors->has('start'))
        <span class="text-red">{{ $errors->first('start') }}</span><br>
        @endif
        <label for="end">Horario disponible fin</label>
        <select name="end" id="end">
        </select>
        @if ($errors->has('end'))
        <span class="text-red">{{ $errors->first('end') }}</span><br>
        @endif
        @endif
        <label for="">Foto de perfil:</label>
        <input type="file" name="profilePic" value="{{ old('birthdate') }}">
        @if ($errors->has('profilePic'))
        <span class="text-red">{{ $errors->first('profilePic') }}</span><br>
        @endif
        <input type="submit">
    </form>
</div>

@if(Auth::user()->role == 1)
<div class="login-form">
    <div style="flex-direction: column;">
        <h3 style="margin: 10px 0px;">Categoria</h3>
        @foreach (Auth::user()->categories as $category)
        <h5 style="margin: 5px 0px;">{{ $category->name }}</h5>
        <a href="" onclick="event.preventDefault(); document.querySelector('#category-delete-{{$category->id}}').submit();">Delete</a>
        <form action="{{ route('professor.category.delete', $category->id) }}" id="category-delete-{{$category->id}}" method="POST">
            @csrf
            @method("DELETE")
        </form>
        @endforeach
    </div>
</div>

<div class="login-form">
    <form action="{{ route('professor.category.add') }}" method="POST">
        @csrf
        <h4 style="margin: 15px 0px;">Agregar Categoria</h4>
        <select name="category">
            @foreach (App\Category::all() as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Agregar">
    </form>
</div>
@endif

@endsection

@section('js')
    <script>
        function endChange() {
            const start = document.querySelector('#start');
            const end = document.querySelector('#end');
            end.innerHTML = '';
            for (let i = Number(start.value) +1; i < 24; i++) {
                var formattedNumber = ("0" + i).slice(-2);

                end.innerHTML += "<option value='"+ formattedNumber +"'>" +formattedNumber + ":00" + "</option>";
            }
        }
    </script>    
@endsection
