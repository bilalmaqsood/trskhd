<?php

namespace App\Http\Controllers;

use App\Trskd\Models\Book;
use App\Trskd\Models\SchoolClass;
use App\Trskd\Models\Student;
use App\Trskd\Services\ClassService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassesController extends Controller
{
    protected $service;

    public  function __construct(ClassService $service)
    {
        $this->service = $service;
        list($classes , $teachers , $exams) = $this->service->initialize();
        view()->share('classes' , $classes);
        view()->share('teachers' , $teachers);
        view()->share('exams' , $exams);
    }

    public function index()
    {
        return view('classes.all');
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'name'  => 'required|max:255',
            'fee'   => 'required|integer',
            'seats' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $cls = $this->service->create();
        return redirect()->route('classes.index');

    }

    public function edit($id)
    {
        $class = $this->service->find($id);

        return view('classes.edit' , compact('class'));
    }

    public function show()
    {

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'name'  => 'required|max:255',
            'fee'   => 'required|integer',
            'seats' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $this->service->update($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $cls = $this->service->find($id);

        $cls->delete();
    }

    public function deleteBook($id)
    {
        $book = Book::find($id);
        $book->tests()->delete();
        $book->exams()->delete();
        $book->delete();
    }
    public function getBooks($id)
    {
        $class = $this->service->find($id);

        if($class){

            $class->load('books');
        }

        return $class;

    }

    public function classStudents($id)
    {
        $students = Student::with('studentClass')->where('class_id', $id)->get();

        return view('classes.update_class', compact('students'));
    }

    public function updateClassStudents(Request $request)
    {
        $class_id = $request->class_id;
        foreach ($request->students as $key => $s){
            if($s){
                $student = Student::find($key);
                $student->class_id = $class_id;
                $student->save();
                $student->classes()->attach($class_id);
            }
        }
        return redirect()->route('classes.index');
    }

}
