<?php

namespace App\Console\Commands;

use App\Trskd\Services\AttendanceService;
use App\Trskd\Services\SMSService;
use App\Trskd\Services\ZktecoService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Trskd\Models\User;
use App\Trskd\Models\Student;
use App\Trskd\Models\Teacher;
use App\Trskd\Models\Attendance;
use App\Trskd\Models\TeacherAttendance;

class ProcessAttendence extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:attendence';

    protected $Zkteco,$attendence,$sms;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ZktecoService $service,AttendanceService $attendanceService,SMSService $SMSService)
    {
        parent::__construct();

        $this->Zkteco = $service;
        $this->attendence = $attendanceService;
        $this->sms = $SMSService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = $this->Zkteco->Datasort();
        logger(Carbon::now());
        if($data){
            $IDs = $data->pluck("PIN")->toArray();
            $this->processStuentAttendance($IDs);
            $this->processTeacherAttendance($IDs);
        }
    }

    private function processStuentAttendance($IDs){
        $sT = Student::all();
        foreach ($sT as $s){
            $class_id = $s->studentClass->id;
            $student_id = $s->id;
            $data = [
                'class_id' => $s->studentClass->id,
                'status' => in_array($s->user->id,$IDs)?"present":"absent",
                'student_id' => $s->id,
                'user_id' => 1];
            Attendance::create($data);
            if(!in_array($s->user->id,$IDs)){
                $this->sms->absentSMS($s->user, 'Student');
            }
        }
    }

    private function processTeacherAttendance($IDs){
        $sT = Teacher::all();
        foreach ($sT as $s){
            $student_id = $s->id;
            $data = [
                'status' => in_array($s->user->id,$IDs)?"present":"absent",
                'teacher_id' => $s->id,
                'user_id' => 1];
            TeacherAttendance::create($data);
            if(!in_array($s->user->id,$IDs)){
                $this->sms->absentSMS($s->user, 'Teacher');
            }
        }
    }
}
