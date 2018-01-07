<?php

namespace App\Console\Commands;

use App\Trskd\Models\User;
use App\Trskd\Services\SMSService;
use Illuminate\Console\Command;

class SendBirthDaySMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    protected $sms;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SMSService $SMSService)
    {
        parent::__construct();
        $this->sms = $SMSService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::whereMonth('DOB', date('m'))->whereDay('DOB', date('d'))->get();

        foreach ($users as $user){

            $this->sms->birthDaySMS($user);
        }


        $this->info('Birthday messages sent successfully!');
    }
}
