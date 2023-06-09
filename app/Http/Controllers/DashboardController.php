<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absen;

class DashboardController extends Controller
{
    //

    public function admin()
    {
        $users = User::all();
        $totalUser = $users->count();
        $totalReport = Report::all()->count();
        $date = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime("-1 days"));
        $reports = Report::all();
        $absen = Absen::all();
        return view('dashboard.admin' , compact('totalUser' , 'totalReport' , 'date', 'users', 'yesterday', 'reports', 'absen'));
    }

    public function petugas()
    {
        return view('dashboard.petugas');
    }

    public function user()
    {
        return view('dashboard.user');
    }

    public function adminTable()
    {
        $users = User::all();
        return view('tables.admin', compact('users'));
    }

    public function petugasTable()
    {
        $users = User::all();
        return view('tables.petugas', compact('users'));
    }
}
