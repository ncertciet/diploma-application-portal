<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->string('reg_id')->nullable();
            $table->string('application_id')->nullable();
            $table->string('step')->nullable();
            
            // Step-1
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('sc_state')->nullable();
            $table->string('study_centre')->nullable();
            $table->string('p_address')->nullable();
            $table->string('p_city')->nullable();
            $table->string('p_state')->nullable();
            $table->string('p_zip')->nullable();
            $table->string('p_telephone')->nullable();
            $table->string('p_mobile')->nullable();
            $table->string('p_email')->unique()->nullable();
            $table->string('occupation')->nullable();
            $table->string('o_address')->nullable();
            $table->string('o_city')->nullable();
            $table->string('o_state')->nullable();
            $table->string('o_zip')->nullable();

            $table->string('status')->default('pending');
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
        Schema::dropIfExists('applications');
    }
}
