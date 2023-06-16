<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\addressModel;
use App\Models\ImportantContactsModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Notifications\alertUser;
use App\Models\NotificationModel;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userRole = $user->role;
        $employeeRole = null;

        if ($userRole === "superadmin") {
            $employeeRole = "department_employee";
        } elseif ($userRole === "Branch_Owner") {
            $employeeRole = "franchises_employee";
        }

        $employees = User::where('role', $employeeRole)
            ->where('referred_by', $user->id)->orderBy('created_at', 'desc')
            ->get();



        return view('manage-employees', ['employee' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('create-employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
            // Check if all fields are filled
    $requiredFields = ['name', 'DOB', 'gender', 'marital_status', 'password', 'mailing_addres1', 'mailing_addres2', 'mailing_country', 'mailing_state', 'mailing_city' ,'mailing_pincode','permenent_address1','permenent_address2','permenent_country','permenent_state','permenent_city','permenent_pincode','permenent_nationality','permenent_citizenship','employee_number'];
    foreach ($requiredFields as $field) {
        if (empty($request->$field)) {
            return redirect()->back()->with('error', 'All fields are required!');
        }
    }


foreach ($requiredFields as $field) {
    if ($request->$field == "Select") {
        return redirect()->back()->with('error', 'Invalid value selected for [country, state, or nationality]!');
    }
}


        // $user_id = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
         $user_id = "EM" . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

        $users = User::where('user_id', $user_id)->first();

    if($users){
        // If the franchise_id already exists, generate a new one and check again
        return $this->store();
    }


    // Check if email already exists
    $user = User::where('email', $request->email)->first();
    if ($user){

        
        return redirect()->back()->withInput($request->all())->with('error', 'Email already exists!');

    }

        
       // dd($request->all());
             
             $formatted_date = date('Y-m-d', strtotime($request->DOB)); // Formatted date
         
         $userRole = Auth::user()->role;

         if ($userRole == "superadmin") {
            
            $employee_role= "department_employee";
         }elseif($userRole == "Branch_Owner"){

            $employee_role= "franchises_employee";
         }else{

         }

  
         $employee = new User;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->password = Hash::make($request->password);
            $employee->date_of_birth = $formatted_date;
            $employee->gender = $request->gender;
            $employee->marital_status = $request->marital_status;
            $employee->user_id = $user_id;
            $employee->role =$employee_role;
            $employee->referred_role_type =$userRole;
            $employee->phone_number =$request->employee_number;
            $employee->referred_by =auth()->user()->id;

            // Handle the logo file upload
         if ($request->hasFile('profile_url')) {
        foreach ($request->file('profile_url') as $profile_url) {
            $profile_url->move(public_path('profiles'), $profile_url->getClientOriginalName());
            $employee->profile_url = 'profiles/'.$profile_url->getClientOriginalName();
        }
    }
            
            $employee->save();


    // Create mailing address
    $address = new addressModel;
    $address->address_line_1 = $request->mailing_addres1;
    $address->address_line_2 = $request->mailing_addres2;
    $address->city = $request->mailing_city;
    $address->state = $request->mailing_state;
    $address->zip_code = $request->mailing_pincode;
    $address->country = $request->mailing_country;
    $address->email_type = "mailing_address";
    $address->address_type = "mailing";
    $address->employee_id = $user_id;
    $address->save();

    // Create permanent address
    $address2 = new addressModel;
    $address2->address_line_1 = $request->permenent_address1;
    $address2->address_line_2 = $request->permenent_address2;
    $address2->city = $request->permenent_city;
    $address2->state = $request->permenent_state;
    $address2->zip_code = $request->permenent_pincode;
    $address2->country = $request->permenent_country;
    $address2->address_type = "permanent";
    $address2->citizenship = $request->permenent_citizenship;
    $address2->email_type = "permanent";
    $address2->nationality = $request->permenent_nationality;
    $address2->employee_id = $user_id;
    $address2->save();
    
      $notifyUser = $employee->id;
$notifyUser1 = $employee->referred_by;
$userIds = [$notifyUser, $notifyUser1];
$message = "Employee id: " . $employee->email . " is created";

foreach ($userIds as $userId) {
    $user = User::find($userId);
    if ($user) {
        Notification::send($user, new alertUser($user, $message));
    }
}




    $user = Auth::user();
        $userRole = $user->role;
        $employeeRole = null;

        if ($userRole === "superadmin") {
            $employeeRole = "department_employee";
        } elseif ($userRole === "Branch_Owner") {
            $employeeRole = "franchises_employee";
        }

        $employees = User::where('role', $employeeRole)
            ->where('referred_by', $user->id)
            ->get();



            $url = 'https://fcm.googleapis.com/fcm/send';

        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $serverKey = 'AAAAFmZ0TGk:APA91bENGTCH4lrPihgnuShyZscdAukyzTnFOxTEi6XLlA2dC3lqN8EoxyH4qbBBvr0II0DTrubRCpoiKiB7Fj_FT7bw27IATKe5EWInN6w3uA8s3zAbMCBmW6iurZxoLrjQPZV6Fe2u'; // ADD SERVER KEY HERE PROVIDED BY FCM

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" =>'Created new employee',
                "body" => 'success',
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
       



        return view('manage-employees', ['employee' => $employees]);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $user = User::where('user_id', $id)->with('address')->get();
    // Perform any additional logic with the retrieved user


   
  
   
    if ($user) {
        return response()->json(['status' => 'success', 'response' => $user]);
    } else {
        return response()->json(['status' => 'error', 'message' => 'Failed to load id']);
    }



}


   public function changeStatus(Request $request){
    $user_id = $request->id;
    $statusUser = User::where('id', $user_id)->first();
    if (!$statusUser) {
        return response()->json(['status' => 'error', 'message' => 'User not found']);
    }
    $statusUser->status = $request->status;
    if ($statusUser->save()) {
        return response()->json(['status' => 'success', 'message' => 'Status updated successfully']);
    } else {
        return response()->json(['status' => 'error', 'message' => 'Failed to update status']);
    }
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
         $user = User::where('user_id', $id)->first();

         $address=addressModel::where('employee_id', $id)->get();

         return view('edit-employee', ['employee' => $user, 'address' => $address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
              

                // Check if all fields are filled
    $requiredFields = ['name', 'DOB', 'gender', 'marital_status','mailing_addres1', 'mailing_addres2', 'mailing_country', 'mailing_state', 'mailing_city' ,'mailing_pincode','permenent_address1','permenent_address2','permenent_country','permenent_state','permenent_city','permenent_pincode','permenent_nationality','permenent_citizenship','employee_number'];
    foreach ($requiredFields as $field) {
        if (empty($request->$field)) {
            return redirect()->back()->with('error', 'All fields are required!');
        }
    }


foreach ($requiredFields as $field) {
    if ($request->$field == "Select") {
        return redirect()->back()->with('error', 'Invalid value selected for [country, state, or nationality]!');
    }
}
           

                 $employee = User::where('user_id', $id)->first();

                 $address=addressModel::where('employee_id', $id)->where('address_type', 'mailing')->first();

                 $address2=addressModel::where('employee_id', $id)->where('address_type', 'permanent')->first();
                 $formatted_date = date('Y-m-d', strtotime($request->DOB)); // Formatted date

                  $employee->name = $request->name;
                    $employee->email = $request->email;
                    if($employee->password !== null){
                         $employee->password = Hash::make($request->password);
                    }
                   
                    $employee->date_of_birth = $formatted_date;
                    $employee->gender = $request->gender;
                    $employee->marital_status = $request->marital_status;
                    $employee->phone_number =$request->employee_number;
                    $employee->referred_by =auth()->user()->id;

                    // Handle the logo file upload
                 if ($request->hasFile('profile_url')) {
                foreach ($request->file('profile_url') as $profile_url) {
                    $profile_url->move(public_path('profiles'), $profile_url->getClientOriginalName());
                    $employee->profile_url = 'profiles/'.$profile_url->getClientOriginalName();
                }
            }
                    
                    $employee->save();


                         $address->address_line_1 = $request->mailing_addres1;
                $address->address_line_2 = $request->mailing_addres2;
                $address->city = $request->mailing_city;
                $address->state = $request->mailing_state;
                $address->zip_code = $request->mailing_pincode;
                $address->country = $request->mailing_country;
                $address->email_type = "mailing_address";
                $address->address_type = "mailing";
                $address->save();

                 $address2->address_line_1 = $request->permenent_address1;
                $address2->address_line_2 = $request->permenent_address2;
                $address2->city = $request->permenent_city;
                $address2->state = $request->permenent_state;
                $address2->zip_code = $request->permenent_pincode;
                $address2->country = $request->permenent_country;
                $address2->address_type = "permanent";
                $address2->citizenship = $request->permenent_citizenship;
                $address2->email_type = "permanent";
                $address2->nationality = $request->permenent_nationality;
                $address2->save();

             return redirect()->intended('/employees');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
