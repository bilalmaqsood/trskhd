<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudent;
use App\Trskd\Models\Fee;
use App\Trskd\Models\SchoolInfo;
use App\Trskd\Models\User;
use App\Trskd\Services\ExamsService;
use App\Trskd\Services\StudentService;
use App\Trskd\Services\TestsService;
use App\Trskd\Services\UserService;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StudentsController extends Controller
{

    protected $service ,$userService, $test, $exam;
    public function __construct(StudentService $studentService, UserService $userService
        , TestsService $testsService, ExamsService $examsService)
    {
        $this->service     = $studentService;
        $this->userService = $userService;
        $this->test        = $testsService;
        $this->exam        = $examsService;
        list($classes)     = $this->service->initialize();
        view()->share('classes' , $classes);

    }


    public function index()
    {
        $this->authorize('all');

        $this->service->allStudents();
        return view('students.all');
    }


    public function create()
    {
        
        $this->authorize('create');

        return view('students.create');
    }


    public function store(StoreStudent $request)
    {
        $this->authorize('create');

        $student = $this->service->create();

        return redirect()->route('student.index');
    }


    public function show($id)
    {
    
        $this->authorize('view');

        $this->service->find($id);

        return view('students.profile');
    }


    public function edit($id)
    {
        $this->authorize('update');
        $this->service->find($id);

        return view('students.edit');
    }

    public function update($id)
    {
        $this->authorize('update');

        $this->service->update($id);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->authorize('delete');

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $user = $this->userService->find($id);
        $student_id=$user->student->id;
        $user->student()->delete();
        $user->roles()->detach();
        $status = $user->delete();

        \DB::table('attendance')->where('student_id', '=', $student_id)->delete();
        \DB::table('class_student')->where('student_id', '=', $student_id)->delete();
        \DB::table('fees')->where('student_id', '=', $student_id)->delete();
        \DB::table('results')->where('student_id', '=', $student_id)->delete();
        \DB::table('test_details')->where('student_id', '=', $student_id)->delete();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return response()->json(['success' => 'success'], 200);
        return $status;
    }
    public function status($id)
    {
        $this->authorize('update');
        $this->userService->status($id);
    }

    public function rollNoSlip($id)
    {
        $this->authorize('view');

        $student = $this->service->find($id);
        if($student){

            $exams = $student['classes'][0]->exams;

        }

        return view('students.roll_no_slip' , compact('student' ,'exams'));
    }

    public function downloadRollNoSlip($id)
    {
        $this->authorize('view');

        $student = $this->service->find($id);
        if($student){

            $exams = $student['classes'][0]->exams;

        }

        $pdf = App::make('dompdf.wrapper');
        $viewHtml = view('students.slip_download', compact('student','exams'));

        $pdf->loadHTML($viewHtml);

        return $pdf->stream();

    }

    public function testDetails($id)
    {
        $test = $this->test->find($id);
        $test->load('examclass' , 'book', 'details.student');
        return view('tests.show', compact('test'));
    }

    public function examDetails($id)
    {
        $test = $this->exam->find($id);
        return view('tests.show', compact('test'));
    }

    public function result($id)
    {
        $student = $this->service->find($id);
        if($student){

            $student->load('user' , 'studentClass.books');
        }
        $result = 0;
        return view('exams.result' , compact('student', 'result'));
    }

    public function feeSlip($id)
    {
        $student = $this->service->find($id);
        if($student){
            $student->load('user');
            $fees = $student->fees()->where("status",Fee::PENDING)->get();
        }
        return view('students.fee_slip' ,compact('student','fees'));
    }

    public function card($id)
    {

        $student = $this->service->find($id);

        $school = SchoolInfo::first();
        return view('students.card', compact('student', 'school'));

    }
}
