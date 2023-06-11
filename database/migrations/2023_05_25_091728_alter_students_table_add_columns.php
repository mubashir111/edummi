<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterStudentsTableAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {


             $table->string('another_nationality')->nullable()->after('convicted_of_crime');

                $table->string('study_another_contry')->nullable()->after('convicted_of_crime');
                 $table->string('visa_refusal_type')->nullable()->after('visa_refusal');
                  $table->string('applied_imigaration_country')->nullable()->after('applied_for_immigration');
                   $table->string('convicted_of_crime')->nullable()->change();
                    $table->string('visa_refusal')->nullable()->change();
                
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

        $table->dropColumn('another_nationality');
        $table->dropColumn('study_another_contry');
        $table->dropColumn('visa_refusal_type');
         $table->dropColumn('applied_imigaration_country');
          $table->boolean('convicted_of_crime')->default(false);
           $table->boolean('visa_refusal')->default(false);
        
    });
}

}
