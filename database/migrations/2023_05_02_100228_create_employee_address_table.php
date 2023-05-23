<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_address', function (Blueprint $table) {
            $table->id();
        $table->string('address_line_1');
        $table->string('address_line_2')->nullable();
        $table->string('city');
        $table->string('state');
        $table->string('zip_code');
        $table->string('country');
        $table->string('email_type')->nullable();
        $table->enum('address_type', ['mailing', 'permanent'])->nullable();
        $table->string('citizenship')->nullable();
        $table->string('employee_id');
        
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
        Schema::dropIfExists('employee_address');
    }
}
