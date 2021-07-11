<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Fascades\Validator;
use App\Http\Controllers\StudentController;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Displaying registered student for admin
        return view('student.index');
    }
    /**
     * Display all registrant for student
     *
     */
    public function registrant(){
        // Display if student isn't in list it's mean the student is not pass
        return view('student.pendaftar');
    }
    /**
     * Find student with registered NISN
     *
     */
    public function printView(){
        return view('student.cetak');
    }
    /**
     * Print proof of registration
     *
     */
    public function print(Student $student){


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Go to registration form
        return view('student.daftar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Store data from registration form into database
        $request->validate([
            'name' => 'required',
            'nisn' => 'required|max:10|unique:students',
            'asal_sekolah' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'nama_wali' => 'required',
            'alamat_wali' => 'required',
            'jarak' => 'required',
            'file' => 'required|max:2048',
        ], $this->messages());
        $name = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storePubliclyAs('foto', $name,'public');
        $student = new Student($request->all());
        $student->path = $path;
        $student->save();    
        return redirect('student/create')->with('status', 'Berhasil');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Harap isi bidang ini',
            'unique' => ':attribute telah terdaftar',
            'max' => 'Ukuran gambar melebihi 2MB',
        ];
    }
}
