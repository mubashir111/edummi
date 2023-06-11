<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Reader;
use App\Models\state_list_Model;
use App\Models\studentsModel;
use App\Models\leadsModdel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ExcelController extends Controller
{
    public function upload(Request $request)
    {
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
                continue;
            }

            $document = new leadsModdel($data);

            // Set referred_by, referral_role_type, and created_at only if other columns exist
            if (!is_null($document->name) || !is_null($document->first_name) || !is_null($document->last_name)) {
                $document->referred_by = Auth::user()->id;
                $document->referral_role_type = Auth::user()->role;
                 $document->manager_id = Auth::user()->referred_by;
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

        return back();
    } else {
        return "No file was uploaded.";
    }
}




}
