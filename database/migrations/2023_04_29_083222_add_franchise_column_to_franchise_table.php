<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFranchiseColumnToFranchiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('franchises', function (Blueprint $table) {
    $table->enum('label', ['White Label', 'Green Label'])->nullable();
    $table->enum('gender', ['male', 'female', 'other'])->nullable();
    $table->json('websites')->nullable();
    $table->json('social_media_links')->nullable();
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('franchises', function (Blueprint $table) {
            $table->dropColumn('label');
            $table->dropColumn('websites');
            $table->dropColumn('gender');
            $table->dropColumn('social_media_links');
        });
    }
}
