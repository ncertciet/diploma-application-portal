<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStep5ColumnsToApplicationsTbale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            
            $table->text('ref_name1')->nullable()->after('document');
            $table->text('ref_add1')->nullable()->after('ref_name1');
            $table->text('ref_pin1')->nullable()->after('ref_add1');
            $table->text('ref_phone1')->nullable()->after('ref_pin1');
            $table->text('ref_mobile1')->nullable()->after('ref_phone1');
            $table->text('ref_email1')->nullable()->after('ref_mobile1');
            $table->text('ref_name2')->nullable()->after('ref_email1');
            $table->text('ref_add2')->nullable()->after('ref_name2');
            $table->text('ref_pin2')->nullable()->after('ref_add2');
            $table->text('ref_phone2')->nullable()->after('ref_pin2');
            $table->text('ref_mobile2')->nullable()->after('ref_phone2');
            $table->text('ref_email2')->nullable()->after('ref_mobile2');
            $table->date('submit_date')->nullable()->after('ref_email2');
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
            $table->dropColumn('ref_name1');
            $table->dropColumn('ref_add1');
            $table->dropColumn('ref_pin1');
            $table->dropColumn('ref_phone1');
            $table->dropColumn('ref_mobile1');
            $table->dropColumn('ref_email1');
            $table->dropColumn('ref_name2');
            $table->dropColumn('ref_add2');
            $table->dropColumn('ref_pin2');
            $table->dropColumn('ref_phone2');
            $table->dropColumn('ref_mobile2');
            $table->dropColumn('ref_email2');
            $table->dropColumn('submit_date');
        });
    }
}
