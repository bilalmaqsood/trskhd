<?php
/**
 * Created by PhpStorm.
 * User: Rehman Akbar
 * Date: 12/24/2017
 * Time: 1:05 PM
 */

namespace App\Trskd\Services;


use App\Trskd\Models\AttendenceLogs;
use App\Trskd\Models\Book;
use App\Trskd\Models\Exam;
use App\Trskd\Models\SchoolClass;
use App\Trskd\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use TADPHP\TAD;
use TADPHP\TADFactory;

class ZktecoService
{
    protected $tad;

    public function __construct()
    {

            $tadf = new TADFactory(['ip' => '182.180.104.108']);
            $this->tad = $tadf->get_instance();
    }

    public function Datasort()
    {
        if ($this->tad && $this->tad->is_alive()) {
            $data = $this->tad->get_att_log()->to_array();
            $data = $data['Row'];
            $data = collect($data);
            foreach ($data as $record){
                $log = AttendenceLogs::firstOrCreate([
                    "emp_id" => $record['PIN'],
                    "datetime" => Carbon::parse($record['DateTime']),
                    "status" => $record['Status'],
                    "workcode" => $record['WorkCode'],
                    "device_id" => 1
                ]);
                if(!$log->exists())
                {$log->emp_id=$record['PIN'];$log->status = 0;$log->workcode=0;$log->device_id=1; $log->save();}
            }
            return $data->where('DateTime', '>=', Carbon::today()->toDateTimeString());
        }

        return null;
    }


}