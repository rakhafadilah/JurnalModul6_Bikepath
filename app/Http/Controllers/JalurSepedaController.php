<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JalurSepeda;

class JalurSepedaController extends Controller
{
    public function index()
    {
        // withCount menghitung jumlah aktivitas per jalur (memakai relasi hasMany)
        $jalur = JalurSepeda::withCount('aktivitas')->get();

        return view('jalur-sepeda', ['jalur' => $jalur]);
    }
}
