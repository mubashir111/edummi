<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_chat', function (Blueprint $table) {
            $table->id();
            $table->string('sender_id');
            $table->json('recipient_id');
            $table->string('sender_message')->nullable();
            $table->string('attachment')->nullable();
            $table->json('response_message')->nullable();
            $table->json('response_attachment')->nullable();
            $table->string('application_id')->nullable();
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
        Schema::dropIfExists('application_chat');
    }
}
