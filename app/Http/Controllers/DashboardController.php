<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function showDataPengguna()
    {
        $data['users'] = User::all();


        return view('data_pengguna',$data);
    }

}
