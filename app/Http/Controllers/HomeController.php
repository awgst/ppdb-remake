<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\StudentController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show all data from students
     */
    public function fetchData(){
        return view('admin.fetchData');
    }

    /**
     * Get all data
     */
    public function loadData(){
        $data = Student::all();
        return response()->json($data, 200);
    }
    /**
     * Get summary of all data
     */
    public function loadStats(){
        $total = count(Student::all());
        $boy = count(DB::table('students')->where('jenis_kelamin','=','Laki-laki')->get());
        $girl = count(DB::table('students')->where('jenis_kelamin','=','Perempuan')->get());
        $data = collect([
            'total'=>$total,
            'boy'=>$boy,
            'girl'=>$girl,
        ]);
        $data->toJson();
        return $data;
    }
}
