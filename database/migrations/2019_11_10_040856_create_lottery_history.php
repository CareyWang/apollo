<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotteryHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lottery_id')->default('')->comment('彩票类别')->index();
            $table->integer('lottery_no')->default(0)->comment('彩票期号')->index();
            $table->string('lottery_res')->default('')->comment('中奖号码');
            $table->time('lottery_date')->comment('开奖日期');
            $table->time('lottery_exdate')->comment('兑奖截止日期');
            $table->string('lottery_sale_amount')->comment('本期销售额');
            $table->string('lottery_pool_amount')->comment('奖池');
            $table->string('mailed')->default('N')->comment('邮件通知');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lottery_history');
    }
}
