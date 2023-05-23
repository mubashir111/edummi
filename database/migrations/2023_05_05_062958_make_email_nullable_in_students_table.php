<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeEmailNullableInStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
             $table->string('email')->nullable()->change();
             $table->string('name')->nullable()->change();
              $table->string('date_of_birth')->nullable()->change();
               $table->string('phone')->nullable()->change();
                $table->string('gender')->nullable()->change();
                $table->string('marital_status')->nullable()->change();
                 $table->string('status')->default('active')->change();
                $table->string('nationality')->nullable()->change();
                $table->string('citizenship')->nullable()->change();
                $table->string('image_url')->nullable()->change();
                  $table->string('first_name')->nullable()->change();
                    $table->string('middle_name')->nullable()->change();
                      $table->string('last_name')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('students', function (Blueprint $table) {
        $table->string('email')->change();
        $table->string('name')->change();
        $table->date('date_of_birth')->nullable(false)->change();
        $table->string('phone')->change();
        $table->string('gender')->change();
        $table->string('marital_status')->change();
        $table->dropColumn('assigned_to');
        $table->dropColumn('department');
        $table->string('status')->nullable()->change();
        $table->string('nationality')->change();
        $table->string('citizenship')->change();
        $table->string('image_url')->change();
        $table->string('first_name')->change();
        $table->string('middle_name')->change();
        $table->string('last_name')->change();
    });
}

}
