<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\InstitutionCreateModel;

class CsvConverController extends Controller
{
    
    public function convertToCsv()
{
    // Fetch data from the model
    $institute_lists = InstitutionCreateModel::all();

    // Define the file path and name
    $fileName = 'Institute_lists_' . date('Ymd_His') . '.csv';
    $filePath =  $fileName ;

    // Open the file in write mode
    $file = fopen(storage_path($filePath), 'w');

    // Write the headings to the file
    $headings = [
        'University',
        'Name',
        'Website URL',
        'Campus',
        'Country',
        'Study Level',
        'Duration',
        'Intakes',
        'Entry Requirements',
        'IELTS Score',
        'TOEFL Score',
        'DET Score',
        'Application Deadline',
        'Scholarship Available',
        'Scholarship Detail',
        'Remarks',
        
    ];
    fputcsv($file, $headings);

    // Write the data to the file
    foreach ($institute_lists as $institute) {
        $data = [
            $institute->university_name,
            $institute->institute_name,
            $institute->website_url,
            $institute->campus,
            $institute->country,
            $institute->study_level,
            $institute->duration,
            implode(',', json_decode($institute->intakes)),
            utf8_decode($institute->entry_requirements),
            $institute->ielts_score,
            $institute->toefl_score,
            $institute->det_score,
            $institute->application_deadline,
            $institute->scholarship_available,
            utf8_decode($institute->scholarship_detail),
            utf8_decode($institute->remarks),
        ];

        fputcsv($file, $data);
    }

    // Close the file
    fclose($file);

    // Generate a download response for the CSV file
    return response()
        ->download(storage_path($filePath))
        ->deleteFileAfterSend(true);
}


}
