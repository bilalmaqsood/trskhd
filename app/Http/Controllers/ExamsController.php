<?php

namespace App\Http\Controllers;

use App\Trskd\Models\Book;
use App\Trskd\Models\Exam;
use App\Trskd\Models\Result;
use App\Trskd\Models\SchoolClass;
use App\Trskd\Services\ExamsService;
use App\Trskd\Services\StudentService;
use App\Trskd\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExamsController extends Controller
{
    protected $examService,$studentSevice , $userService, $schollService;
    public function __construct(ExamsService $examsService,StudentService $studentService, UserService $userService, SchoolClass $schoolClass)
    {
        $this->examService = $examsService;
        $this->studentSevice     = $studentService;
        $this->userService = $userService;
        $this->schollService = $schoolClass;
        list($classes, $teachers, $exams, $books)     = $this->examService->initialize();
        view()->share('classes' , $classes);
        view()->share('teachers' , $teachers);
        view()->share('exams' , $exams);
        view()->share('books' , $books);
    }

    public function index()
    {
        return view('exams.all');
    }

    public function create()
    {
        return view('exams.create');
    }

    public function examStoreData()
    {

        $validator = Validator::make(request()->all(), [
            'Name'  => 'required|max:255',
            'class_id'   => 'required|integer',
            'Type' => 'required|max:255',
            'Start_Date' => 'required|date',
            'End_Date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $examData = request()->all();
        $class_id = request()->class_id;
        $class = $this->schollService->find($class_id);

        session(['examData' => $examData]);
        return view('exams.add_books' , compact('examData' , 'class'));

    }
    public function store()
    {
        $exam = $this->examService->create();
        return redirect()->route('exam.index');

    }

    public function edit($id)
    {
        $exam = $this->examService->find($id);
        return view('exams.edit' , compact('exam'));
    }

    public function show($id)
    {
        $exam = $this->examService->find($id);
        return view('exams.details',compact('exam'));
    }

    public function update(Request $request, $id)
    {
        $this->examService->update($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $exam = $this->examService->find($id);

        $exam->delete();
    }

    public function report()
    {
        return view('exams.report');
    }

    public function addNumbers($exam, $book)
    {
        $exam = $this->examService->find($exam);
        $book = Book::find($book);

        $result = Result::where('exam_id', $exam->id)
            ->where('book_id', $book->id)
            ->where('class_id', $exam->class_id)
            ->get();

        $exam->load('examclass');
        $class = $exam['examclass'];

        if(count($result) > 0){

//            return view('exams.edit_numbers', compact('exam' , 'book','class','result'));

        }

        return view('exams.add_numbers', compact('exam' , 'book','class'));
    }

    public function storeExamNumbers($id)
    {
        $exam = $this->examService->find($id);
        $results = request()->results;
        foreach ($results as $result){

            $exam->results()->create($result);

        }

        return redirect()->route('exam.show' , [$exam->id]);
    }

    public function userExams()
    {
        $user  = Auth::user();
        $exams = Exam::where('class_id', $user->student->class_id)->get();
        return view('users.result', compact('exams'));
    }
}
