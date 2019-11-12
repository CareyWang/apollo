<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotteryType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery_type', function (Blueprint $table) {
            $table->string('lottery_id')->default('')->comment('彩票ID')->primary();
            $table->string('lottery_name')->default('')->comment('彩票名称');
            $table->integer('lottery_type_id')->default(0)->comment('彩票类型，1:福利彩票 2:体育彩票');
            $table->string('remarks')->default('')->comment('描述信息');
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
        Schema::dropIfExists('lottery_type');
    }
}
