<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddManagerIdLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            
             $table->unsignedBigInteger('manager_id')->after('referral_role_type')->nullable();
             $table->unsignedBigInteger('assigned_status')->after('referral_role_type')->default(1);
             $table->string('status')->after('referral_role_type')->default(7);
             $table->string('current_status')->after('referral_role_type')->nullable();
             $table->unsignedBigInteger('department')->after('referral_role_type')->nullable();
              $table->string('assigned_to')->after('referral_role_type')->nullable();
            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            
            $table->dropColumn('manager_id');
            $table->dropColumn('assigned_status');
            $table->dropColumn('status');
            $table->dropColumn('current_status');
            $table->dropColumn('department');
             $table->dropColumn('assigned_to');
        });
    }
}
