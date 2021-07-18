<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Materi;


class BerandaController extends Controller
{

    public function show()
    {
        $mentors = DB::table('users')
            ->where('users.role_id', '=', '3')
            ->join('mentor_data', 'users.id', '=', 'mentor_data.user_id')
            ->where('mentor_data.status_account', '=', '2')
            ->get();

        $materis = DB::table('class')
            ->get();

        return view('index', compact('mentors', 'materis'));
    }


    public function showMentor()
    {
        $mentor = DB::table('users')
            ->where('users.role_id', '=', '3')
            ->join('mentor_data', 'users.id', '=', 'mentor_data.user_id')
            ->where('mentor_data.status_account', '=', '2')
            ->get();
        return view('indexmentor', ['mentors' => $mentor]);
    }

    public function showMateri()
    {
        $materi = DB::table('class')
            ->join('class_category', 'class.class_category_id', '=', 'class_category.id')
            ->select('class.id', 'class.class_name', 'class.class_cost', 'class.course_category', 'class.class_name', 'class.class_description', 'class.class_photo')
            ->get();
        return view('indexmateri', ['materis' => $materi]);
    }

    public function showDetail($id)
    {
        $qry = DB::table('class')
            ->where('class.id', $id)
            ->join('users AS user', 'class.user_id', '=', 'user.id')
            ->join('class_category', 'class.class_category_id', '=', 'class_category.id')
            ->select('class.class_name', 'class.course_category', 'class.class_cost', 'class_category.name', 'user.name AS mentor', 'class.class_permonth', 'class.class_description', 'class.class_photo', 'class.class_member_max')
            ->get();
        return view('materidetail', ['materi' => $qry]);
    }
}
