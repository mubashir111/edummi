<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\deparmentModel;
use App\Models\User;
use App\Models\Department_roleModal;
use App\Models\Department_staff_modal;
use Carbon\Carbon;
use App\Notifications\alertUser;
use App\Models\NotificationModel;
use Illuminate\Support\Facades\Notification;

class departmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
{
    
 

 $user = auth()->user()->user_id;

 $departments = deparmentModel::where('created_by',$user)->get();
// $departments = deparmentModel::whereHas('users', function ($query) use ($user) {
//     $query->where('id', $user);
// })->get();



   // foreach ($departments as $department) {
   //      $users = $department->users; // Access the `users` relationship for the current department
   //      dd($users);
   //  }

    

    $count = Department_staff_modal::where('created_by',$user)->count();

    //dd($count);

    $department_role = Department_roleModal::all();
    
    return view('manage-department', compact('departments', 'count','department_role'));
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
         $departments = new deparmentModel;

        $departments->department_name = $request->name;
         $departments->department_role = $request->department_role;
        $departments->created_by = auth()->user()->user_id;

        $departments->save();


        // $notifyUser = $departments->id;
        // $notifyUser1 = $departments->referred_by;
$userIds = [1];
$message = "New department ".$departments->department_name." is created";

foreach ($userIds as $userId) {
    $user = User::find($userId);
    if ($user) {
        Notification::send($user, new alertUser($user, $message));
    }
}


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function markasread($id)
    {
       
         $notification = NotificationModel::where('id', $id)->first();

         $notification->read_at = Carbon::now();

         $notification->save();

         return back();



    }

    
    public function show($id)
    {
        
        $user_id = auth()->user()->id;

        $departments = deparmentModel::where('id', $id)->first();
        $employee = User::where('role',"department_employee")->where('referred_by',$user_id)->get();

       $userRole = auth()->user()->role;
        if ($userRole === "superadmin") {

             $employee = User::where('role',"department_employee")->where('status',"active")->get();
        }elseif ($userRole === "Branch_Owner") {

            $employee = User::where('role',"franchises_employee")->where('status',"active")->where('referred_by',$user_id)->get();
        }

        // Fetch the department and its associated users
        $users = Department_staff_modal::where('department_id',$id) ->with('user')->get();
        // $users = $department->users;

    
       

        return view('department-employee', ['department' => $departments,'employee' => $employee,'users' => $users ]);
        
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

    // Check if all fields are filled
    $requiredFields = ['user_id'];
    foreach ($requiredFields as $field) {
        if (empty($request->$field)) {
            return redirect()->back()->with('error', 'Please select an employee');
        }
    }

    $user = User::where('user_id', $request->user_id)->first();

    $user->department_id = $id;
    $user->save();

    $departmentStaff = Department_staff_modal::where('staff_id', $request->user_id)
        ->where('department_id', $id)
        ->first();

    if (!$departmentStaff) {
        $departmentStaff = new Department_staff_modal();
        $departmentStaff->created_by = auth()->user()->user_id;
        $departmentStaff->created_at = Carbon::now();
    }

    $departmentStaff->staff_id = $request->user_id;
    $departmentStaff->department_id = $id;
    $departmentStaff->save();

    

   return redirect()->back()->with('success', 'Employee added successfully');


}

    
    public function updatename(Request $request)
    {

        $department = deparmentModel::where('id', $request->department_id)->first();
        $department->department_name = $request->name;
        $department->department_role = $request->department_role;
         
        $department->save();

        return back();
    
        
    }


    public function changeStatus(Request $request){ 

       // dd($request);
    $user_id = $request->id;
    $statusUser = deparmentModel::where('id', $user_id)->first();
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

public function departmentemployees(Request $request){
    $department_id = $request->selected_value;
    
    $employees = User::where('department_id', $department_id)->get();
    
    return response()->json([
        'employees' => $employees
    ]);
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */  
    public function destroy($id)
{
    $department = deparmentModel::findOrFail($id);
    $department->delete();

    // Optional: Perform additional actions after deleting the department
    
    // Return a response indicating the success or failure of the deletion
    return response()->json(['status' => 'success', 'message' => 'Department has been deleted.']);
}

 public function remove_employee($id)
{

     $department = Department_staff_modal::findOrFail($id);
     $department->delete();
      return response()->json(['status' => 'success', 'message' => 'Empoyee has been removed from department.']);
  

   }

}
