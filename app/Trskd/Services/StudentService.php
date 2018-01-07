<?php
/**
 * Created by PhpStorm.
 * User: Rehman Akbar
 * Date: 12/24/2017
 * Time: 1:05 PM
 */

namespace App\Trskd\Services;


use App\Trskd\Models\SchoolClass;
use App\Trskd\Models\Student;
use App\Trskd\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class StudentService
{
    protected $model, $userService, $sms;
    public function __construct(Student $student, UserService $userService, SMSService $SMSService)
    {
        $this->model       = $student;
        $this->sms         = $SMSService;
        $this->userService = $userService;
    }

    public function initialize()
    {
        $classes = SchoolClass::all();
        return [$classes];
    }

    public function create()
    {
        $student_data = request()->all();
        $user         = $this->userService->create();
        $student      = $user->student()->create($student_data);
        $student->classes()->attach($student_data['class_id']);
        $user->roles()->attach(3);
        return $student;
    }

    public function all()
    {
        return Student::with('fees')->get();
    }
    public function find($id)
    {
        $student = $this->model->with('user','classes')->find($id);
        view()->share('student' , $student);
        return $student;
    }

    public function update($id)
    {
        $student   = $this->find($id);
        $user = $this->userService->updateUser($student->user->id);
        $data = request()->all();
        $student->update($data);
        $student->user()->associate($data);
        $student->classes()->sync([$data['class_id']]);
    }

    public function allStudents()
    {
        $students = Student::with('user')->get();
        view()->share('students' , $students);
        return $students;
    }

    public function rollNoSlip($id)
    {
        $exams = Student::join('exams','students.class_id','=','exams.class_id')
            ->join('users','students.user_id','=','users.id')
            ->where('students.id',$id)
            ->get();
        return $exams;
    }
}