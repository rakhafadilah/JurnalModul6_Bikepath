@extends('layouts.app')

@section('title', 'Profil - BikePath')

@section('content')
    <div class="box narrow">
        <h1>Profil Saya</h1>
        <p class="sub">Data akun yang sedang login (Auth::user()).</p>

        <table>
            <tr><th>Nama</th><td>{{ $user->name }}</td></tr>
            <tr><th>Email</th><td>{{ $user->email }}</td></tr>
            <tr><th>Akun dibuat</th><td>{{ $user->created_at->format('d-m-Y H:i') }} ({{ $user->created_at->diffForHumans() }})</td></tr>
        </table>
    </div>
@endsection