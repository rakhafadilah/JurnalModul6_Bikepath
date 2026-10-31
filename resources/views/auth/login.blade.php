@extends('layouts.app')

@section('title', 'Login - BikePath')

@section('content')
    <div class="box narrow">
        <h1>Login</h1>
        <p class="sub">Masuk untuk mengelola data BikePath.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email">

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">

            <div class="check">
                <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Ingat saya</label>
            </div>

            <button type="submit" class="btn full">Login</button>
        </form>

        <p class="muted" style="margin-bottom:0; margin-top:18px;">Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
    </div>
@endsection