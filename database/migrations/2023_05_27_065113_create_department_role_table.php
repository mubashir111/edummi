<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('department_roles', function (Blueprint $table) {
            $table->id();
            $table->text('role_name')->nullable();
             $table->text('created_by');
            
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
        Schema::table('department_roles', function (Blueprint $table) {
            Schema::dropIfExists('department_role');
        });
    }
}
