<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
             $table->string('year')->nullable()->change();
              $table->string('intake')->nullable()->change();
               $table->string('university_name')->nullable()->change();
                $table->string('course')->nullable()->change();

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
             $table->string('year')->change();
              $table->string('intake')->change();
               $table->string('university_name')->change();
                $table->string('course')->change();
        });
    }
}
