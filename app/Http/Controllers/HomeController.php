<?php

namespace App\Http\Controllers;

use App\Trskd\Models\Calendar;
use App\Trskd\Models\Logo;
use App\Trskd\Models\SchoolInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'status']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->hasRole('admin')){

            return view('admin.index');

        }elseif($user->hasRole('student')) {

            return redirect()->route('student.show',[$user->student->id]);

        }elseif($user->hasRole('teacher')) {

            return redirect()->route('teacher.show',[$user->teacher->id]);
        }

    }

    public function logo()
    {
        ini_set('upload_max_filesize', '10M');
        ini_set('post_max_size', '10M');
        ini_set('max_input_time', 100);
        ini_set('max_execution_time', 100);

        return view('admin.logo');
    }

    public function changeLogo(Request $request)
    {
        if($request->hasFile('header')){

            $this->uploadImage($request, 'header');
        }

        if($request->hasFile('footer')){
            $this->uploadImage($request, 'footer');
        }

        return redirect()->back();
    }

    public function uploadImage($request , $type)
    {
        $logo = Logo::where('type' , $type)->first();

        if($logo){

            \File::delete(public_path().'/assets/images/'.$logo->name);
        }

        $logo = $request->file($type);
        $filename = time() . '.' . $logo->getClientOriginalExtension();

        $logo->move(public_path().'/assets/images', $filename);

        Logo::updateOrCreate(
            ['type' => $type],
            ['name' => $filename , 'type' => $type]
        );


    }

    public function calender()
    {
        return view('calender');
    }

    public function calenderAddHoliday(Request $request)
    {

        $data = $request->except('_token');
        $data['user_id'] = Auth::id();

        $event = Calendar::create($data);

        return $data;
        return response()->json(['success' => 'success'], 200)->header('Content-Type', 'text/plain');
        return (request()->description);
    }

    public function calenderGetHolidays()
    {
        $currentMonth = Carbon::now();
        $monthStart   =  $currentMonth->startOfMonth()->format('Y-m-d');
        $monthEnd     =  $currentMonth->endOfMonth()->format('Y-m-d');

        $holidays    = Calendar::whereBetween('created_at', array($monthStart, $monthEnd))->get()->toArray();

        return $holidays;
    }
    public function calenderDeleteHolidays($id)
    {
        $event = Calendar::find($id);

        $event->delete();
    }

    public function schoolInfo()
    {
        $school = SchoolInfo::first();
        if($school){

            return view('admin.update-school-info', compact('school'));

        }

        return view('admin.school-info');

    }

    public function saveSchoolInfo(Request $request)
    {
        $data = $request->all();

        if(request()->hasFile('Image')){

            $name = "";
            $name = time() . '.' . request()->file('Image')->getClientOriginalExtension();
            request()->file('Image')->move(public_path() . '/signature/', $name);
            $name = "signature/" . $name;
            $data['image'] = $name;
        }

        $school = SchoolInfo::create($data);
        return redirect()->route('home');
    }

    public function invnetory()
    {
        return view('admin.invnetory');
    }
}
