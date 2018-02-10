<?php
/**
 * Created by PhpStorm.
 * User: Rehman Akbar
 * Date: 12/24/2017
 * Time: 1:05 PM
 */

namespace App\Trskd\Services;


use App\Trskd\Models\Fee;
use App\Trskd\Models\SchoolClass;


class FeeService
{
    protected $model, $studentService;

    public function __construct(Fee $fee,StudentService $studentService)
    {
        $this->model = $fee;
        $this->studentService = $studentService;
    }

    public function initialize()
    {
        $classes   = SchoolClass::with('students')->get();
       /* $teachers  = Teacher::with('user')->get();
        $exams     = Exam::with('teacher')->get();*/
        return [$classes];
    }

    public function addFeeStatus($data)
    {
        $fee = $this->model->firstOrNew($data);
        $fee->save();
        $student = $this->studentService->find($data['student_id']);
        sendSms($student->user->Mobile);
    }
    public function create()
    {
        $data = request()->all();
        $fee  = $this->model->create($data);

        return $fee;
    }

    public function all()
    {
        return $this->model->with('student.user')->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function addFeeDeposit($students,$request)
    {
        foreach ($students as $student)
        {
            $data = [
                'class_id' => $request->class_id,
                'student_id' => $student->id,
                'status' => Fee::PAID,
                'year' => $request->year,
                'month' => $request->month
            ];
            $fee = $this->model->firstOrNew($data);
            $fee->save();
        }

    }
}