<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class staffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

         $user_id = auth()->user()->id;
        
          $staff = User::where('role', 'Sales_Staff')->where('referred_by',$user_id)->get();
         return view('manage-staff', ['staff' => $staff]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



         // $user_id = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
         $user_id = "ST" . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

        $users = User::where('user_id', $user_id)->first();

    if($users){
        // If the franchise_id already exists, generate a new one and check again
        return $this->store();
    }

     // Check if email already exists
    $user = User::where('email', $request->email_staff)->first();
    if ($user){

        
        return redirect()->back()->withInput($request->all())->with('error', 'Email already exists!');

    }

    
     

       $staffrefferdby = auth()->user()->id;
    // dd($staffrefferdby);


       $staffrefferdby_role = auth()->user()->role;
      

        $user = new User();
        $user->name = $request->name;
         $user->email = $request->email_staff;
          $user->password = $request->password_staff;
           $user->role = 'Sales_Staff';
            $user->user_id = $user_id;
             $user->referred_role_type = $staffrefferdby_role;
              $user->referred_by = $staffrefferdby;
               
               $user->save();

      $url = 'https://fcm.googleapis.com/fcm/send';

        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $serverKey = 'AAAAFmZ0TGk:APA91bENGTCH4lrPihgnuShyZscdAukyzTnFOxTEi6XLlA2dC3lqN8EoxyH4qbBBvr0II0DTrubRCpoiKiB7Fj_FT7bw27IATKe5EWInN6w3uA8s3zAbMCBmW6iurZxoLrjQPZV6Fe2u'; // ADD SERVER KEY HERE PROVIDED BY FCM

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" =>'Created new staff',
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
       

         return back();

    }



    public function sendNotification()
    {

        $url = 'https://fcm.googleapis.com/fcm/send';

        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $serverKey = 'AAAAFmZ0TGk:APA91bENGTCH4lrPihgnuShyZscdAukyzTnFOxTEi6XLlA2dC3lqN8EoxyH4qbBBvr0II0DTrubRCpoiKiB7Fj_FT7bw27IATKe5EWInN6w3uA8s3zAbMCBmW6iurZxoLrjQPZV6Fe2u'; // ADD SERVER KEY HERE PROVIDED BY FCM

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" =>'Created new staff',
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
        // Close connection
        curl_close($ch);
        // FCM response
         return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $staff = User::where('id', $id)->get();
        return response()->json(['staff' => $staff]);

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

            $id = $request->input('edit_id');
            $user = User::where('id', $id)->first();

            $user->email = $request->input('email');

            $user->name = $request->input('name');

            $user->save();

            return back();
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $staff = User::findOrFail($id);
     $staff->delete();
      return response()->json(['status' => 'success', 'message' => 'staff has been removed ']);
    }
}
