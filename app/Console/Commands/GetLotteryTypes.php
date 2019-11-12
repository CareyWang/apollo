<?php

namespace App\Console\Commands;

use App\Models\LotteryType;
use App\Services\Lottery;
use Illuminate\Console\Command;

class GetLotteryTypes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lottery:types';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get lottery types';

    private $lottery;

    /**
     * Create a new command instance.
     *
     * @return void
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
        $response = $this->lottery->getTypes();

        $now = date('Y-m-d H:i:s');
        if ($response['error_code'] == 0) {
            $types = $response['result'];
            foreach ($types as $type) {
                LotteryType::updateOrInsert(
                    [
                        'lottery_id' => $type['lottery_id'],
                    ],
                    [
                        'lottery_id' => $type['lottery_id'],
                        'lottery_name' => $type['lottery_name'],
                        'lottery_type_id' => $type['lottery_type_id'],
                        'remarks' => $type['remarks'],
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]
                );
            }

        } else {
            $this->error('接口响应错误');
        }
    }
}
