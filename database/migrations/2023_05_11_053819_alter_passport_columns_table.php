<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPassportColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('passports', function (Blueprint $table) {
             $table->string('passport_number')->nullable()->change();
              $table->string('issue_date')->nullable()->change();
               $table->string('expiry_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('passports', function (Blueprint $table) {
             $table->string('passport_number')->change();
              $table->string('issue_date')->change();
               $table->string('expiry_date')->change();
        });
    }
}
