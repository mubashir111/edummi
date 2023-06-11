<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Department_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         DB::table('department_roles')->insert([
            'role_name' => 'document_handling',
            'created_by' => 'Super_Admin',
            'created_at' => Carbon::now()
        ]);


         DB::table('department_roles')->insert([
            'role_name' => 'application_handling',
            'created_by' => 'Super_Admin',
            'created_at' => Carbon::now()
        ]);


         DB::table('department_roles')->insert([
            'role_name' => 'visa_handling',
            'created_by' => 'Super_Admin',
            'created_at' => Carbon::now()
        ]);



         DB::table('department_roles')->insert([
            'role_name' => 'staff_handling',
            'created_by' => 'Super_Admin',
            'created_at' => Carbon::now()
        ]);

         DB::table('department_roles')->insert([
            'role_name' => 'test_handling',
            'created_by' => 'Super_Admin',
            'created_at' => Carbon::now()
        ]);

    }
}
