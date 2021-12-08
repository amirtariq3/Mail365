<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailsFarannTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails_farann', function (Blueprint $table) {
            $table->id();
            $table->string('message_id');
            $table->string('user_id');
            $table->string('subject');
            $table->string('sender_name');
            $table->string('sender_email')->nullable();
            $table->string('receiver_name');
            $table->string('category')->nullable();
            $table->string('date');
            $table->string('description');
            $table->string('colume_id')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('mails_farann');
    }
}
