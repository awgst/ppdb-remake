<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Fascades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
     * Load data form database
     *
     */
    public function loadRegistrant(){
        // Pass data from database to ajax
        $student = Student::all();
        return response()->json($student, 200);
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
     * Load student where nisn
     *
     */
    public function findStudent(Request $request){
        $data = DB::table('students')->where('nisn', '=', $request->nisn)->get();
        return response()->json($data, 200);
    }
    /**
     * Print using fpdf
     * 
     */
    public function print(Student $student){
        //create pdf document
        $pdf = app('Fpdf');
        $pdf->AddPage();
        
        $pdf->Image(public_path('images/header.png') ,10,10);
        // setting used font
        $pdf->SetY(60);
        $pdf->SetFont('Arial','B',16);
        // Cell formatting
        // Cell(width, height, content, border(0,1), line_break(0,1), text_align)
        $pdf->Cell(190,6,'BUKTI PENDAFTARAN PPDB',0,0,'C');

        // Add line spacing
        $pdf->SetY(80);
        $pdf->SetX(35);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(35,10,'Nomor Registrasi');
        $pdf->Cell(10,10,':',0,0,'R');
        $pdf->Cell(105,10,'PDB/20/1',1,1,'L');
        $pdf->SetX(35);
        $pdf->Cell(35,10,'NAMA');
        $pdf->Cell(10,10,':',0,0,'R');
        $pdf->Cell(100,10,'Awang Suria Trisakti',0,1,'L');
        $pdf->SetX(35);
        $pdf->Cell(35,10,'NISN');
        $pdf->Cell(10,10,':',0,0,'R');
        $pdf->Cell(100,10,'1234567890',0,1,'L');
        $pdf->SetX(35);
        $pdf->Cell(35,10,'Sekolah Asal');
        $pdf->Cell(10,10,':',0,0,'R');
        $pdf->Cell(100,10,'SD N 1 Tlogotirto',0,1,'L');
        $pdf->SetX(35);
        $pdf->Cell(35,10,'Alamat');
        $pdf->Cell(10,10,':',0,0,'R');
        $pdf->MultiCell(100,10,'Jembar',0,'L',0);
        $pdf->SetY(205);

        $pdf->SetFont('Arial','',11);
        $path = public_path('foto/1584959903212.jpg');
        $pdf->Image($path,40,150,35,45);

        $pdf->Cell(95,10,'Calon Peserta',0,0,'C');
        $pdf->Cell(95,10,'Panitia',0,1,'C');
        $pdf->Cell(95,20,'',0,0,'C');
        $pdf->Cell(95,20,'',0,1,'C');
        $pdf->Cell(95,10,'Awang Suria Trisakti',0,0,'C');
        $pdf->Cell(95,10,'..................',0,1,'C');

        // Print file
        $pdf->Output();
        exit();
        // return response()->download($result, 'test.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Go to registration form
        // Get last id registrant
        $last = DB::table('students')->orderBy('id', 'desc')->first();
        return view('student.daftar', compact('last'));
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
            'nisn' => 'required|size:10|unique:students',
            'asal_sekolah' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'nama_wali' => 'required',
            'alamat_wali' => 'required',
            'jarak' => 'required',
            'path' => 'required|max:2048',
        ], $this->messages());
        $name = $request->file('path')->getClientOriginalName();
        $path = $request->file('path')->storePubliclyAs('foto', $name,'public');
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
            'size' => 'jumlah :attribute harus 10 karakter'
        ];
    }
}
