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
        Schema::create('gratitudes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('advice_id')->comment('アドバイスid');
            $table->unsignedBigInteger('user_id')->comment('ユーザーid');
            $table->timestamps();
            $table->foreign('advice_id')->references('id')->on('advices')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gratitudes');
    }
};
