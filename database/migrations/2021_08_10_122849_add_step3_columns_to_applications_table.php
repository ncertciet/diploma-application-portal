<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStep3ColumnsToApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            //

            $table->text('work_exp_name')->nullable()->after('pq_subject3');
            $table->text('work_exp_position')->nullable()->after('work_exp_name');
            $table->text('work_exp_date_from')->nullable()->after('work_exp_position');
            $table->text('work_exp_date_to')->nullable()->after('work_exp_date_from');
            $table->text('work_exp_duty')->nullable()->after('work_exp_date_to');
            $table->text('work_exp_name1')->nullable()->after('work_exp_duty');
            $table->text('work_exp_position1')->nullable()->after('work_exp_name1');
            $table->text('work_exp_date_from1')->nullable()->after('work_exp_position1');
            $table->text('work_exp_date_to1')->nullable()->after('work_exp_date_from1');
            $table->text('work_exp_duty1')->nullable()->after('work_exp_date_to1');
            $table->text('work_exp_name2')->nullable()->after('work_exp_duty1');
            $table->text('work_exp_position2')->nullable()->after('work_exp_name2');
            $table->text('work_exp_date_from2')->nullable()->after('work_exp_position2');
            $table->text('work_exp_date_to2')->nullable()->after('work_exp_date_from2');
            $table->text('work_exp_duty2')->nullable()->after('work_exp_date_to2');
            $table->text('work_exp_name3')->nullable()->after('work_exp_duty2');
            $table->text('work_exp_position3')->nullable()->after('work_exp_name3');
            $table->text('work_exp_date_from3')->nullable()->after('work_exp_position3');
            $table->text('work_exp_date_to3')->nullable()->after('work_exp_date_from3');
            $table->text('work_exp_duty3')->nullable()->after('work_exp_date_to3');
            $table->text('course')->nullable()->after('work_exp_duty3');
            $table->text('course_institute')->nullable()->after('course');
            $table->text('course_year')->nullable()->after('course_institute');
            $table->text('course_duration')->nullable()->after('course_year');
            $table->text('course1')->nullable()->after('course_duration');
            $table->text('course_institute1')->nullable()->after('course1');
            $table->text('course_year1')->nullable()->after('course_institute1');
            $table->text('course_duration1')->nullable()->after('course_year1');
            $table->text('course2')->nullable()->after('course_duration1');
            $table->text('course_institute2')->nullable()->after('course2');
            $table->text('course_year2')->nullable()->after('course_institute2');
            $table->text('course_duration2')->nullable()->after('course_year2');
            $table->text('course3')->nullable()->after('course_duration2');
            $table->text('course_institute3')->nullable()->after('course3');
            $table->text('course_year3')->nullable()->after('course_institute3');
            $table->text('course_duration3')->nullable()->after('course_year3');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            //
        });
    }
}
