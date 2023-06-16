<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\leadsModdel;
use App\Models\deparmentModel;
use App\Models\LeadsstatusModal;
use App\Models\studentsModel;
use Carbon\Carbon;
use App\Notifications\alertUser;
use App\Notifications\students_create;
use App\Models\NotificationModel;
use Illuminate\Support\Facades\Notification;
use App\Models\ApplicationStatus;
use App\Models\applicationModel;
use App\Models\intakeModal;

class leadsController extends Controller
{
      public function index()
    {
         $user = auth()->user()->user_id;
         $departments = deparmentModel::where('created_by',$user)->get();


       
        $userRole = auth()->user()->role;
        if ($userRole === "superadmin") {
            $leads = leadsModdel::where('assigned_status',1)->where('referred_by',auth()->user()->id)->orWhere('manager_id',auth()->user()->id)->get();

        } elseif ($userRole === "Branch_Owner") {
            $leads = leadsModdel::where('assigned_status',1)->where('referred_by',auth()->user()->id)->orWhere('manager_id',auth()->user()->id)->get();

        } else{
           
           $leads = leadsModdel::where('assigned_status',1)->where('referred_by',auth()->user()->id)->get();
        }

       
         return view('manage-leads',['leads'=> $leads,'departments' => $departments]);

    }





public function convertToStudent($id)
{
    $leads = leadsModdel::findOrFail($id);

    if ($leads) {
        $leads->coverted_toStudent_status = 2;
        $leads->save();

        $student_id = "ST" . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
        $student_check = studentsModel::where('student_id', $student_id)->first();

        if ($student_check) {
            return $this->convertToStudent($id);
        }

        $student = new studentsModel;
        $student->first_name = $leads->name;
        $student->name = $leads->name;
        $student->phone = $leads->phone;
        $student->email = $leads->email;
        $student->student_id = $student_id;
        $student->referred_by  = $leads->referred_by;
        $student->manager_id  = $leads->manager_id;
        $student->referral_role_type = $leads->referral_role_type;
        $student->created_at = Carbon::now();
        $student->save();

        $notifyUser1 = $student->referred_by;
        $notifyUser2 = 1;
        $notifyUser3 = $student->id;
        $userIds = [$notifyUser1];
        $userIdss = [$notifyUser1, $notifyUser2];
        $message = "student id: " . $student->student_id . " is created";

        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
                Notification::send($user, new alertUser($user, $message));
            }
        }

        foreach ($userIdss as $userId2) {
            $user = User::find($userId2);
            if ($user) {
                Notification::send($user, new students_create($user, $message));
            }
        }

        $student_notification = new NotificationModel;
        $id = rand(0, 99999);
        while (NotificationModel::where('id', $id)->exists()) {
            $id = rand(0, 99999);
        }
        $student_notification->id = $id;
        $student_notification->type = "App\Notifications\add_new_student";
        $student_notification->notifiable_id = $notifyUser3;
        $student_notification->save();

