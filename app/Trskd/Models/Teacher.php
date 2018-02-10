<?php

namespace App\Trskd\Models;

use Carbon\Carbon;
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

    public function teacherClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id' , 'id');

    }

    public function getLeavesAttribute()
    {
        $salaryMonth = Carbon::now();
        $monthStart = $salaryMonth->startOfMonth()->format('Y-m-d');
        $monthEnd   = $salaryMonth->endOfMonth()->format('Y-m-d');

        $attendance = TeacherAttendance::whereBetween('created_at', array($monthStart, $monthEnd))->where('status','absent')->count();

        return $attendance ;
    }
    public function getLeavesFineAttribute()
    {
        $attendance = $this->getLeavesAttribute();
        return ($attendance > 1) ? ($attendance - 1 ) * TeacherLeaveFine : '0';
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

    public function getNetSalaryAttribute()
    {
        return $this->Salary - $this->getLeavesFineAttribute() - $this->getSmsChargesAttribute();
    }

    public function getNameAttribute()
    {
        return $this->user->First_Name ." ". $this->user->Last_Name;
    }
}
