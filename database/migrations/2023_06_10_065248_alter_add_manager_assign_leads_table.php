<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddManagerAssignLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('assigned_to_manager')->after('referral_role_type')->nullable();
            $table->unsignedBigInteger('maanager_assigned_status')->after('referral_role_type')->default(1);
            $table->unsignedBigInteger('manager_department')->after('referral_role_type')->nullable();
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
            $table->dropColumn('assigned_to_manager');
            $table->dropColumn('maanager_assigned_status');
             $table->dropColumn('manager_department');
        });
    }
}
