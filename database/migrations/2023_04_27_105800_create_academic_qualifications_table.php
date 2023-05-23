<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::create('academic_qualifications', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('student_id');
        $table->string('qualification');
        $table->string('institution');
        $table->date('start_date');
        $table->date('end_date')->nullable();
        $table->timestamps();
        
        $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_qualifications');
    }
}
