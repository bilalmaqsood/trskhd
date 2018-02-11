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
            return isset($testDetails->marks) ? $testDetails->marks : 0;
    }

    public function testStatus($testId, $studentId)
    {
        $testDetails = TestDetail::where('test_id', $testId)->where('student_id', $studentId)->first();

        return isset($testDetails->status) ? $testDetails->status : "";
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

        $totalSms    = Smsable::where('user_id', $user)->whereBetween('created_at', array($monthStart, $monthEnd))->count();

        return ($totalSms * SMSCharges);
    }

    public function getNameAttribute()
    {
        return $this->user->First_Name ." ". $this->user->Last_Name;
    }
    public function getLeavesAttribute()
    {
        $feeMonth   = Carbon::now();
        $monthStart = $feeMonth->startOfMonth()->format('Y-m-d');
        $monthEnd   = $feeMonth->endOfMonth()->format('Y-m-d');

        $attendance = Attendance::where('student_id', $this->id)->whereBetween('created_at', array($monthStart, $monthEnd))->where('status','absent')->count();

        return $attendance ;
    }
    public function getLeavesFineAttribute()
    {
        $attendance = $this->leaves;
        return ($attendance >= 1) ? ($attendance) * 20 : '0';
    }
}
