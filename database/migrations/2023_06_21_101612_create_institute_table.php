<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('institute', function (Blueprint $table) {
        $table->id();
        $table->string('university_name')->nullable();
        $table->string('institute_name')->nullable();
        $table->string('website_url')->nullable();
        $table->string('campus')->nullable();
        $table->string('country')->nullable();
        $table->string('duration', 500)->nullable();
        $table->json('intakes')->nullable();
        $table->json('entry_requirements')->nullable();
        $table->string('application_deadline')->nullable();
        $table->string('application_fee')->nullable();
        $table->string('yearly_tuition_fee')->nullable();
        $table->string('scholarship_available')->nullable();
        $table->text('scholarship_detail')->nullable();
        $table->text('remarks')->nullable();
        $table->string('application_mode')->nullable();
        $table->json('courses')->nullable();
        $table->string('logo_url')->nullable();
        $table->json('facilities')->nullable();
        $table->json('departments')->nullable();
        $table->string('study_level')->nullable();
        $table->integer('ielts_score')->nullable();
        $table->integer('toefl_score')->nullable();
        $table->integer('det_score')->nullable();
        $table->text('contact_detail')->nullable();
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
        Schema::dropIfExists('institute');
    }
}
