<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seminar;

class SeminarController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel 'seminars'
        $seminars = Seminar::all();

        // Meneruskan data ke view 'seminars.index'
        return view('infoBuyTicket', compact('seminars'));
    }

    public function index1()
    {
        // Mengambil semua data dari tabel 'seminars'
        $seminars = Seminar::all();

        return view('buyTicket', compact('seminars'));
    }

    public function index2()
    {
        // Mengambil semua data dari tabel 'seminars'
        $seminars = Seminar::all();

        return view('myTicket', compact('seminars'));
    }

    public function index3()
    {
        // Mengambil semua data dari tabel 'seminars'
        $seminars = Seminar::all();

        return view('infoMyTicket', compact('seminars'));
    }

    public function index4()
    {
        // Mengambil semua data dari tabel 'seminars'
        $seminars = Seminar::all();

        return view('dashboard', compact('seminars'));
    }
}
