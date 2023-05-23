<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseFinderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('course_finders', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('link');
            $table->string('created_by');
            $table->string('roll_type');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('course_finders');
    }
}
