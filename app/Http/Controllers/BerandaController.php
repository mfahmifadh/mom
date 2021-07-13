<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BerandaController extends Controller
{

    public function show()
    {
        $mentors = DB::table('users')->where([['role_id', '=', '3'], ['status_id', '=', '2']])->get();
        $materis = DB::table('materi')
            ->select('judul', 'kategori', 'harga', 'deskripsi', 'photo')
            ->get();
        return view('index', compact('mentors', 'materis'));
    }

    public function showMentor()
    {
        $mentor = DB::table('users')->where([['role_id', '=', '3'], ['status_id', '=', '2']])->get();
        return view('indexmentor', ['mentors' => $mentor]);
    }

    public function showMateri()
    {
        $materi = DB::table('materi')
            ->select('judul', 'kategori', 'harga', 'deskripsi', 'photo')
            ->get();
        return view('indexmateri', ['materis' => $materi]);
    }
}
