<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JalurSepeda;

class JalurSepedaController extends Controller
{
    public function index()
    {
        $jalur = JalurSepeda::withCount('aktivitas')->get();

        return view('jalur-sepeda', ['jalur' => $jalur]);
    }

    public function create()
    {
        return view('jalur-sepeda-create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'              => ['required', 'string', 'max:255'],
            'kota'              => ['required', 'string', 'max:255'],
            'titik_awal'        => ['required', 'string', 'max:255'],
            'titik_akhir'       => ['required', 'string', 'max:255'],
            'jarak_km'          => ['required', 'numeric', 'min:0.1', 'max:9999'],
            'tingkat_kesulitan' => ['required', 'in:Mudah,Sedang,Sulit'],
            'deskripsi'         => ['nullable', 'string'],
        ]);

        JalurSepeda::create($data);

        return redirect('/jalur-sepeda')->with('success', 'Jalur sepeda berhasil ditambahkan.');
    }
}