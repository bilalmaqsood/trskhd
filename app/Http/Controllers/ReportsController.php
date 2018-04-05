<?php

namespace App\Http\Controllers;

use App;
use App\Trskd\Models\Book;
use App\Trskd\Models\Fee;
use App\Trskd\Models\Exam;
use App\Trskd\Models\ExamDetails;
use App\Trskd\Models\Result;
use App\Trskd\Services\ExamsService;
use App\Trskd\Models\Teacher;
use App\Trskd\Models\TeacherAttendance;
use App\Trskd\Models\SchoolClass;
use App\Trskd\Services\AttendanceService;
use App\Trskd\Services\ClassService;
use App\Trskd\Models\SchoolInfo;
use App\Trskd\Services\SMSService;
use App\Trskd\Services\StudentService;
use App\Trskd\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    protected $service, $classService, $user,$examService;
    public function __construct(AttendanceService $attendanceService,ClassService $classService, UserService $userService,SMSService $SMSService, ExamsService $examsService)
    {
        $this->service      = $attendanceService;
        $this->classService = $classService;
        $this->user         = $userService;
        $this->sms = $SMSService;
        $this->examService = $examsService;
        list($classes ) = $this->service->initialize();
        view()->share('classes' , $classes);
        view()->share('school', SchoolInfo::first());
         list($classes, $teachers, $exams, $books) = $this->examService->initialize();
        // view()->share('classes' , $classes);
        // view()->share('teachers' , $teachers);
        view()->share('exams' , $exams);
        view()->share('books' , $books);
        view()->share('attendances' , $this->service->all()->load('student'));
    }


    public function index($type){
        

        return view('reports.reports',compact('type'));
    }

    public function generateReport($type,Request $request){

        switch ($type) {
            case 'fee_slip':
                return $this->generateFeeSlip($request);
                break;
            case 'roll_no_slip':
                return $this->generateRollNoSlip($request);
                break;
            case 'salary_slip':
                return $this->generateStaffSalarySlip($request);
                break;
            case 'staff_card':
                return $this->generateStaffCards($request);
                break;
            case 'student_card':
                return $this->generateStudentCards($request);
                break;
            case 'student_result_card':
               return $this->generateStudentResultCard($request);
                break;
            case 'std_attendance':
                return $this->generateStudentAttendance($request);
                break;
            case 'staff_attendance':
                return $this->generateStaffAttendance($request);
                break;
            
            default:
                # code...
                break;
        }
        
    }


   public function generateStaffAttendance($request){
        $attendances = TeacherAttendance::all();
        $html = "";
        $pdf = App::make('dompdf.wrapper');
            $html = $html."<br>".(string) view('reports.pdf.staff_attendance', compact('attendances'));
            $pdf->loadHTML($html);
        return $pdf->stream();
    }

    public function generateStudentAttendance($request){
        $class = SchoolClass::find($request['class_id']);
        $html = "";
        $pdf = App::make('dompdf.wrapper');
            $html = $html."<br>".(string) view('reports.pdf.std_attendance', ["student"]);
    
        $pdf->loadHTML($html);
        return $pdf->stream();
    }


    public function generateFeeSlip($request){
        $this->validate($request,["class_id"=>"required"]);

        $class = SchoolClass::find($request['class_id']);
        $html = "";
        $pdf = App::make('dompdf.wrapper');

//        dd($request->all());
        if($request->has('class_id') && ($request->has('month')||$request->has("year"))){
            $query = Fee::where('class_id', $request->get('class_id'));
            if($request->has('month'))
            $query = $query->where('month' ,'=', $request->get('month'));
            if($request->has('year'))
                $query = $query->where('year' ,'=', $request->get('year'));
            foreach ($query->get() as $index => $fee) {
                $student = $fee->student;
                $html = $html."<br>".(string) view('reports.pdf.fee_slip', [
                    "student"=>$student,
                     "date" => "10-".str_pad($fee->month, 2, "0", STR_PAD_LEFT)."-".$fee->year
                    ]);
            }
        } else{
            foreach ($class->students as $index => $student) {
                $html = $html."<br>".(string) view('reports.pdf.fee_slip', ["student"=>$student]);
            }
        }


        $pdf->loadHTML($html);
        return $pdf->stream();
    }

    public function generateRollNoSlip(Request $request){

        $this->validate($request,["class_id"=>"required"]);

        $query = Exam::where("class_id",$request["class_id"]);
        if($request->has("year")&&!empty($request["year"]))
            $query->where("Year",$request["year"]);
        if($request->has("type")&&!empty($request["type"]))
            $query->where("Type",$request["type"]);

        if(!$query->count()){
            \Session::flash('error', 'No record found');
            return back();
        }

        $exam = $query->first();
        $class = $exam->examclass;

        $html = "";
        $pdf = App::make('dompdf.wrapper');
        foreach ($class->students as $index => $student) {
            $html = $html."<br>".(string) view('reports.pdf.roll_no_slip', [
                "student"=>$student,
                "exam" => $exam
                ]);
        }
        $pdf->loadHTML($html);
        return $pdf->stream();
    }
     public function generateStudentResultCard($request){
//        $class = SchoolClass::find($request['class_id']);
         $this->validate($request,["class_id"=>"required"]);

         $query = Exam::where("class_id",$request["class_id"]);
         if($request->has("year")&&!empty($request["year"]))
             $query->where("Year",$request["year"]);
         if($request->has("type")&&!empty($request["type"]))
             $query->where("Type",$request["type"]);

         if(!$query->count()){
             \Session::flash('error', 'No record found');
             return back();
         }

         $exam = $query->first();
         $class = $exam->examclass;

        $html = "";
        $pdf = App::make('dompdf.wrapper');
        foreach ($class->students as $index => $student) {
            $html = $html."<br>".(string) view('reports.pdf.std_result_card', [
                "student"=>$student,
                "exam"=>$exam,
                "class_id" => $class->id
                ]);
        }
        $pdf->loadHTML($html);
        return $pdf->stream();
    }
    public function generateStudentCards($request){
        
        $class = SchoolClass::find($request['class_id']);
        $html = "";
        $pdf = App::make('dompdf.wrapper');
        foreach ($class->students as $index => $student) {
            $html = $html."<br>".(string) view('reports.pdf.std_cards', ["student"=>$student]);
        }
        $pdf->loadHTML($html);
        return $pdf->stream();
    }
    public function generateStaffCards($request){
        $html="";
        if($request->has('class_id'))
         {
            $class = SchoolClass::find($request['class_id']);
            $html  = (string) view('reports.pdf.staff_card', ["teacher"=>$class->teacher]);   
         } else {
            foreach (Teacher::all() as $index => $teacher) {
            $html = $html."<br>".(string) view('reports.pdf.staff_card', ["teacher"=>$teacher]);
            }    
         }  

        $pdf = App::make('dompdf.wrapper');        
        $pdf->loadHTML($html);
        return $pdf->stream();
    }
    public function generateStaffSalarySlip($request){
           $html="";

        if($request->has('class_id'))
         {
            $class = SchoolClass::find($request['class_id']);
            $html  = (string) view('reports.pdf.staf_salary_slip', ["teacher"=>$class->teacher]); 

         } else {

            foreach (Teacher::all() as $index => $teacher) {
            $html = $html."<br>".(string) view('reports.pdf.staf_salary_slip', ["teacher"=>$teacher]);
            }    
         }  
         // echo $html;exit;
        $pdf = App::make('dompdf.wrapper');        
        $pdf->loadHTML($html);
        return $pdf->stream();
    }
   
    

  }