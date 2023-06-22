<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionCreateModel extends Model
{
    use HasFactory;
    protected $table = 'institute';

    protected $fillable = [
        'university_name',
        'institute_name',
        'website_url',
        'campus',
        'country',
        'duration',
        'intakes',
        'entry_requirements',
        'application_deadline',
        'application_fee',
        'yearly_tuition_fee',
        'scholarship_available',
        'scholarship_detail',
        'remarks',
        'application_mode',
        'courses',
        'logo_url',
        'facilities',
        'departments',
        'study_level',
        'ielts_score',
        'toefl_score',
        'det_score',
        'contact_detail',
    ];

    protected $casts = [
        'intakes' => 'json',
        'entry_requirements' => 'json',
        'courses' => 'json',
        'facilities' => 'json',
        'departments' => 'json',
    ];
}
