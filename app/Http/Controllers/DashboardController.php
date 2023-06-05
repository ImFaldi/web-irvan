<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('dashboard.admin' , compact('totalUser' , 'totalReport' , 'date', 'users', 'yesterday', 'reports'));
    }

    public function petugas()
    {
        return view('dashboard.petugas');
    }

    public function user()
    {
        return view('dashboard.user');
    }
}
