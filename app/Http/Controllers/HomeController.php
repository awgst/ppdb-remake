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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        // return edit view
        return view('admin.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        // Store Edited Data to DB
        $request->validate([
            'name' => 'required',
            'nisn' => 'required|size:10',
            'asal_sekolah' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'nama_wali' => 'required',
            'alamat_wali' => 'required',
            'jarak' => 'required',
            'path' => 'required',
        ], $this->messages());
        Student::where('id', $student->id)->update($request->except(['_method','_token']));
        return redirect(url('fetchData'))->with('status', 'Berhasil');
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    private function messages()
    {
        return [
            'required' => 'Harap isi bidang ini',
            'unique' => ':attribute telah terdaftar',
            'size' => 'jumlah :attribute harus 10 karakter'
        ];
    }

}
