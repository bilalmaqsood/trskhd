<?php

namespace App\Http\Controllers;

use App\Trskd\Models\Tests;
use App\Trskd\Services\TestsService;
use Illuminate\Http\Request;
use App\Trskd\Services\ExamsService;
use App\Trskd\Services\StudentService;
use App\Trskd\Models\Student;
use App\Trskd\Services\UserService;
use App\Trskd\Services\SMSService;
use Illuminate\Support\Facades\Auth;

class TestsController extends Controller
{
    protected $service, $examService, $studentSevice, $userService;
    public function __construct(TestsService $service,ExamsService $examsService,StudentService $studentService, UserService $userService,  SMSService $SMSService)
    {
        $this->examService   = $examsService;
        $this->service       = $service;
        $this->studentSevice = $studentService;
        $this->userService = $userService;
        $this->sms = $SMSService;
        list($classes , $teachers , $tests , $books) = $this->service->initialize();
        view()->share('classes' , $classes);
        view()->share('teachers' , $teachers);
        view()->share('tests' , $tests);
        view()->share('books' , $books);
    }

    public function index()
    {
        return view('tests.all');
    }

    public function create()
    {
        return view('tests.create');
    }

    public function store()
    {
        $test = $this->service->create();

        return redirect()->route('test.index');

    }

    public function edit($id)
    {
        $test = $this->service->find($id);

        return view('tests.edit' , compact('test'));
    }

    public function show($id)
    {
        $test = $this->service->find($id);
        $test->load('examclass' , 'book', 'details.student');
        return view('tests.show', compact('test'));
    }

    public function update(Request $request, $id)
    {
        $this->service->update($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $test = $this->service->find($id);

        $test->delete();
    }

    public function report()
    {
        return view('tests.report');
    }

    public function viewDetails($id)
    {
        $test = $this->service->find($id);
        $class = [];

        if($test){

            $test->load('examclass.students');
            $class = $test['examclass'];
        }

        if($test->has('details')){

            $test->load('details');
            return view('tests.update' , compact('test', 'class'));
        }

        return view('tests.details', compact('test', 'class'));
    }

    public function addTestMarks(Request $request, $id)
    {
        $test = $this->service->find($id);

        if($test){
            $details = $request->details;
            foreach ($details as $key => $detail) {
               $test->details()->create([
                   'checked_by' => Auth::user()->id,
                   'marks' => $detail['marks'],
                   'status' => $detail['status'],
                   'student_id' => $detail['student_id'],
               ]);
            }
        $user = Student::find($detail['student_id'])->user;
        sendSms($user->Mobile , $message = "Dear Student " .$user->First_Name." ".$user->Last_Name. " \n Test Title " .$test->Name. " \n Passing Marks " .$test->Passing_Marks. " \n Total Marks " .$test->Total_Marks. "\n  Obtainted Marks " .$detail['marks']. "\n Status: " .$detail['status']);

        }


        return redirect()->route('test.show' , [$test->id]);
    }

    public function updateTestMarks(Request $request, $id)
    {
        // dd($request->details);
        $test = $this->service->find($id);

        if($test){
            $details = $request->details;
            foreach ($details as $key => $detail) {
               $test->details()->updateOrCreate(
                   [
                       'checked_by' => Auth::user()->id,
                       'test_id'    => $test->id,
                       'student_id' => $detail['student_id'],

                   ],
                   [
                       'checked_by' => Auth::user()->id,
                       'marks'      => $detail['marks'],
                       'status'     => $detail['status'],
                       'student_id' => $detail['student_id'],
                    ]
               );
               $user = Student::find($detail['student_id'])->user;
               sendSms($user->Mobile , $message = "Dear Student " .$user->First_Name." ".$user->Last_Name. " \n Test Title " .$test->Name. " \n Passing Marks " .$test->Passing_Marks. " \n Total Marks " .$test->Total_Marks. "\n  Obtainted Marks " .$detail['marks']. "\n Status: " .$detail['status']);
            }
        }


        return redirect()->route('test.show' , [$test->id]);
    }

    public function userTests()
    {
        $user = Auth::user();
        $tests = Tests::where('class_id', $user->student->class_id)->get();
        return view('users.all_tests', compact('tests'));
    }
}
