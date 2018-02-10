<?php
/**
 * Created by PhpStorm.
 * User: Kashi Sab
 * Date: 12/24/2017
 * Time: 1:05 PM
 */

namespace App\Trskd\Services;


use App\Trskd\Models\Attendance;
use App\Trskd\Models\SchoolClass;
use App\Trskd\Models\Teacher;
use App\Trskd\Models\TeacherAttendance;


class AttendanceService
{
    protected $model, $studentService, $sms;

    public function __construct(Attendance $attendance,StudentService $studentService, SMSService $SMSService)
    {
        $this->model = $attendance;
        $this->studentService = $studentService;
        $this->sms = $SMSService;
    }

    public function initialize()
    {
        $classes   = SchoolClass::with('students')->get();
       /* $teachers  = Teacher::with('user')->get();
        $exams     = Exam::with('teacher')->get();*/
        return [$classes];
    }

    public function addAttendanceStatus($data)
    {
        $attendance = $this->model->create($data);
        if($data['status'] == 'absent'){

            $student = $this->studentService->find($data['student_id']);
            $this->sms->absentSMS($student->user, 'Student');
        }

    }

    public function addTeacherAttendanceStatus($data)
    {

        $attendance = TeacherAttendance::create($data);

        $teacher = Teacher::find($data['teacher_id']);
        $this->sms->absentSMS($teacher->user , 'Teacher');
    }

    public function create()
    {
        $data    = request()->all();
        $attendance     = $this->model->create($data);

        return $attendance;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function getAttendances($id)
    {
        return $this->model->with('student')->where('student_id', $id)->get();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function update($attendance)
    {

        $attendance->update(request()->all());
    }

}