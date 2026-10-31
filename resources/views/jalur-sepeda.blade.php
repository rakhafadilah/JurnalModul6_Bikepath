@extends('layouts.app')

@section('title', 'Daftar Jalur Sepeda - BikePath')

@section('style')
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(290px, 1fr)); gap: 16px; }
        .kartu { background: #131a2e; border: 1px solid #1e293b; border-top: 4px solid #3b82f6; border-radius: 16px; padding: 18px; }
        .kartu h3 { margin: 0 0 6px; color: #fff; }
        .kota { color: #38bdf8; font-size: 13px; margin-bottom: 10px; }
        .info { font-size: 14px; color: #94a3b8; line-height: 1.7; }
        .info b { color: #e2e8f0; }
        .badge { display: inline-block; margin-top: 10px; padding: 3px 12px; border-radius: 999px; font-size: 12px; font-weight: 700; color: #fff; background: #3b82f6; }
        .badge.mudah { background: #16a34a; }
        .badge.sedang { background: #2563eb; }
        .badge.sulit { background: #7c3aed; }
@endsection

@section('content')
    <h1>Daftar Jalur Sepeda</h1>
    <p class="sub">Total {{ $jalur->count() }} jalur, data diambil dari database.</p>

    <div class="grid">
        @foreach ($jalur as $j)
            <div class="kartu">
                <h3>{{ $j->nama }}</h3>
                <div class="kota">📍 {{ $j->kota }}</div>
                <div class="info">
                    Rute: <b>{{ $j->titik_awal }}</b> → <b>{{ $j->titik_akhir }}</b><br>
                    Jarak: <b>{{ $j->jarak_km }} km</b><br>
                    Aktivitas tercatat: <b>{{ $j->aktivitas_count }}</b>
                </div>
                <span class="badge {{ strtolower($j->tingkat_kesulitan) }}">{{ $j->tingkat_kesulitan }}</span>
            </div>
        @endforeach
    </div>
@endsection