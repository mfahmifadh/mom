<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class recommendationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getMax()
    {
        $maxP1 = DB::table('recommendation_mentor_alternative_value')->max('p1');
        $maxP2 = DB::table('recommendation_mentor_alternative_value')->max('p2');
        $maxP3 = DB::table('recommendation_mentor_alternative_value')->max('p3');
    }

    public function recommendation()
    {   
        $id = Auth::id();
        $get_mentor = DB::table('users')
        ->select('id')
        ->where('role_id', '=', 3)
        ->get();
        foreach($get_mentor as $item){
            // $i=0;
            $up = DB::table('recommendation_priority')
            ->where('user_id', '=', $id) 
            ->get();
            foreach($up as $data_up){
                
                $dp1 = DB::table('class')
                ->where('user_id','=',$item->id)
                ->where('course_category','=',$data_up->p1)
                ->count();
                $dp2 = DB::table('class')
                ->where('user_id','=',$item->id)
                ->where('course_category','=',$data_up->p2)
                ->count();
                $dp3 = DB::table('class')
                ->where('user_id','=',$item->id)
                ->where('course_category','=',$data_up->p3)
                ->count();

            }
            
            $p1 = $dp1;
            $p2 = $dp2;
            $p3 = $dp3;
            
            
            $checkV = DB::table('recommendation_mentor_alternative_value')->where('mentor_id','=',$item->id)->where('murid_id','=',$id)->count();
            if ($checkV == 0) {
                $data=array('p1'=>$p1,"p2"=>$p2,"p3"=>$p3,"mentor_id"=>$item->id,"murid_id"=>$id);
                DB::table('recommendation_mentor_alternative_value')->insert($data);
            }
            else if ($checkV != 0) {
                DB::table('recommendation_mentor_alternative_value')-> where('mentor_id' , '=', $item->id)->where('murid_id' ,'=', $id)-> update(['p1' => $p1,'p2' => $p2,'p3' => $p3]);
            }
        }

        $sumP1 = DB::table('recommendation_mentor_alternative_value')->where('murid_id' ,'=', $id)->sum('p1');
        $sumP2 = DB::table('recommendation_mentor_alternative_value')->where('murid_id' ,'=', $id)->sum('p2');
        $sumP3 = DB::table('recommendation_mentor_alternative_value')->where('murid_id' ,'=', $id)->sum('p3');

        $getMentorValue = DB::table('recommendation_mentor_alternative_value')->get();
        foreach($getMentorValue as $item){
            $wp1 = $item->p1/$sumP1;
            $wp2 = $item->p2/$sumP2;
            $wp3 = $item->p3/$sumP3;
            $checkR = DB::table('recommendation_mentor_alternative_result')->where('mentor_id' , '=', $item->mentor_id)->where('murid_id' ,'=', $id)->count();            
            
            if($checkR != 0){
            DB::table('recommendation_mentor_alternative_result')-> where('mentor_id' , '=', $item->mentor_id)->where('murid_id' ,'=', $id)->update(['p1' => $wp1,'p2' => $wp2,'p3' => $wp3]);
            }
            else{
            $data=array('p1'=>$wp1,"p2"=>$wp2,"p3"=>$wp3,"mentor_id"=>$item->mentor_id,"murid_id"=>$id);
            DB::table('recommendation_mentor_alternative_result')->insert($data);
            }
        }
        $get_criterion_weight = DB::table('recommendation_criterion_weight') ->first();
        $get_result = DB::table('recommendation_mentor_alternative_result')->get();
        foreach($get_result as $r){
            $rp1 = $get_criterion_weight->p1*$r->p1;
            $rp2 = $get_criterion_weight->p2*$r->p2;
            $rp3 = $get_criterion_weight->p3*$r->p3;
            $result = $rp1 + $rp2 + $rp3;
            $data=array('result'=>$result,"mentor_id"=>$r->mentor_id,"murid_id"=>$id);
            $checkR = DB::table('recommendation_mentor_result')-> where('mentor_id' , '=', $r->mentor_id)->where('murid_id' ,'=', $id)->count();
            if($checkR == 0){
                DB::table('recommendation_mentor_result')->insert($data);
            }
            else{
                DB::table('recommendation_mentor_result')-> where('mentor_id' , '=', $r->mentor_id)->where('murid_id' ,'=', $id)->update(['result' => $result]);
            }
        }
        return redirect('murid/recommendmentor');
    }
}