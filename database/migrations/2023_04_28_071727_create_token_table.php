<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 

       Schema::create('tokens', function (Blueprint $table) {
    $table->id();
    $table->string('token_number');
    $table->string('ticket_subject');
    $table->unsignedBigInteger('franchise_id');
    $table->tinyInteger('status')->default(0);
    $table->string('token_type');
    $table->timestamps();

    $table->foreign('franchise_id')->references('id')->on('franchises')->onDelete('cascade');
});

    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('token');
    }
}
