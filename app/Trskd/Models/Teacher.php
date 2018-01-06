<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teachers";
    public $timestamps = true;
    protected $fillable = ['class_id','Designation' , 'Joining_Date', 'Increment_At',
        'Allowed_Holidays', 'Increment','Salary'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function classes()
    {
        return $this->belongsToMany(SchoolClass::class,'class_teacher','teacher_id','class_id');
    }

   /* public function classes()
    {
        return $this->hasMany(SchoolClass::class);
    }*/
}
