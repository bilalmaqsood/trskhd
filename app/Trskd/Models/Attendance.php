<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = "attendance";
    public $timestamps = true;

    public $fillable = ['class_id' , 'user_id' , 'student_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id' , 'id');
    }

    public function studentClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id', 'id');
    }
}
