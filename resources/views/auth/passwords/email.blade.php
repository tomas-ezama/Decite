@extends('layouts.app')

@section('content')
<div class="login-form">
    
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="card-header">{{ __('Reset Password') }}</div>
        <br>
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span class="text-red">{{ $errors->first('email') }}</span>
        @endif
        
        <input type="submit" class="btn btn-primary" value="Send Password Reset Link">
    </form>
</div>
@endsection
