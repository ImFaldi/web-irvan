<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;

class AbsenController extends Controller
{
    //

    public function AbsentHadir(Request $request)
    {
        $absen = Absen::create([
            'status' => 'hadir',
            'user_id' => $request->user_id,
        ]);

        if ($absen) {
            return redirect()->back()->with('success', 'Absen berhasil');
        } else {
            return redirect()->back()->with('error', 'Absen gagal');
        }
    }

    public function AbsentIzin(Request $request)
    {
        $absen = Absen::create([
            'status' => 'izin',
            'user_id' => $request->user_id,
        ]);

        if ($absen) {
            return redirect()->back()->with('success', 'Absen berhasil');
        } else {
            return redirect()->back()->with('error', 'Absen gagal');
        }
    }

    public function AbsentSakit(Request $request)
    {
        $absen = Absen::create([
            'status' => 'sakit',
            'user_id' => $request->user_id,
        ]);

        if ($absen) {
            return redirect()->back()->with('success', 'Absen berhasil');
        } else {
            return redirect()->back()->with('error', 'Absen gagal');
        }
    }
}
