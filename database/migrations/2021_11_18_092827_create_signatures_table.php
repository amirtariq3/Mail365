<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signatures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('email')->unique();;
            $table->string('company_logo');
            $table->string('company_url');
            $table->string('facebook_url');
            $table->string('twitter_url');
            $table->string('linkedin_url');
            $table->string('facebook_image');
            $table->string('twitter_image');
            $table->string('linkedin_image');
            $table->string('contact_url');
            $table->string('contact_image');
            $table->string('discription');
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
        Schema::dropIfExists('signatures');
    }
}
