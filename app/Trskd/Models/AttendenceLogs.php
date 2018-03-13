<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class AttendenceLogs extends Model
{
    protected $table   = "attendencelogs";

    public $timestamps = true;


    protected $fillable = ['emp_id' ,'datetime' , 'status','workcode','device_id'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'emp_id');
    }

    public function staff()
    {
        return $this->belongsTo(Student::class, 'emp_id');
    }


}
