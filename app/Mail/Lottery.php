<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Lottery extends Mailable
{
    use Queueable, SerializesModels;

    private $todayResult;

    /**
     * Create a new message instance.
     *
     * Lottery constructor.
     * @param array $todayResult
     */
    public function __construct(array $todayResult)
    {
        $this->todayResult = $todayResult;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.lottery.today')
            ->subject(date('Y-m-d').'献爱心战报')
            ->with([
                'result' => $this->todayResult['result'],
            ]);
    }
}
