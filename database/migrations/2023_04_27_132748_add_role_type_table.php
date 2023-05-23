<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleTypeTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('referred_by')->nullable();
            $table->string('referral_role_type')->nullable();
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->boolean('user_deleted')->default(false);

            $table->foreign('referred_by')->references('id')->on('users');
            $table->foreign('manager_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['referred_by']);
            $table->dropForeign(['manager_id']);
            $table->dropColumn(['referred_by', 'referral_role_type', 'manager_id', 'user_deleted']);
        });
    }
}




