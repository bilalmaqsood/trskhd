<?php
/**
 * Created by PhpStorm.
 * User: Rehman Akbar
 * Date: 12/24/2017
 * Time: 1:05 PM
 */

namespace App\Trskd\Services;


use App\Trskd\Models\Attendance;
use App\Trskd\Models\SchoolClass;


class AttendanceService
{
    protected $model, $studentService;

    public function __construct(Attendance $attendance,StudentService $studentService)
    {
        $this->model = $attendance;
        $this->studentService = $studentService;
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
        $student = $this->studentService->find($data['student_id']);
        sendSms($student->user->Mobile);
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

    public function all()
    {
        return $this->model->all();
    }

}