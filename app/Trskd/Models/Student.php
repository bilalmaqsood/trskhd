<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    public $timestamps = true;
    protected $fillable = ['user_id', 'class_id' ,'Medium','Roll_No','Registration_ID','Admission_Date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classes()
    {
        return $this->belongsToMany(SchoolClass::class,'class_student','student_id','class_id');
    }

    public function fees()
    {
        return $this->hasMany(Fee::class, 'student_id', 'id');
    }

}
