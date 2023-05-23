<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\deparmentModel;
use App\Models\User;

class departmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
{
    $departments = deparmentModel::all();
 

 $user = auth()->user()->user_id;

 $departments = deparmentModel::where('created_by',$user)->get();
// $departments = deparmentModel::whereHas('users', function ($query) use ($user) {
//     $query->where('id', $user);
// })->get();



   // foreach ($departments as $department) {
   //      $users = $department->users; // Access the `users` relationship for the current department
   //      dd($users);
   //  }

    $count = $departments->count();
    
    return view('manage-department', compact('departments', 'count'));
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
        $departments->created_by = auth()->user()->user_id;

        $departments->save();

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

        $departments = deparmentModel::where('id', $id)->first();
        $employee = User::where('role',"department_employee")->get();

       

        // Fetch the department and its associated users
        $users = User::where('department_id',$id)->get();
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

        $user = User::where('user_id', $request->user_id)->first();

        $user->department_id = $id;
        $user->save();

        return back();
    
        
    }
    
    public function updatename(Request $request)
    {

        $department = deparmentModel::where('id', $request->department_id)->first();
        $department->department_name = $request->name;
         
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

}
