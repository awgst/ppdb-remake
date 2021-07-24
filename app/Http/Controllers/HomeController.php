<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $boy = count(Student::where('jenis_kelamin', 'Laki-laki')->get());
        $girl = count(Student::where('jenis_kelamin', 'Perempuan')->get());
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        // Deletes with soft deletes
        $students = Student::find($student->id);
        $students->delete();
        return redirect('fetchData')->with('deleted', 'succeed');
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
            'size' => 'jumlah :attribute harus 10 karakter',
            'confirmed'=> ':attribute yang dimasukkan tidak sama.',
            'min'=> 'Panjang :attribute minimal 8 karakter.',
            'string'=> 'Gunakan kombinasi huruf, angka dan tanda baca.',
        ];
    }

    /**
     * This is a custom reset password
     */
    public function reset(){
        // Show reset view
        return view('auth.passwords.forgot');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updatePass(Request $request)
    {
        // Store the updated password to database
        $id = $request->user()->id;
        $request->validate([
            'password'=>'min:8|required|string|confirmed',
        ], $this->messages());
        User::where('id', $id)->update(['password'=>Hash::make($request->password)]);
        return redirect('/home')->with('reseted', 'succeed');
    }
    
}
