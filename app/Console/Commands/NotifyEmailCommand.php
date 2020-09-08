<?php

namespace App\Console\Commands;

use App\Mail\NotificationMail;
use App\Notice;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifyEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email notification for expiry fc application';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $notices = Notice::whereDate('notice_date', Carbon::today())->with('fcApplication','fcApplication.premiseDetail')->get();
        if($notices->count() > 0){
            foreach ($notices as $notice){
                Mail::to([
                    'syafikatyra@gmail.com',
                    'imdakmar@gmail.com',
                    'norshuhadaamsari@yahoo.com',
                    'b031810044@student.utem.edu.my',
                    'b031710277@student.utem.edu.my'
                ])->send(new NotificationMail($notice));
            }
        }
    }
}
