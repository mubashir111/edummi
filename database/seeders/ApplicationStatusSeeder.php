<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApplicationStatus;

class ApplicationStatusSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            [
                'name' => 'Draft',
                'description' => 'The application is in progress and has not been submitted yet.'
            ],
            [
                'name' => 'Submitted',
                'description' => 'The application has been completed and submitted to the university.'
            ],
            [
                'name' => 'Under Review',
                'description' => 'The university is currently reviewing the application.'
            ],
            [
                'name' => 'Accepted',
                'description' => 'The application has been accepted by the university.'
            ],
            [
                'name' => 'Rejected',
                'description' => 'The application has been rejected by the university.'
            ],
            [
                'name' => 'Waitlisted',
                'description' => 'The application is on a waiting list, and a final decision is pending.'
            ],
            [
                'name' => 'Conditional Offer',
                'description' => 'The university has provided a conditional offer, which may require meeting certain requirements or conditions.'
            ],
            [
                'name' => 'Offer Accepted',
                'description' => 'The applicant has accepted the offer of admission from the university.'
            ],
            [
                'name' => 'Offer Declined',
                'description' => 'The applicant has declined the offer of admission.'
            ],
            [
                'name' => 'Enrolled',
                'description' => 'The applicant has enrolled in the university and confirmed their admission.'
            ],
        ];

        foreach ($statuses as $status) {
            ApplicationStatus::create($status);
        }
    }
}
