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
        Schema::create('sent_sms', function (Blueprint $table) {
            $table->id();
            $table->string('timeStamp');
            $table->string('address');
            $table->text('message');
            $table->string('messageId');
            $table->string('statusDetail');
            $table->text('statusCode');
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
        Schema::dropIfExists('sent_sms');
    }
};
