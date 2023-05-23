<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Reader;
use App\Models\state_list_Model;

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

            return "File uploaded successfully.";
        }

        return "No file was uploaded.";
    }

    public function pincodeupload(Request $request)
    {
        set_time_limit(0); // Disable the time limit (or set it to a higher value if needed)

        if ($request->hasFile('csv_file')) {
            $file = $request->file('csv_file');
            $path = $file->store('csv_files');

            $csv = Reader::createFromPath(storage_path('app/' . $path), 'r');
            $csv->setHeaderOffset(0);

            $batchSize = 500; // Number of records to process in each batch

            foreach ($csv->getRecords() as $index => $record) {
                $state = new state_list_Model;
                $state->Circle_Name = $record['Circle Name'];
                $state->Region_Name = $record['Region Name'];
                $state->Division_Name = $record['Division Name'];
                $state->Office_Name = $record['Office Name'];
                $state->Pincode = $record['Pincode'];
                $state->OfficeType = $record['OfficeType'];
                $state->Delivery = $record['Delivery'];
                $state->District = $record['District'];
                $state->StateName = $record['StateName'];

                $state->save();

                // Check if the batch size is reached and manually clear the model instance
                if (($index + 1) % $batchSize === 0) {
                    unset($state);
                }
            }

            // Manually clear the model instance after processing the remaining records
            unset($state);

            return "Pincode data uploaded successfully.";
        }

        return "No file was uploaded.";
    }
}
