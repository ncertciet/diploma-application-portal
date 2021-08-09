<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStep2ColumnsToApplicationsTable extends Migration
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

            $table->text('eq_exam_x')->nullable()->after('o_zip');
            $table->text('eq_board_x')->nullable()->after('eq_exam_x');
            $table->string('eq_year_x')->nullable()->after('eq_board_x');
            $table->text('eq_marks_x')->nullable()->after('eq_year_x');
            $table->text('eq_subject_x')->nullable()->after('eq_marks_x');
            $table->text('eq_exam_xii')->nullable()->after('eq_subject_x');
            $table->text('eq_board_xii')->nullable()->after('eq_exam_xii');
            $table->string('eq_year_xii')->nullable()->after('eq_board_xii');
            $table->text('eq_marks_xii')->nullable()->after('eq_year_xii');
            $table->text('eq_subject_xii')->nullable()->after('eq_marks_xii');
            $table->text('eq_exam_grad')->nullable()->after('eq_subject_xii');
            $table->text('eq_board_grad')->nullable()->after('eq_exam_grad');
            $table->string('eq_year_grad')->nullable()->after('eq_board_grad');
            $table->text('eq_marks_grad')->nullable()->after('eq_year_grad');
            $table->text('eq_subject_grad')->nullable()->after('eq_marks_grad');
            $table->text('eq_exam_pgrad')->nullable()->after('eq_subject_grad');
            $table->text('eq_board_pgrad')->nullable()->after('eq_exam_pgrad');
            $table->string('eq_year_pgrad')->nullable()->after('eq_board_pgrad');
            $table->text('eq_marks_pgrad')->nullable()->after('eq_year_pgrad');
            $table->text('eq_subject_pgrad')->nullable()->after('eq_marks_pgrad');
            $table->text('eq_exam_oth1')->nullable()->after('eq_subject_pgrad');
            $table->text('eq_board_oth1')->nullable()->after('eq_exam_oth1');
            $table->string('eq_year_oth1')->nullable()->after('eq_board_oth1');
            $table->text('eq_marks_oth1')->nullable()->after('eq_year_oth1');
            $table->text('eq_subject_oth1')->nullable()->after('eq_marks_oth1');
            $table->text('eq_exam_oth2')->nullable()->after('eq_subject_oth1');
            $table->text('eq_board_oth2')->nullable()->after('eq_exam_oth2');
            $table->string('eq_year_oth2')->nullable()->after('eq_board_oth2');
            $table->text('eq_marks_oth2')->nullable()->after('eq_year_oth2');
            $table->text('eq_subject_oth2')->nullable()->after('eq_marks_oth2');
            $table->text('eq_exam_oth3')->nullable()->after('eq_subject_oth2');
            $table->text('eq_board_oth3')->nullable()->after('eq_exam_oth3');
            $table->string('eq_year_oth3')->nullable()->after('eq_board_oth3');
            $table->text('eq_marks_oth3')->nullable()->after('eq_year_oth3');
            $table->text('eq_subject_oth3')->nullable()->after('eq_marks_oth3');

            $table->text('pq_degree')->nullable()->after('eq_subject_oth3');
            $table->text('pq_board')->nullable()->after('pq_degree');
            $table->string('pq_year')->nullable()->after('pq_board');
            $table->text('pq_marks')->nullable()->after('pq_year');
            $table->text('pq_subject')->nullable()->after('pq_marks');
            $table->text('pq_degree1')->nullable()->after('pq_subject');
            $table->text('pq_board1')->nullable()->after('pq_degree1');
            $table->string('pq_year1')->nullable()->after('pq_board1');
            $table->text('pq_marks1')->nullable()->after('pq_year1');
            $table->text('pq_subject1')->nullable()->after('pq_marks1');
            $table->text('pq_degree2')->nullable()->after('pq_subject1');
            $table->text('pq_board2')->nullable()->after('pq_degree2');
            $table->string('pq_year2')->nullable()->after('pq_board2');
            $table->text('pq_marks2')->nullable()->after('pq_year2');
            $table->text('pq_subject2')->nullable()->after('pq_marks2');
            $table->text('pq_degree3')->nullable()->after('pq_subject2');
            $table->text('pq_board3')->nullable()->after('pq_degree3');
            $table->string('pq_year3')->nullable()->after('pq_board3');
            $table->text('pq_marks3')->nullable()->after('pq_year3');
            $table->text('pq_subject3')->nullable()->after('pq_marks3');
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
