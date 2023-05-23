<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('students', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('phone');
    $table->date('date_of_birth');
    $table->enum('gender', ['male', 'female', 'other']);
    $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed']);
    $table->enum('status', ['active', 'inactive']);
    $table->string('nationality');
    $table->json('citizenship')->nullable();
    $table->boolean('applied_for_immigration')->default(false);
    $table->text('medical_conditions')->nullable();
    $table->boolean('visa_refusal')->default(false);
    $table->boolean('convicted_of_crime')->default(false);
    $table->string('visa_type')->nullable();
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
        Schema::dropIfExists('student');
    }
}
