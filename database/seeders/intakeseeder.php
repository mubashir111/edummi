<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\intakeModal;

class intakeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $statuses = [
    ['name' => 'January'],
    ['name' => 'February'],
    ['name' => 'March'],
    ['name' => 'April'],
    ['name' => 'May'],
    ['name' => 'June'],
    ['name' => 'July'],
    ['name' => 'August'],
    ['name' => 'September'],
    ['name' => 'October'],
    ['name' => 'November'],
    ['name' => 'December'],
    ['name' => 'Spring'],
    ['name' => 'Summer'],
    ['name' => 'Fall'],
    ['name' => 'Winter']
];

foreach ($statuses as $status) {
            intakeModal::create($status);
        }

    }
}
