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
    protected $signature = 'lottery:send {lotteryType} {email*}';

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

        $lotteryType = $this->argument('lotteryType');
        $emails = $this->argument('email');

        $todayResult = $this->lottery->get($lotteryType);
        if ($todayResult['error_code']) {
            $this->error($todayResult['reason']);

            return false;
        }

        $this->info('获取'.$todayResult['result']['lottery_name'].$todayResult['result']['lottery_date'].'开奖结果成功！');

        // 发个邮件
        Mail::to($emails)->send(new \App\Mail\Lottery($todayResult));
    }
}
