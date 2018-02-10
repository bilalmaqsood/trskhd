<?php

namespace App\Http\Controllers;

use App\Providers\AuthServiceProvider;
use App\Trskd\Models\Smsable;
use App\Trskd\Models\Student;
use App\Trskd\Models\Teacher;
use App\Trskd\Services\SMSService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SMSController extends Controller
{
    protected $service;
    public function __construct(SMSService $SMSService)
    {
        $this->service = $SMSService;
    }

    public function index()
    {
        $allSms = Smsable::with('user')->get();
        return view('sms.all', compact('allSms'));
    }
    public function singleStudentSMS()
    {
        return view('sms.single');
    }

    public function sendSingleSMS(Request $request)
    {
        $number  = $request->number;
        $message = $request->message;
        $user    = Auth::user();
        $status  = sendSingleSms($number,$message);

        /*if($status){
            Smsable::create(['user_id' => $user->id, 'text' => $message, 'receiver'=> $number]);

        }*/


        return redirect()->back();
    }

    public function SendAllStaffSms()
    {
        return view('sms.all_staff_sms');
    }
    public function SendAllStudentSms()
    {
        return view('sms.all_student_sms');
    }
    public function staffAll(Request $request)
    {
        $message = $request->message;
        $staff = Teacher::with('user')->get();

        foreach($staff as $s){

            $user = $s['user'];
            $number = $user->Mobile;
            $status  = sendSingleSms($number,$message);
            if($status){
                Smsable::create(['user_id' => $user->id, 'text' => $message, 'receiver'=> $number]);
            }
        }
        return redirect()->back();
    }
    public function studentAll(Request $request)
    {
        $message = $request->message;
        $students = Student::with('user')->get();

        foreach($students as $s){

            $user = $s['user'];
            $number = $user->Mobile;
            $status  = sendSingleSms($number,$message);
            if($status){
                Smsable::create(['user_id' => $user->id, 'text' => $message, 'receiver'=> $number]);
            }
        }
        return redirect()->back();
    }

    public function BirthDaySMS($user)
    {
        $this->service->birthDaySMS($user);

//        return redirect()->back();
    }
    public function destroy($id)
    {
        $this->authorize('delete');
        $sms = Smsable::find($id);
        $status = $sms->delete();
        return response()->json(['success' => 'success'], 200);
        return $status;

    }
}
