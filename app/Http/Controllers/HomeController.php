<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\JalurSepeda;
use App\Models\Komunitas;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        return view('dashboard', [
            'totalJalur'      => JalurSepeda::count(),
            'totalKomunitas'  => Komunitas::count(),
            'totalAktivitas'  => Aktivitas::count(),
            'aktivitasSaya'   => Aktivitas::with('jalur')
                                    ->where('user_id', $user->id)
                                    ->latest('tanggal')
                                    ->take(5)
                                    ->get(),
        ]);
    }

    public function profile()
    {
        return view('profile', ['user' => Auth::user()]);
    }
}