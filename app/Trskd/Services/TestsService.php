<?php
/**
 * Created by PhpStorm.
 * User: Rehman Akbar
 * Date: 12/24/2017
 * Time: 1:05 PM
 */

namespace App\Trskd\Services;


use App\Trskd\Models\Exam;
use App\Trskd\Models\SchoolClass;
use App\Trskd\Models\Teacher;

class ExamsService
{
    protected $model;

    public function __construct(Exam $exam)
    {
        $this->model = $exam;
    }

    public function initialize()
    {
        $classes   = SchoolClass::all();
        $teachers  = Teacher::with('user')->get();
        $exams     = Exam::with('teacher')->get();
        return [$classes , $teachers, $exams];
    }

    public function create()
    {
        $data = request()->all();

        $exam = $this->model->create($data);

        return $exam;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
    public function update($id)
    {
        $exam = $this->find($id);
        $data = request()->all();
        $exam->update($data);

    }
}