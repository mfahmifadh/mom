<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BerandaController extends Controller
{

    public function index()
    {
        $mentor = DB::table('users')->where([['role_id', '=', '3']])->get();
        //dump($mentor);
        return view('index', ['listMentor' => $mentor]);
    }
}
