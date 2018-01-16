<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = "exams";

    public $timestamps = true;
//    protected $dates = ['Start_Date'];

    protected $fillable = [ 'user_id','class_id', 'teacher_id' ,'Type' , 'Name', 'Year','Start_Date', 'End_Date','Total_Marks', 'Passing_Marks'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function examclass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id' ,'id');
    }

    public function details()
    {
        return $this->hasMany(ExamDetails::class, 'exam_id' , 'id');
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
    /*public function getStartDateAttribute($date)
    {
        return Carbon::parse($date);
    }*/
}
