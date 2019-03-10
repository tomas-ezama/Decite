@extends('layouts.app')

@section('content')

<div class="login-form">
    <form action="{{ route('login') }}" method="post">
        @csrf
        <h3>Login</h3>
        <label for="">Email:</label>
        <input type="email" name="email" value="<?= old('email'); ?>">
        @if ($errors->has('email'))
            <span class="text-red">{{ $errors->first('email') }}</span><br>
        @endif
        
        <label for="">Contraseña:</label>
        <input type="password" name="password">
        @if ($errors->has('password'))
            <span class="text-red">{{ $errors->first('password') }}</span><br>
        @endif

        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">Recordar mi Contraseña</label>

        <input type="submit" class="btn btn-primary" value="Login">

        <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>

    </form>
</div>

@endsection