        return redirect()->back()->with('success', 'Student created successfully');
    }
}



   public function signedlead()
{
    $userRole = auth()->user()->role;
    if ($userRole === "superadmin") {
        $leads = leadsModdel::where('assigned_status', 2)->where(function ($query) {
                $query->where('referred_by', auth()->user()->id)
                    ->orWhere('manager_id', auth()->user()->id);
            })
            ->where('status', '!=', 5)
            ->get();
            
    } elseif ($userRole === "Branch_Owner") {
        $leads = leadsModdel::where('assigned_status', 2)
            ->where(function ($query) {
                $query->where('referred_by', auth()->user()->id)
                    ->orWhere('manager_id', auth()->user()->id);
            })
            ->where('status', '!=', 5)
            ->get();
    }elseif($userRole === "department_employee"){

         $leads = leadsModdel::where('assigned_status', 2)
            ->where('assigned_to_manager', auth()->user()->user_id)
            ->get();
    }
     else {
        $leads = leadsModdel::where('assigned_status', 2)
            ->where('assigned_to', auth()->user()->user_id)
            ->where('status', '!=', 5)
            ->get();
    }

    $leadstatus = LeadsstatusModal::all();

    return view('signed-leads', compact('leads', 'leadstatus'));
}



   public function assignto(Request $request)
{
    $department = deparmentModel::where('id', $request->department)->first();
    $employee = User::where('user_id',$request->employee)->first();

    $leads = leadsModdel::where('assigned_status', 1)
        ->where(function ($query) {
            $query->where('referred_by', auth()->user()->id)
                ->orWhere('manager_id', auth()->user()->id);
        })
        ->limit($request->limit)
        ->get();

    foreach ($leads as $lead) {
        
        $lead->assigned_to = $request->employee;
        $lead->department = $request->department;
        $lead->current_status = "Hand over to " . $department->department_name . " (" . $employee->name . ")";
         $lead->assigned_status = 2;
        $lead->save();
    }

    return redirect()->back()->with('success', 'Lead assigned successfully');

}


 public function manger_assignto(Request $request)
{
    $department = deparmentModel::where('id', $request->department)->first();
    $employee = User::where('user_id',$request->employee)->first();

        $leads = leadsModdel::where('maanager_assigned_status', 1)
        ->where('status', 5)
        ->limit($request->limit)
        ->get();

    foreach ($leads as $lead) {
        
        $lead->assigned_to_manager = $request->employee;
        $lead->manager_department = $request->department;
        $lead->current_status = "Hand over to " . $department->department_name . " (" . $employee->name . ")";
         $lead->maanager_assigned_status = 2;
        $lead->save();
    }

    return redirect()->back()->with('success', 'Lead assigned successfully');


}

public function statushange(Request $request)
{

   

  $lead = leadsModdel::where('id',$request->status_lead_id)->first();

  if($lead){

    $lead->status = $request->status_name;
   
   if($request->description !=null){

    $lead->discription = $request->description;

   }
    

    $lead->save();


  }

  return redirect()->back()->with('success', 'Lead status has changed');

    
}

public function convertedlead(Request $request)
{

      $user = auth()->user()->user_id;
         $departments = deparmentModel::where('created_by',$user)->get();
    
     $userRole = auth()->user()->role;
        if ($userRole === "superadmin") {
            $leads = leadsModdel::where('status',5)->get();
        } elseif ($userRole === "Branch_Owner") {
            $leads = leadsModdel::where('status',5)->where('referred_by',auth()->user()->id)->orWhere('manager_id',auth()->user()->id)->get();

        } else{
           
           $leads = leadsModdel::where('status',5)->where('assigned_to',auth()->user()->user_id)->get();
        }

        $leadstatus = LeadsstatusModal::all();

       
         return view('converted-leads',compact('leads','leadstatus','departments'));

}

public function editview(Request $request){

     $lead = leadsModdel::where('id',$request->edit_id)->first();
      return response()->json(['lead' => $lead]);

}

public function storedata(Request $request){

   $lead = leadsModdel::where('id',$request->edit_id)->first(); 
    $lead->name = $request->first_name;
    $lead->phone = $request->number;
    $lead->email = $request->email;
    $lead->address = $request->address;

    $lead->save();

    return back();
}

public function store(Request $request){

    

    $lead = new leadsModdel();

    $lead->name = $request->first_name;
    $lead->phone = $request->number;
    $lead->email = $request->email;
    $lead->address = $request->address;
    $lead->referred_by = Auth::user()->id;
                $lead->referral_role_type = Auth::user()->role;
                 $lead->manager_id = Auth::user()->referred_by;

    $lead->save();


    $url = 'https://fcm.googleapis.com/fcm/send';

        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $serverKey = 'AAAAFmZ0TGk:APA91bENGTCH4lrPihgnuShyZscdAukyzTnFOxTEi6XLlA2dC3lqN8EoxyH4qbBBvr0II0DTrubRCpoiKiB7Fj_FT7bw27IATKe5EWInN6w3uA8s3zAbMCBmW6iurZxoLrjQPZV6Fe2u'; // ADD SERVER KEY HERE PROVIDED BY FCM

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" =>'Created new lead',
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
       


    return redirect()->back()->with('success', 'Lead created successfully');

     

}

public function destroy($id)
    {
        
          $lead = leadsModdel::findOrFail($id);
     $lead->delete();
      return response()->json(['status' => 'success', 'message' => 'lead has been removed ']);
    }



}

