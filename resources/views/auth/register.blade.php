@extends('layouts.app')

@section('title', 'Register - BikePath')

@section('content')
    <div class="box narrow">
        <h1>Register</h1>
        <p class="sub">Buat akun BikePath baru.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name">Nama</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

            <label for="password">Password (min. 8 karakter)</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">

            <label for="password_confirmation">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">

            <button type="submit" class="btn full">Register</button>
        </form>

        <p class="muted" style="margin-bottom:0; margin-top:18px;">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
    </div>
@endsection