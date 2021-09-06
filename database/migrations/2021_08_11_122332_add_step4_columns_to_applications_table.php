<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStep4ColumnsToApplicationsTable extends Migration
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

            $table->string('disability')->nullable()->after('course_duration3');
            $table->string('disability_content')->nullable()->after('disability');
            $table->string('disability_certificate')->nullable()->after('disability_content');
            $table->string('category')->nullable()->after('disability_certificate');
            $table->string('category_certificate')->nullable()->after('category');
            $table->string('candidate_sign')->nullable()->after('category_certificate');
            $table->string('candidate_photo')->nullable()->after('candidate_sign');
            $table->string('document')->nullable()->after('candidate_photo');
            

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
            $table->dropColumn('disability');
            $table->dropColumn('disability_content');
            $table->dropColumn('disability_certificate');
            $table->dropColumn('category');
            $table->dropColumn('category_certificate');
            $table->dropColumn('candidate_sign');
            $table->dropColumn('candidate_photo');
            $table->dropColumn('document');
        });
    }
}
