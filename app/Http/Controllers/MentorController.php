<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\MentorData;
use App\Models\ClassData;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function addCourses()
    {
        $class_category = DB::table("class_category")->get();
        return view('mentor.add_courses', compact('class_category'));
    }

    public function GetCourse($id)
    {
        $course = DB::table("class")
            ->join('class_category', 'class.class_category_id', '=', 'class_category.id')
            ->select(
                'class.id',
                'class_category.name',
                'class.course_category',
                'class.class_name',
                'class.class_member_max',
                'class.class_status',
                'class.class_time_perday',
                'class.class_permonth',
                'class.class_cost'
            )
            ->where('user_id', $id)
            ->get();

        return view('mentor.page_course', compact('course'));
    }

    public function GetIncome()
    {
        $id = Auth::id();
        $income = DB::table("cost")
            ->where('cost.mentor_id', $id)
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

        return view('mentor.page_income', compact('income'));
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

    public function PostCourse(Request $request)
    {
        $class  = new ClassData();
        $class->user_id             = $request->input('user_id');
        $class->class_category_id   = $request->input('class_category_id');
        $class->course_category     = $request->input('course_category');
        $class->class_name          = $request->input('class_name');
        $class->class_description   = $request->input('class_description');
        $class->class_member_max    = $request->input('class_member_max');
        $class->class_time_perday   = $request->input('class_time_perday');
        $class->class_permonth      = $request->input('class_permonth');
        $class->class_cost          = $request->input('class_cost');
        $class->class_status        = $request->input('class_status');

        if ($request->hasfile('class_photo')) {
            $file = $request->file('class_photo');
            $extension = $file->getClientOriginalExtension();
            $class_photo = time() . '.' . $extension;
            $file->move('img/course/', $class_photo);
            $class->class_photo = $class_photo;
        } else {
            return $request;
            $class->image = '';
        }

        $class->save();
        return redirect('mentor/dashboard')->with('alert-success', 'Berhasil Menambah Data!');
    }

    public function courseCategory($id)
    {
        $course_category = DB::table("course_category")->where("id", $id)->pluck("name", "id");
        return json_code($course_category);
    }

    public function EditCourse($id)
    {
        $class = DB::table("class")
            ->join('class_category', 'class.class_category_id', '=', 'class_category.id')
            ->select(
                'class.id',
                'class_category.name',
                'class.course_category',
                'class.class_name',
                'class.class_member_max',
                'class.class_status',
                'class.class_time_perday',
                'class.class_permonth',
                'class.class_cost',
                'class.class_description',
                'class.class_category_id',
                'class.user_id'
            )
            ->where('class.id', $id)
            ->get();
        $class_category = DB::table("class_category")->get();
        return view('mentor/edit_page_course', compact('class', 'class_category'));
    }

    public function UpdateCourse(Request $request, $id)
    {
        $class = ClassData::find($id);
        $class->user_id             = $request->get('user_id');
        $class->class_category_id   = $request->get('class_category_id');
        $class->course_category     = $request->get('course_category');
        $class->class_name          = $request->get('class_name');
        $class->class_description   = $request->get('class_description');
        $class->class_member_max    = $request->get('class_member_max');
        $class->class_time_perday   = $request->get('class_time_perday');
        $class->class_permonth      = $request->get('class_permonth');
        $class->class_cost          = $request->get('class_cost');
        $class->class_status        = $request->get('class_status');

        $file = $request->file('class_photo');
        $extension = $file->getClientOriginalExtension();
        $class_photo = time() . '.' . $extension;
        $file->move('img/tanaman/', $class_photo);
        $class->class_photo = $class_photo;

        $class->save();
        return redirect('mentor/dashboard')->with('alert-success', 'Berhasil Menghapus Data!');
    }


    public function deleteCourse($id)
    {
        $class = ClassData::find($id);
        if (file_exists(public_path() . '/img/course/' . $class->class_photo)) {
            unlink(public_path() . '/img/course/' . $class->class_photo);
        }
        $class->delete();
        return redirect('mentor/dashboard')->with('alert-success', 'Berhasil Menghapus Data!');
    }
}
