<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\applicationModel;
use App\Models\intakeModal;
use App\Models\ApplicationStatus;
use App\Models\User;
use Carbon\Carbon;
use App\Notifications\Application_status;
use App\Models\NotificationModel;
use App\Models\studentsModel;
use Illuminate\Support\Facades\Notification; 

class applications extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $user_id =  auth()->user()->id;
       
        $userRole = auth()->user()->role;
        if ($userRole === "superadmin") {
            $applications = applicationModel::all();
        } elseif ($userRole === "Branch_Owner") {
            $applications = applicationModel::where('referred_by',auth()->user()->id)->orWhere('manager_id',auth()->user()->id)->get();

        }elseif ($userRole === "department_employee") {
            $applications = studentsModel::where('document_status','verified')->with('application')->with('username')->get();

        }
         else{
           
           $applications = applicationModel::where('referred_by',auth()->user()->id)->get();
        }

        $application_status = ApplicationStatus::all();

        $intakes = intakeModal::all();

        

        NotificationModel::where('notifiable_id', $user_id)
    ->where('type','App\Notifications\Application_status')
    ->delete();


         if($userRole === "department_employee"){

             return view('manage-application-department',['students'=> $applications, 'application_status' => $application_status,'intakes'=>$intakes]);

         }else{
           
           return view('manage-application',['applications'=> $applications, 'application_status' => $application_status,'intakes'=>$intakes]);

         }

         
    }


    public function appstatuschange(Request $request)
{
    $application = applicationModel::find($request->application_id);
    
    if ($application) {
        $application->current_status = $request->status;
        $application->save();
       
        $student_id = $application->student->student_id;
        $discription = $application->statusview->description;
        $notifyUser1 = $application->student->referred_by;
        $notifyUser2 = 1;
        $notifyUser3 = $application->id;
        $userIds = [$notifyUser1, $notifyUser2];

      $application_notification = new NotificationModel;

$id = rand(0, 99999);
while (NotificationModel::where('id', $id)->exists()) {
    $id = rand(0, 99999);
}

$application_notification->id = $id;
$application_notification->type = "App\Notifications\Application_status";
$application_notification->notifiable_id = $notifyUser3;
$application_notification->save();


        $message = "student id: " . $student_id . $discription;

        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
                Notification::send($user, new Application_status($user, $message));
            }
        }
    }
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
        //
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

   
    public function ApplicationstatusMarkread(Request $request)
{

    NotificationModel::where('notifiable_id', $request->id)
        ->where('type','App\Notifications\Application_status')
        ->update(['read_at' => Carbon::now()]);

    return response()->json(['status' => 'success', 'message' => 'Marked as read.']);
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
{
    $application = applicationModel::findOrFail($id);
    $application->delete();

    // Optional: Perform additional actions after deleting the department
    
    // Return a response indicating the success or failure of the deletion
    return response()->json(['status' => 'success', 'message' => 'Department has been deleted.']);
}


}
