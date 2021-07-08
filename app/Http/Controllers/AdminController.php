<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {
        if(Gate::denies('manage-users')){
            abort(403);
        }
        return view('admin.index');
    }

    public function verifikasi()
    {
        $mentor = DB::table('users')-> select('users.*', 'status_mentor.status')-> where('role_id','=','3')->join('status_mentor', 'users.status_id', '=', 'status_mentor.id')-> get();
        $pendaftar = DB::table('users')-> where('role_id','=','3') -> count();
        // dump($mentor);
        return view('admin.verifikasi-mentor.index',['listMentor' => $mentor],['pendaftar' =>$pendaftar]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
