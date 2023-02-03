<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violation_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('advice_id')->comment('アドバイスid');
            $table->bigInteger('user_id')->comment('ユーザーid');
            $table->string('title')->comment('タイトル');
            $table->text('advice')->comment('アドバイス');
            $table->string('reason')->comment('違反理由');
            $table->timestamps();
            $table->foreign('advice_id')->references('id')->on('advices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('violation_reports');
    }
};
