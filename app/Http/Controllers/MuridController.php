<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('murid.index');
    }

    public function getPriority()
    {
        $priority = DB::table('class')->select('course_category')->get();
        return view('recommendation', ['data' =>$priority]);
    }

    public function Detail($id)
    {
        $qry = DB::table('class')
            ->where('class.id', $id)
            ->join('users AS user', 'class.user_id', '=', 'user.id')
            ->join('class_category', 'class.class_category_id', '=', 'class_category.id')
            ->select('class.class_name', 'class.course_category', 'class.class_cost', 'class_category.name', 'user.name AS mentor', 'class.class_permonth', 'class.class_description', 'class.class_photo', 'class.class_member_max')
            ->get();
        return view('murid.dashboardmateri', ['materi' => $qry]);
    }

    public function recommend()
    {
        $qry = DB::table('class')
            ->select('course_category')
            ->distinct()->get();
        return view('murid.recommendmentor', ['category' => $qry]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
