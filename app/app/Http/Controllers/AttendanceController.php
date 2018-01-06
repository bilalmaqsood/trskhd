<?php

namespace App\Http\Controllers;

use App\Trskd\Services\AttendanceService;
use App\Trskd\Services\ClassService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    protected $service, $classService;
    public function __construct(AttendanceService $attendanceService,ClassService $classService)
    {
        $this->service      = $attendanceService;
        $this->classService = $classService;

        list($classes ) = $this->service->initialize();
        view()->share('classes' , $classes);
    }

    public function index()
    {
        $attendances = $this->service->all();
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
        $absentStudents = $request->students;
        $class_id       = $request->class_id;

        foreach ($absentStudents as $student => $status)
        {
            $data = ['class_id' => $class_id , 'student_id' => $student ,'user_id' => Auth::user()->id];
            $this->service->addAttendanceStatus($data);
        }
        return redirect()->route('home');
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

        return view('attendance.edit' , compact('attendance'));
    }
    public function update()
    {
        $this->service->update();
    }
}
