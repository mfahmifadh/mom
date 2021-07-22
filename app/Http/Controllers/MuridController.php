<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Transaction;

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
        $data = array('p1' => $p1, "p2" => $p2, "p3" => $p3, "user_id" => $id);
        $check = DB::table('recommendation_priority')->where('user_id', '=', $id)->count();
        if ($check == 0) {
            DB::table('recommendation_priority')->insert($data);
        } else {
            DB::table('recommendation_priority')->where('user_id', '=', $id)->update(['p1' => $p1, 'p2' => $p2, 'p3' => $p3]);
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
        return view('murid.materidetails', ['materi' => $qry]);
    }

    public function recommend()
    {
        $id = Auth::id();
        $qry = DB::table('class')
            ->select('course_category')
            ->distinct()->get();
        $mentor = DB::table('users')->select('users.*', 'recommendation_mentor_result.*')
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
            ->select(
                'class.id as class_id',
                'class.class_name',
                'class.course_category',
                'class.class_cost',
                'class_category.name',
                'user.name AS mentor',
                'class.class_permonth',
                'class.user_id as mentor_id',
                'class.class_description',
                'class.class_photo',
                'class.class_member_max',
                'class.class_time_perday'
            )
            ->get();
        return view('murid.checkout', ['materis' => $qry]);
    }
    public function GetClass()
    {
        $class = DB::table('class')
            ->join('users AS user', 'class.user_id', '=', 'user.id')
            ->join('class_category', 'class.class_category_id', '=', 'class_category.id')
            ->select(
                'class.id',
                'class.class_name',
                'class.course_category',
                'class.class_cost',
                'class_category.name',
                'user.name AS mentor',
                'class.class_permonth',
                'class.class_description',
                'class.class_photo',
                'class.class_member_max'
            )
            ->get();
        return view('murid.page_class', ['materis' => $class]);
    }

    public function getMentor()
    {
        $mentor = DB::table('users')
            ->where('users.role_id', '=', '3')
            ->join('mentor_data', 'users.id', '=', 'mentor_data.user_id')
            ->where('mentor_data.status_account', '=', '2')
            ->get();
        return view('murid.page_mentor', ['mentors' => $mentor]);
    }

    public function mentorDetail($id)
    {
        $qry = DB::table('users')
            ->where('users.id', $id)
            ->join('mentor_data', 'users.id', '=', 'mentor_data.user_id')
            ->join('class', 'users.id', '=', 'class.user_id')
            ->get();
        // dd($qry);
        return view('murid.mentordetails', ['mentors' => $qry]);
    }
    public function Booking(Request $request)
    {
        $id = Auth::id();
        $booking_class                   = new Booking();
        $booking_class->murid_id         = $id;
        $booking_class->class_id         = $request->input('class_id');
        $booking_class->class_progress   = $request->input('class_progress');
        $booking_class->class_status     = $request->input('class_status');
        $booking_class->save();

        $getBooking = DB::table('booking')->orderby('id', 'DESC')->first();

        $transaction                     = new Transaction();
        $transaction->murid_id           = $id;
        $transaction->mentor_id          = $request->input('mentor_id');
        $transaction->booking_id         = $getBooking->id;
        $transaction->total_payment      = $request->input('total_payment');
        $transaction->payment_status     = $request->input('payment_status');
        $transaction->transaction_status = $request->input('transaction_status');

        if ($request->hasfile('receipt')) {
            $file = $request->file('receipt');
            $extension = $file->getClientOriginalExtension();
            $receipt = time() . '.' . $extension;
            $file->move('img/receipt/', $receipt);
            $transaction->receipt = $receipt;
        } else {
            return $request;
            $transaction->image = '';
        }

        $transaction->save();
        return view('murid.confirm_checkout')->with('alert-success', 'Berhasil Menambah Data!');
    }

    public function GetTransaction()
    {
    }
}
