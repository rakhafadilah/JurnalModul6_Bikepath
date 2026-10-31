@extends('layouts.app')

@section('title', 'BikePath')

@section('content')
    <div class="box" style="padding: 40px;">
        <h1 style="font-size: 36px;">Selamat datang di BikePath</h1>
        <p class="sub">Temukan jalur sepeda, komunitas gowes, dan catat aktivitas bersepeda Anda.</p>
        <a class="btn" href="/jalur-sepeda">Lihat Jalur Sepeda</a>
        @guest
            <a class="btn ghost" href="{{ route('login') }}">Login</a>
        @else
            <a class="btn ghost" href="{{ route('dashboard') }}">Ke Dashboard</a>
        @endguest
    </div>
@endsection