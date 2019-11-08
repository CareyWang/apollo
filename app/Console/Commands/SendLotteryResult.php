<?php

namespace App\Console\Commands;

use App\Services\Lottery;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendLotteryResult extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lottery:send {email*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send lottery result. Congratulations! ';

    protected $lottery;

    /**
     * Create a new command instance.
     * SendLotteryResult constructor.
     *
     * @param Lottery $lottery
     */
    public function __construct(Lottery $lottery)
    {
        parent::__construct();

        $this->lottery = $lottery;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Run!');

        $emails = $this->argument('email');
        $this->line($emails);
    
        $this->lottery->getTypes();
        $this->lottery->get('dlt');
        $this->lottery->getHistory('dlt');
    }
}
