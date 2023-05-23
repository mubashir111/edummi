<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('state_list', function (Blueprint $table) {
               $table->id();
             $table->string('Circle_Name')->nullable();
             $table->string('Region_Name')->nullable();
             $table->string('Division_Name')->nullable();
             $table->string('Office_Name')->nullable();
             $table->string('Pincode')->nullable();
             $table->string('OfficeType')->nullable();
             $table->string('Delivery')->nullable();
             $table->string('District')->nullable();
              $table->string('StateName')->nullable();
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
        
             Schema::dropIfExists('state_list');
        
    }
}
