@extends('auth.layout')

@section('title', 'Iniciar sesion')
@section('heading', 'Iniciar sesion')

@section('content')
    <form method="POST" action="{{ route('login.attempt') }}">
        @csrf

        <div class="field">
            <label for="email">Correo electronico</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="field">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
        </div>

        <label class="field-check">
            <input type="checkbox" name="remember">
            Recordarme
        </label>

        <button type="submit" class="save">Entrar</button>
    </form>

    <p class="auth-switch">¿No tienes cuenta? <a href="{{ route('register') }}">Registrate</a></p>
@endsection
