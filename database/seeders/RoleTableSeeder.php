<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Major_Admin',
            'created_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Super_Admin',
            'created_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Branch_Owner',
            'created_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Sales_Staff',
            'created_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Student',
            'created_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Registration_Staff',
            'created_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Documentation_Staff',
            'created_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Visa_Processing_Staff',
            'created_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Fly_Staff',
            'created_at' => Carbon::now()
        ]);
    }
}
