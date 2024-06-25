<?php

namespace App\Http\Controllers;

use App\Models\buyer;
use Illuminate\Http\Request;

class buyerController extends Controller
{
    public function index()
    {
        $data['buyer'] = buyer::all();


        dd($data);
    }

}
