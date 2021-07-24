<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $students = Student::all();
        $students = $students->transform(function($i){
            unset($i->path);
            unset($i->created_at);
            unset($i->updated_at);
            unset($i->deleted_at);
            return $i;
        });
        $collection = collect([
            "id"=> "ID",
            "name"=> "Nama",
            "nisn"=> "NISN",
            "asal_sekolah"=> "Asal Sekolah",
            "tempat_lahir"=> "Tempat Lahir",
            "tgl_lahir"=> "Tanggal Lahir",
            "jenis_kelamin"=> "Jenis Kelamin",
            "agama"=> "Agama",
            "alamat"=> "Alamat",
            "nama_wali"=> "Nama Orang tua / Wali",
            "alamat_wali"=> "Alamat Orang tua / Wali",
            "jarak"=> "Jarak",
        ]);
        $students->prepend($collection);
        return $students;
    }
}
