<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Mass Assignment
    protected $guarded = ['id', 'timestamps'];
}
