<?php

namespace App\Trskd\Models;

use Carbon\Carbon;
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

    public function studentClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id' , 'id');
    }


    public function fees()
    {
        return $this->hasMany(Fee::class, 'student_id', 'id');
    }

    public function testObtainedMarks($testId, $studentId)
    {
            $testDetails = TestDetail::where('test_id', $testId)->where('student_id', $studentId)->first();

            return $testDetails->marks;
    }

    public function testStatus($testId, $studentId)
    {
        $testDetails = TestDetail::where('test_id', $testId)->where('student_id', $studentId)->first();

        return $testDetails->status;
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'class_id', 'id');
    }

    public function getSmsChargesAttribute()
    {
        $user = $this['user']->id;

        $salaryMonth = Carbon::now();
        $monthStart  = $salaryMonth->startOfMonth()->format('Y-m-d');
        $monthEnd    = $salaryMonth->endOfMonth()->format('Y-m-d');

        $totalSms    = Smsable::whereBetween('created_at', array($monthStart, $monthEnd))->count();

        return ($totalSms * SMSCharges);
    }

}
