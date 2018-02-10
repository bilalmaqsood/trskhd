<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateTeacher;
use App\Trskd\Models\SchoolClass;
use App\Trskd\Models\SchoolInfo;
use App\Trskd\Models\TeacherAttendance;
use App\Trskd\Services\TeacherService;
use App\Trskd\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;

class TeachersController extends Controller
{

    protected $teacherService, $userService;

    public function __construct(TeacherService $teacherService, UserService $userService)
    {

        $this->service     = $teacherService;
        $this->userService = $userService;

        list($classes)     = $this->service->initialize();

        view()->share('classes' , $classes);

    }

    public function index()
    {
        $this->authorize('all');

        $this->service->allTeachers();

        return view('teacher.all');
    }

    public function create()
    {
        $this->authorize('create');
        return view('teacher.create');
    }

    public function store(ValidateTeacher $request)
    {
        $this->authorize('create');
        $teacher = $this->service->create();

        return redirect()->route('teacher.index');

    }

    public function edit($id)
    {
        $this->authorize('update');
        $this->service->find($id);

        return view('teacher.edit');
    }

    public function update(Request $request, $id)
    {

        $this->authorize('update');
        $this->service->update($id);
        return redirect()->back();
    }
    public function destroy($id)
    {
        $this->authorize('delete');
        $user = $this->userService->find($id);

        $user->teacher()->delete();
        $user->roles()->detach();
        $status = $user->delete();
        return response()->json(['success' => 'success'], 200);

    }

    public function status($id)
    {
        $this->authorize('update');
        $this->userService->status($id);

    }

    public function show($id)
    {
        $this->authorize('view');

        $this->service->find($id);

        return view('teacher.profile');
    }

    public function viewSalarySlip($id)
    {
        $this->authorize('view');
        $this->service->find($id);

        $date = Carbon::now()->format('Y-m-d');
        return view('teacher.salary_slip', compact('date'));
    }

    public function downloadSalarySlip($id)
    {
        $this->authorize('view');
        $this->service->find($id);

        $pdf = App::make('dompdf.wrapper');
        $viewHtml = view('teacher.download_salary_slip', compact('teacher'));

        $pdf->loadHTML($viewHtml);

        return $pdf->stream();
    }

    public function card($id)
    {

        $teacher = $this->service->find($id);
        if($teacher){
            $teacher->load('teacherClass');
        }
        $school = SchoolInfo::first();
        return view('teacher.card', compact('teacher', 'school'));

    }

}
