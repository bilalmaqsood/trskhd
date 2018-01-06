<?php
/**
 * Created by PhpStorm.
 * User: Rehman Akbar
 * Date: 12/24/2017
 * Time: 1:05 PM
 */

namespace App\Trskd\Services;


use App\Trskd\Models\SchoolClass;
use App\Trskd\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherService
{
    protected $model, $userService, $sms;
    public function __construct(Teacher $teacher, UserService $userService, SMSService $SMSService)
    {
        $this->model       = $teacher;
        $this->userService = $userService;
        $this->sms         = $SMSService;

    }

    public function initialize()
    {
        $classes = SchoolClass::all();
        return [$classes];
    }

    public function create()
    {
        $data    = request()->all();
        $user    = $this->userService->create();
        $teacher = $user->teacher()->create($data);
        $teacher->classes()->attach($data['class_id']);
        $user->roles()->attach(2);

        return $teacher;
    }

    public function find($id)
    {
        $teacher = $this->model->with('user')->find($id);
        view()->share('teacher' , $teacher);
        return $teacher;
    }

    public function update($id)
    {
        $teacher = $this->find($id);
        $data    = request()->all();
        $user    = $this->userService->updateUser($teacher->user->id);
        $teacher->update($data);
        $teacher->user()->associate($data);
        $teacher->classes()->sync([$data['class_id']]);
    }

    public function allTeachers()
    {
        $teachers = Teacher::with('user')->get();
        view()->share('teachers' , $teachers);
        return $teachers;
    }

}