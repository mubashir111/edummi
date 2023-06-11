<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadStausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('lead_statuses', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('description');
    $table->timestamps();
});

// Populate lead_statuses table
DB::table('lead_statuses')->insert([
    [
        'name' => 'New Lead',
        'description' => 'The initial status when a lead is created or received.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Contacted',
        'description' => 'The lead has been contacted or reached out to.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    // Add more lead statuses with their descriptions
    [
        'name' => 'Qualified',
        'description' => 'The lead has met certain criteria and is considered a potential opportunity.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Follow-up',
        'description' => 'Additional communication or follow-up actions are required for the lead.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Converted',
        'description' => 'The lead has been successfully converted into a customer or a sales opportunity.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Lost',
        'description' => 'The lead is not interested or not suitable for your product or service.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Pending',
        'description' => 'The lead is on hold or awaiting further action.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Closed',
        'description' => 'The lead has been closed or is no longer active.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_staus');
    }
}
