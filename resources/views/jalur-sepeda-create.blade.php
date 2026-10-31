@extends('layouts.app')

@section('title', 'Tambah Jalur - BikePath')

@section('content')
    <div class="box narrow" style="max-width: 640px;">
        <h1>Tambah Jalur Sepeda</h1>
        <p class="sub">Halaman ini hanya bisa dibuka setelah login.</p>

        <form method="POST" action="{{ route('jalur.store') }}">
            @csrf

            <label for="nama">Nama Jalur</label>
            <input id="nama" type="text" name="nama" value="{{ old('nama') }}" required>

            <label for="kota">Kota</label>
            <input id="kota" type="text" name="kota" value="{{ old('kota') }}" required>

            <label for="titik_awal">Titik Awal</label>
            <input id="titik_awal" type="text" name="titik_awal" value="{{ old('titik_awal') }}" required>

            <label for="titik_akhir">Titik Akhir</label>
            <input id="titik_akhir" type="text" name="titik_akhir" value="{{ old('titik_akhir') }}" required>

            <label for="jarak_km">Jarak (km)</label>
            <input id="jarak_km" type="number" step="0.01" min="0.1" name="jarak_km" value="{{ old('jarak_km') }}" required>

            <label for="tingkat_kesulitan">Tingkat Kesulitan</label>
            <select id="tingkat_kesulitan" name="tingkat_kesulitan" required>
                @foreach (['Mudah', 'Sedang', 'Sulit'] as $t)
                    <option value="{{ $t }}" {{ old('tingkat_kesulitan') === $t ? 'selected' : '' }}>{{ $t }}</option>
                @endforeach
            </select>

            <label for="deskripsi">Deskripsi (opsional)</label>
            <textarea id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>

            <button type="submit" class="btn">Simpan</button>
            <a class="btn ghost" href="/jalur-sepeda">Batal</a>
        </form>
    </div>
@endsection