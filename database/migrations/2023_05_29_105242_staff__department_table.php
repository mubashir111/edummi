<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StaffDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                    Schema::create('Staff_Department', function (Blueprint $table) {
                          $table->id();
                $table->string('staff_id');
                $table->string('department_id');
                 $table->string('created_by');
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->string('job_title')->nullable();
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
        Schema::table('Staff_Department', function (Blueprint $table) {
             Schema::dropIfExists('Staff_Department');
        });
    }
}
