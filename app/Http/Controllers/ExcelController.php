<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Reader;
use App\Models\state_list_Model;
use App\Models\studentsModel;
use App\Models\leadsModdel;
use App\Models\InstitutionCreateModel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ExcelController extends Controller
{
    public function upload(Request $request)
    {   
        
         // Validate the uploaded file
    $validator = Validator::make($request->all(), [
        'csv_file' => 'required|file|mimes:csv,txt',
    ]);

    if ($validator->fails()) {
        return back()->with('error', 'Please change your file in csv format');
    }

        if ($request->hasFile('csv_file')) {
            $file = $request->file('csv_file');
            $path = $file->store('csv_files');

            // Process the uploaded file as needed
            // For example, you can save it to the database or perform data manipulation

            $csv = Reader::createFromPath(storage_path('app/' . $path), 'r');
            $csv->setHeaderOffset(0);

            foreach ($csv->getRecords() as $record) {
                // Access the column values using the column headers
                //dd($record['Eldon Base for stackable storage shelf, platinum']);
                $name = $record['name'];
                $email = $record['email'];
                $number = $record['number'];
                $role = $record['role'];

                // Perform operations with the extracted values
                // For example, you can save them to the database or perform further data processing
                // Here, we simply print the values
                echo "Name: $name, Email: $email, Number: $number, Role: $role<br>";
            }

            return redirect()->back()->with('success', 'Leads uploaded successfully');
        }

        return redirect()->back()->with('error', 'Lead creation failed');

    }

    public function upload_institution(Request $request)
{

    // Validate the uploaded file
    $validator = Validator::make($request->all(), [
        'institution_file' => 'required|file|mimes:csv,txt',
    ]);

    if ($validator->fails()) {
        return back()->with('error', 'Please change your file in csv format');
    }

    if ($request->hasFile('institution_file')) {
        $file = $request->file('institution_file');
        $path = $file->store('institution_file');
        $csv = Reader::createFromPath(storage_path('app/' . $path), 'r');
        $csv->setHeaderOffset(0);

        $batchSize = 500; // Number of records to process in each batch

        foreach ($csv->getRecords() as $index => $record) {
           $data = [
    'university_name' => isset($record['University']) ? $record['University'] : null,
    'institute_name' => isset($record['Name']) ? $record['Name'] : null,
    'website_url' => isset($record['Website URL']) ? $record['Website URL'] : null,
    'campus' => isset($record['Campus']) ? $record['Campus'] : null,
    'country' => isset($record['Country']) ? $record['Country'] : null,
    'study_level' => isset($record['Study Level']) ? $record['Study Level'] : null,
    'duration' => isset($record['Duration']) ? $record['Duration'] : null,
    'intakes' => isset($record['Intakes']) ? json_encode([$record['Intakes']]) : null, // Convert to JSON array
    'entry_requirements' => isset($record['Entry Requirements']) ? utf8_encode($record['Entry Requirements']) : null,
    'ielts_score' => isset($record['IELTS Score']) ? $record['IELTS Score'] : null,
    'toefl_score' => isset($record['TOEFL Score']) ? $record['TOEFL Score'] : null,
    'det_score' => isset($record['DET Score']) ? $record['DET Score'] : null,
    'application_deadline' => isset($record['Application Deadline']) ? $record['Application Deadline'] : null,
    'application_fee' => isset($record['Application Fee']) ? $record['Application Fee'] : null,
    'yearly_tuition_fee' => isset($record['Yearly Tuition Fees']) ? json_encode([$record['Yearly Tuition Fees']]) : null, // Convert to JSON array
    'scholarship_available' => isset($record['Scholarship Available']) ? $record['Scholarship Available'] : null,
    'scholarship_detail' => isset($record['Scholarship Detail']) ? utf8_encode($record['Scholarship Detail']) : null,
    'remarks' => isset($record['Remarks']) ? utf8_encode($record['Remarks']) : null,
    'application_mode' => isset($record['ApplicationMode']) ? $record['ApplicationMode'] : null,
];


            // Skip iteration if all columns are empty
            if (empty(array_filter($data))) {
                return back()->with('error', 'Please upload with header [University,Name,Website URL,Campus,Country,Study Level,Duration,Intakes,Entry Requirements,IELTS Score,TOEFL Score,DET Score,Application Deadline,Application Fee,Yearly Tuition Fees,Scholarship Available,Scholarship Detail,Remarks,ApplicationMode]');
            }

            // Check if the same data already exists
            $existingRecord = InstitutionCreateModel::where('university_name', $data['university_name'])
                ->where('institute_name', $data['institute_name'])
                ->where('website_url', $data['website_url'])
                // Add more conditions for other unique fields if necessary
                ->first();

            if ($existingRecord) {
                continue; // Skip inserting if the record already exists
            }

            $document = new InstitutionCreateModel($data);
            $document->save();

            // Check if the batch size is reached and manually clear the model instance
            if (($index + 1) % $batchSize === 0) {
                unset($document);
            }
        }

        // Manually clear the model instance after processing the remaining records
        unset($document);

        return back()->with('success', 'uploaded successfully');
    }

    return "No file was uploaded.";
}


    // public function pincodeupload(Request $request)
    // {
    //     set_time_limit(0); // Disable the time limit (or set it to a higher value if needed)

    //     if ($request->hasFile('csv_file')) {
    //         $file = $request->file('csv_file');
    //         $path = $file->store('csv_files');

    //         $csv = Reader::createFromPath(storage_path('app/' . $path), 'r');
    //         $csv->setHeaderOffset(0);

    //         $batchSize = 500; // Number of records to process in each batch

    //         foreach ($csv->getRecords() as $index => $record) {
                
    //             $state = new state_list_Model;
    //             $state->Circle_Name = $record['Circle Name'];
    //             $state->Region_Name = $record['Region Name'];
    //             $state->Division_Name = $record['Division Name'];
    //             $state->Office_Name = $record['Office Name'];
    //             $state->Pincode = $record['Pincode'];
    //             $state->OfficeType = $record['OfficeType'];
    //             $state->Delivery = $record['Delivery'];
    //              $state->District = $record['District'];
    //         $state->StateName = $record['State'];

           

    //             $state->save();

    //             // Check if the batch size is reached and manually clear the model instance
    //             if (($index + 1) % $batchSize === 0) {
    //                 unset($state);
    //             }
    //         }

    //         // Manually clear the model instance after processing the remaining records
    //         unset($state);

    //         return "Pincode data uploaded successfully.";
    //     }

    //     return "No file was uploaded.";
    // }



public function pincodeupload(Request $request)
    {
       

        if ($request->hasFile('csv_file')) {
            $file = $request->file('csv_file');
            $path = $file->store('csv_files');
         $csv = Reader::createFromPath(storage_path('app/' . $path), 'r');
        $csv->setHeaderOffset(0);

        $batchSize = 500; // Number of records to process in each batch

        foreach ($csv->getRecords() as $index => $record) {
            $data = [
                'StateName' => $record['state'] ,
                'District' => $record['district'],
                'state_type' => $record['state_type'],
                
            ];

            // Skip iteration if all columns are empty
            if (empty(array_filter($data))) {
                continue;
            }

            $document = new state_list_Model($data);

            // Set referred_by, referral_role_type, and created_at only if other columns exist
            if (!is_null($document->name) || !is_null($document->first_name) || !is_null($document->last_name)) {
                $document->referred_by = Auth::user()->id;
                $document->referral_role_type = Auth::user()->role;
                $document->created_at = Carbon::now();
            }

            $document->save();

            // Check if the batch size is reached and manually clear the model instance
            if (($index + 1) % $batchSize === 0) {
                unset($document);
            }
        }

        // Manually clear the model instance after processing the remaining records
        unset($document);

         return "Pincode data uploaded successfully.";
        }

        return "No file was uploaded.";
    }
 

   public function leadsupload(Request $request)
{
    // Validate the uploaded file
    $validator = Validator::make($request->all(), [
        'leads_docs' => 'required|file|mimes:csv,txt',
    ]);

    if ($validator->fails()) {
        return back()->with('error', 'Please change your file in CSV format');
    }

    if ($request->hasFile('leads_docs')) {
        $file = $request->file('leads_docs');
        $path = $file->store('leads_docs');

        $csv = Reader::createFromPath(storage_path('app/' . $path), 'r');
        $csv->setHeaderOffset(0);

        $batchSize = 500; // Number of records to process in each batch

        foreach ($csv->getRecords() as $index => $record) {
            $data = [
                'name' => isset($record['name']) ? $record['name'] : null,
                'first_name' => isset($record['first_name']) ? $record['first_name'] : null,
                'middle_name' => isset($record['middle_name']) ? $record['middle_name'] : null,
                'last_name' => isset($record['last_name']) ? $record['last_name'] : null,
                'email' => isset($record['email']) ? $record['email'] : null,
                'phone' => isset($record['number']) ? $record['number'] : null,
                'address' => isset($record['address']) ? $record['address'] : null,
                'date_of_birth' => isset($record['date_of_birth']) ? $record['date_of_birth'] : null,
                'gender' => isset($record['gender']) ? $record['gender'] : null,
            ];

            // Skip iteration if all columns are empty
            if (empty(array_filter($data))) {
                return back()->with('error', 'Please upload with header [name,email,number,address,date_of_birth,gender]');
            }

            // Rest of the code...
            // (processing and saving the records)

            return back()->with('success', 'Uploaded successfully');
        }
    }


    return back()->with('error', 'No file was uploaded.]');
}





}
