<?php
/**
 * Created by PhpStorm.
 * User: Rehman Akbar
 * Date: 12/24/2017
 * Time: 1:05 PM
 */

namespace App\Trskd\Services;


use App\Trskd\Models\Book;
use App\Trskd\Models\Exam;
use App\Trskd\Models\SchoolClass;
use App\Trskd\Models\Teacher;
use Illuminate\Support\Facades\Auth;

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
        $books     = Book::all();
        return [$classes, $teachers, $exams, $books];
    }

    public function create()
    {
        $user = Auth::user();
        $data = session('examData');
        $data['user_id'] = $user->id;
        $exam = $this->model->create($data);
        $details = request()->Details;

        foreach ($details as $key => $detail){

            $detail['user_id'] = $user->id;
            $exam->details()->create($detail);
        }

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

        $user = Auth::user();
        $data['user_id'] = $user->id;

        $details = request()->Details;

        $exam->details()->delete();

        foreach ($details as $key => $detail){

            $detail['user_id'] = $user->id;
            $exam->details()->create($detail);
        }

    }
}