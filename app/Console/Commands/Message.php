<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use Config;
//use DateTime;
use App\Helpers\DateTimeHelper;

class Message extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Message:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Message run';

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
     *  php artisan Message:run
     * @return mixed
     */
    public function handle()
    {
        //$commission_rate = Config::get('wechatecommerce.commission_rate.goldMedal');
        //Log::debug("debug");
        //Log::debug($commission_rate);

        $startDate = time();
        $expireDateTime = date('Y-m-d H:i:s', strtotime('-3 day', $startDate));
        echo($expireDateTime);
        var_dump(DateTimeHelper::compareDateTime($expireDateTime, date('Y-m-d H:i:s')));
    }

}
