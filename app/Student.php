<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    // Mass Assignment
    protected $fillable = [
        'name', 
        'nisn', 
        'asal_sekolah', 
        'tempat_lahir', 
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'nama_wali',
        'alamat_wali',
        'jarak',
        'path',
    ];
}
