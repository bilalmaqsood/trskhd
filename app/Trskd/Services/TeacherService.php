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

class StaffService
{
    protected $model, $userService;
    public function __construct(Teacher $teacher, UserService $userService)
    {
        $this->model       = $teacher;
        $this->userService = $userService;
    }

    public function initialize()
    {
        $classes = SchoolClass::all();
        $staff   = Teacher::all();
        return [$classes, $staff];
    }

    public function create()
    {

        $teacher_data = request()->all();
        $user         = $this->userService->create();

        if(request()->hasFile('Image')){

            dd(request()->all());
            $name     = md5($user->id) . '.' . request()->file('image')->getClientOriginalExtension();
            request()->file('image')->move(public_path() . '/users/profile/images/', $name);
            $teacher_data['Image'] = $name;
        }

        $teacher      = $user->teacher()->create($teacher_data);

        return $teacher;
    }

    public function allTeachers()
    {
        $teachers = Teacher::with('user')->all();
    }
}