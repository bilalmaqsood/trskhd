<?php

namespace App\Http\Controllers;

use App\Trskd\Models\Teacher;
use App\Trskd\Models\TeacherAttendance;
use App\Trskd\Services\AttendanceService;
use App\Trskd\Services\ClassService;
use App\Trskd\Services\StudentService;
use App\Trskd\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    protected $service, $classService, $user;
    public function __construct(AttendanceService $attendanceService,ClassService $classService, UserService $userService)
    {
        $this->service      = $attendanceService;
        $this->classService = $classService;
        $this->user         = $userService;

        list($classes ) = $this->service->initialize();
        view()->share('classes' , $classes);
    }

    public function index()
    {
        $attendances = $this->service->all();

        if($attendances){
            $attendances->load('student');
        }

        return view('attendance.all' , compact('attendances'));
    }

    public function showClasses()
    {

        return view('attendance.show_classes');
    }

    public function showClassesStudents(Request $request)
    {
        $class_id = $request->query('class_id');
        $class    = $this->classService->find($class_id);

        return view('attendance.add', compact('class'));
    }
    public function addStudentsAttendance(Request $request)
    {
        $students = $request->students;
        $class_id = $request->class_id;

        foreach ($students as $student => $status)
        {
            $data = ['class_id' => $class_id, 'status' => $status,
                'student_id' => $student, 'user_id' => Auth::user()->id];
            $this->service->addAttendanceStatus($data);
        }
        return redirect()->route('attendance.index');
    }

    public function create()
    {
        return view('attendance.create');
    }

    public function store()
    {
        $this->service->addFeeStatus();
    }

    public function edit($id)
    {
        $attendance = $this->service->find($id);
        if($attendance) {

            $attendance->load('student');
        }
        return view('attendance.edit' , compact('attendance'));
    }
    public function update($id)
    {
        $attendance = $this->service->find($id);
        $this->service->update($attendance);

        return redirect()->route('attendance.index');
    }

    public function destroy($id)
    {
        $attendance = $this->service->find($id);

        $attendance->delete();
        return response()->json(['success' => 'success'], 200);
    }

    public function userAttendance(Request $request)
    {
        $attendances = $this->service->getAttendances(Auth::user()->student->id);
        return view('users.attendance', compact('attendances'));
    }

    public function teachersAttendance()
    {
        $attendances = TeacherAttendance::all();
        return view('attendance.all_teachers', compact('attendances'));
    }
    public function showTeachers()
    {
        $teachers = Teacher::all();
        return view('attendance.teacher', compact('teachers'));

    }

    public function addTeacherAttendanceStatus(Request $request)
    {
        $teachers = $request->teachers;

        foreach ($teachers as $teacher => $status)
        {
            $data = ['status' => $status, 'teacher_id' => $teacher, 'user_id' => Auth::user()->id];

            $this->service->addTeacherAttendanceStatus($data);

            return redirect()->route('teachersAttendance');
        }
    }
}
