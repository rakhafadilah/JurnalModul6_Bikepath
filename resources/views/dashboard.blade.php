@extends('layouts.app')

@section('title', 'Dashboard - BikePath')

@section('content')
    <h1>Dashboard</h1>
    <p class="sub">Halo, <b>{{ Auth::user()->name }}</b>. Anda berhasil login.</p>

    <div class="stats">
        <div class="stat"><div class="n">{{ $totalJalur }}</div><div class="t">Jalur sepeda</div></div>
        <div class="stat"><div class="n">{{ $totalKomunitas }}</div><div class="t">Komunitas</div></div>
        <div class="stat"><div class="n">{{ $totalAktivitas }}</div><div class="t">Aktivitas tercatat</div></div>
    </div>

    <div class="box">
        <h3 style="margin-top:0;">5 Aktivitas Terakhir Saya</h3>
        @if ($aktivitasSaya->isEmpty())
            <p class="muted">Anda belum memiliki aktivitas bersepeda.</p>
        @else
            <table>
                <thead>
                    <tr><th>Tanggal</th><th>Jalur</th><th>Jarak</th><th>Durasi</th></tr>
                </thead>
                <tbody>
                    @foreach ($aktivitasSaya as $a)
                        <tr>
                            <td>{{ \Illuminate\Support\Carbon::parse($a->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $a->jalur->nama ?? '-' }}</td>
                            <td>{{ $a->jarak_km }} km</td>
                            <td>{{ $a->durasi_menit }} menit</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection