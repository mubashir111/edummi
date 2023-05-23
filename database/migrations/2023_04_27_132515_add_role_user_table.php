<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('referred_by')->nullable();
        $table->string('referred_role_type')->nullable();
        $table->unsignedBigInteger('manager_id')->nullable();

        $table->foreign('referred_by')->references('id')->on('users')->onDelete('restrict');
        $table->foreign('manager_id')->references('id')->on('users')->onDelete('restrict');


     
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {

      
        
        
            $table->dropForeign(['referred_by']);
            $table->dropForeign(['manager_id']);

        $table->dropColumn('referred_by');
        $table->dropColumn('referred_role_type');
        $table->dropColumn('manager_id');
    });
}

}
