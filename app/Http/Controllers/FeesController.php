<?php

namespace App\Http\Controllers;
use App\Trskd\Models\SchoolClass;
use App\Trskd\Models\Student;
use App\Trskd\Models\Fee;
use App\Trskd\Services\ClassService;
use App\Trskd\Services\FeeService;
use App\Trskd\Services\StudentService;
use App\Trskd\Services\SMSService;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    protected $service, $classService, $student;
    public function __construct(FeeService $feeService,ClassService $classService, StudentService $student, SMSService $SMSService)
    {
        $this->service      = $feeService;
        $this->classService = $classService;
        $this->student      = $student;
        $this->sms = $SMSService;

        list($classes ) = $this->service->initialize();
        view()->share('classes' , $classes);
    }

    public function index()
    {
        $fees = $this->service->all();
        return view('fee.all' ,compact('fees'));
    }

    public function showClasses()
    {
        return view('fee.show_classes');
    }

    public function showClassesStudents(Request $request)
    {
        $this->validate($request,["class_id" => "required|numeric"]);

        $class_id = $request->query('class_id');
        $class    = $this->classService->find($class_id);

        return view('fee.add', compact('class'));
    }
    public function addStudentsFee(Request $request)
    {

        $this->validate($request,[
           "month" => "required|numeric",
            "year" => "required|numeric"
        ]);

        $unpaidStudents = $request->students;
        $class_id       = $request->class_id;

        $class = SchoolClass::find($request->class_id);

        if (!count($request->students))
        $students = $class->students;
        else
        $students = $class->students()->whereNotIn("students.id",array_keys($request->students))->get();

        if($students->count())
        $this->service->addFeeDeposit($students,$request);

        if (count($unpaidStudents))
        foreach ($unpaidStudents as $student => $status)
        {
            $data = [
                'class_id' => $class_id,
                'student_id' => $student,
                'status' => $status,
                'year' => $request->year,
                'month' => $request->month
                ];
            if($status == 'pending'){
                $stdfeesms = Student::find($data['student_id']);
                $this->sms->feeSMS($stdfeesms->user , 'Student');
            }
            $this->service->addFeeStatus($data);
        }

        return redirect('admin/fee');
    }

    public function create()
    {
        return view('fee.create');
    }

    public function store()
    {
        $this->service->addFeeStatus();
    }

    public function edit($id)
    {
        $fee = $this->service->find($id);

        return view('fee.edit' , compact('fee'));
    }
    public function update()
    {
        $this->service->update();
    }

    public function deleteFee($id)
    {
        $fee = $this->service->find($id);
        $fee->delete();
        return redirect()->route('fee.index');
    }
    public function updateFee($id)
    {
        $status = request()->status;
        $fee = $this->service->find($id);
        $fee->status = $status;
        $fee->save();

        return redirect()->back();
    }

}
