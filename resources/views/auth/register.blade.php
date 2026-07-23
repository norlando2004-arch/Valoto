@extends('auth.layout')

@section('title', 'Crear cuenta')
@section('heading', 'Crear cuenta')

@section('content')
    <form method="POST" action="{{ route('register.attempt') }}">
        @csrf

        <div class="field">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="field">
            <label for="email">Correo electronico</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="field">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required minlength="8">
        </div>

        <div class="field">
            <label for="password_confirmation">Confirmar contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8">
        </div>

        <button type="submit" class="save">Crear cuenta</button>
    </form>

    <p class="auth-switch">¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesion</a></p>
@endsection
