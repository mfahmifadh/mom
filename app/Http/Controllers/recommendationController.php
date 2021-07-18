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

    public function recommendation()
    {   
        $id = Auth::id(); 
       
        $checkV = DB::table('recommendation_mentor_alternative_value')->count();
        $checkR = DB::table('recommendation_mentor_alternative_result')->count();
        
        if ($checkV != 0) {
            $maxP1 = DB::table('recommendation_mentor_alternative_value')->max('p1');
            $maxP2 = DB::table('recommendation_mentor_alternative_value')->max('p2');
            $maxP3 = DB::table('recommendation_mentor_alternative_value')->max('p3');
        }
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
            $wp1 = $dp1/$maxP1;
            $wp2 = $dp2/$maxP2;
            $wp3 = $dp3/$maxP3;
           
            if ($checkV = 0) {
            $data=array('p1'=>$p1,"p2"=>$p2,"p3"=>$p3,"user_id"=>$item->id);
            DB::table('recommendation_mentor_alternative_value')->insert($data);
            } 

            if($checkR != 0){
            DB::table('recommendation_mentor_alternative_result')-> where('user_id' , '=', $item->id)->update(['p1' => $wp1,'p2' => $wp2,'p3' => $wp3]);
            }

            else{
            DB::table('recommendation_mentor_alternative_value')-> where('user_id' , '=', $item->id)->update(['p1' => $p1,'p2' => $p2,'p3' => $p3]);
            $data=array('p1'=>$wp1,"p2"=>$wp2,"p3"=>$wp3,"user_id"=>$item->id);
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
            $data=array('result'=>$result,'user_id'=>$r->user_id);
            DB::table('recommendation_mentor_result')->insert($data);
            // return view('recommendation', ['data' => $rp1]);
            
        }
        
    }
}