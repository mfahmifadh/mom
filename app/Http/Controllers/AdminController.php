<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function transaction()
    {
        $id = Auth::id();
        $income = DB::table("cost")
            ->join('users', 'cost.murid_id', '=', 'users.id')
            ->join('booking', 'cost.booking_id', '=', 'booking.id')
            ->join('class', 'booking.class_id', '=', 'class.id')
            ->select(
                'cost.id',
                'cost.booking_id',
                'cost.transaction_date',
                'cost.total_payment',
                'cost.payment_status',
                'cost.transaction_status',
                'users.name as student_name',
                'users.email',
                'class.class_name',
                'class.class_time_perday',
                'class.class_permonth',
            )
            ->get();

        return view('admin.transaction', compact('income'));
    }


    public function editTransaction($id)
    {
        $income = DB::table("cost")
            ->join('users', 'cost.murid_id', '=', 'users.id')
            ->join('booking', 'cost.booking_id', '=', 'booking.id')
            ->join('class', 'booking.class_id', '=', 'class.id')
            ->select(
                'cost.id',
                'cost.booking_id',
                'cost.transaction_date',
                'cost.total_payment',
                'cost.payment_status',
                'cost.transaction_status',
                'users.name as student_name',
                'users.email',
                'class.class_name',
                'class.class_time_perday',
                'class.class_permonth',
            )
            ->get();
        DB::table('cost')-> where('id', $id)->update(['transaction_status' => 'Approve']);
        return redirect('admin/transaction');
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
