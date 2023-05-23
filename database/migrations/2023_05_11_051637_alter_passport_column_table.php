<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPassportColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('passports', function (Blueprint $table) {
            $table->string('city_of_birth')->nullable()->change();
             $table->string('country_of_birth')->nullable()->change();
             $table->string('passport_issue_country')->nullable()->change();
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
             $table->string('city_of_birth')->change();
             $table->string('country_of_birth')->change();
             $table->string('passport_issue_country')->change();
        });
    }
}
