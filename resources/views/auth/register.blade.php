@extends('layouts.app')

@section('content')

<div class="login-form">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h3>Sign Up</h3>
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="{{ old('name')}} ">
        @if ($errors->has('name'))
            <span class="text-red">{{ $errors->first('name') }}</span><br>
        @endif
        <label for="">Apellido:</label>
        <input type="text" name="lastName" value="{{ old('lastName')}} ">
        @if ($errors->has('lastName'))
            <span class="text-red">{{ $errors->first('lastName') }}</span><br>
        @endif
        <label for="">Email:</label>
        <input type="email" name="email" value="{{ old('email')}} ">
        @if ($errors->has('email'))
            <span class="text-red">{{ $errors->first('email') }}</span><br>
        @endif
        <label for="">Que Sos?</label>
        <select name="role">
            <option value="0" {{ (old('role') == '0') ? 'selected' : '' }}>Alumno</option>
            <option value="1" {{ (old('role') == '1') ? 'selected' : '' }}>Profesor</option>
        </select><br>
        @if ($errors->has('role'))
            <span class="text-red">{{ $errors->first('email') }}</span><br>
        @endif
        <label for="">Fecha de Nacimiento:</label>
        <input type="date" name="birthdate" value="{{ old('birthdate')}}">
        @if ($errors->has('birthdate'))
            <span class="text-red">{{ $errors->first('birthdate') }}</span><br>
        @endif
        <label for="file">Password:</label>
        <input type="password" name="password">
        @if ($errors->has('password'))
            <span class="text-red">{{ $errors->first('password') }}</span><br>
        @endif
        <label for="">Comfirmar Password:</label>
        <input type="password" name="password_confirmation">
        @if ($errors->has('password_confirmation'))
            <span class="text-red">{{ $errors->first('password_confirmation') }}</span><br>
        @endif
        <input type="submit">
    </form>
</div>
@endsection
