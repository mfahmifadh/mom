<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addPriority(Request $request)
    {
        $p1 = $request->input('p1');
        $p2 = $request->input('p2');
        $p3 = $request->input('p3');
        $id = Auth::id(); 
        $data=array('p1'=>$p1,"p2"=>$p2,"p3"=>$p3,"user_id"=>$id);
        $check = DB::table('recommendation_priority')->where('user_id','=',$id)->count();
        if($check==0){
            DB::table('recommendation_priority')->insert($data);
        }else{
            DB::table('recommendation_priority')-> where('user_id' , '=', $id)->update(['p1' => $p1,'p2' => $p2,'p3' => $p3]);
        }
        return redirect('recommendation');
    }

    public function Detail($id)
    {
        $qry = DB::table('class')
            ->where('class.id', $id)
            ->join('users AS user', 'class.user_id', '=', 'user.id')
            ->join('class_category', 'class.class_category_id', '=', 'class_category.id')
            ->select('class.id', 'class.class_name', 'class.course_category', 'class.class_cost', 'class_category.name', 'user.name AS mentor', 'class.class_permonth', 'class.class_description', 'class.class_photo', 'class.class_member_max')
            ->get();
        return view('murid.dashboardmateri', ['materi' => $qry]);
    }

    public function recommend()
    {
        $id = Auth::id();
        $qry = DB::table('class')
            ->select('course_category')
            ->distinct()->get();
        $mentor = DB::table('users')-> select('users.*', 'recommendation_mentor_result.*')
            ->where('recommendation_mentor_result.murid_id', $id)
            ->join('recommendation_mentor_result', 'recommendation_mentor_result.mentor_id', '=', 'users.id')
            ->orderby('recommendation_mentor_result.result', 'DESC')
            ->get();
        return view('murid.recommendmentor', ['category' => $qry, 'mentor' => $mentor]);
    }

    public function checkout($id)
    {
        $qry = DB::table('class')
            ->where('class.id', $id)
            ->join('users AS user', 'class.user_id', '=', 'user.id')
            ->join('class_category', 'class.class_category_id', '=', 'class_category.id')
            ->select('class.class_name', 'class.course_category', 'class.class_cost', 'class_category.name', 'user.name AS mentor', 'class.class_permonth', 'class.class_description', 'class.class_photo', 'class.class_member_max', 'class.class_time_perday')
            ->get();
        return view('murid.checkout', ['materis' => $qry]);
    }
    public function GetClass(){
        $class = DB::table('class')
        ->join('users AS user', 'class.user_id', '=', 'user.id')
        ->join('class_category', 'class.class_category_id', '=', 'class_category.id')
        ->select('class.id', 'class.class_name', 'class.course_category', 'class.class_cost', 'class_category.name', 'user.name AS mentor', 'class.class_permonth', 
                 'class.class_description', 'class.class_photo', 'class.class_member_max')
        ->get();
        return view('murid.page_class', ['materis' => $class]);
    }
}
