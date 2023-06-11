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
