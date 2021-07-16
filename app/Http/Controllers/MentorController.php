<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\MentorData;
use Illuminate\Support\Facades\Schema;
use DB;

class MentorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mentor.index');
    }

    public function check_mentor($id)
    {
        $cek_data_mentor        = MentorData::where('user_id', $id)->get()->count();
        //dump($cek);
        if ($cek_data_mentor == 0) {
            return view('mentor.page_documents.index');
            // return view ('mentor.index');
        } else {
            return redirect('mentor/dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function PostDocument(Request $request)
    {
        $mentor_data                    = new MentorData();
        $mentor_data->user_id           = $request->input('user_id');
        $mentor_data->about             = $request->input('about');
        $mentor_data->education_history = $request->input('education_history');
        $mentor_data->experience        = $request->input('experience');
        $mentor_data->skill             = $request->input('skill');
        $mentor_data->portfolio         = $request->input('portfolio');
        $mentor_data->certificate       = $request->input('certificate');
        $mentor_data->status_account    = $request->input('status_account');
        $mentor_data->save();
        return view('mentor.index')->with('alert-success', 'Berhasil Menambah Data!');
    }

    public function addCourses()
    {
        return view('mentor.add_courses');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
