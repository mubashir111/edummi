<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\FranchiseModel;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Notifications\alertUser;
use App\Models\NotificationModel;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;


class franchiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        
          $franchises = FranchiseModel::with('user')->orderBy('created_at', 'desc')->get();

          // dd($franchises);

          return view('manage-franchise', ['franchises' => $franchises]);

       

       
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $franchise_id = "edummi" . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

    $franchise = FranchiseModel::where('franchise_id', $franchise_id)->first();

    if($franchise){
        // If the franchise_id already exists, generate a new one and check again
        return $this->create();
    }

    return view('register-franchise', ['franchise_id' => $franchise_id]);
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{


    // Check if email already exists
    $user = User::where('email', $request->email)->first();
    if ($user){

        
        return redirect()->back()->withInput($request->except('password', 're_password'))->with('error', 'Email already exists!');
    }

    // Check if password and re-password are the same
    if ($request->password != $request->re_password) {
        return redirect()->back()->withInput($request->except('password', 're_password'))->with('error', 'Passwords do not match!');
    }

    // Check if all fields are filled
    $requiredFields = ['head_name', 'email', 'password', 'franchise_name', 'franchise_state', 'franchise_address', 'franchise_country', 'franchise_number', 'franchise_website', 'social_media_link'];
    foreach ($requiredFields as $field) {
        if (empty($request->$field)) {
            return redirect()->back()->withInput($request->except('password', 're_password'))->with('error', 'All fields are required!');
        }
    }
    

     $user_id = "BH" . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

        $users = User::where('user_id', $user_id)->first();

    if($users){
        // If the franchise_id already exists, generate a new one and check again
        return $this->store();
    }
    
     $userRole = Auth::user()->role;

         if ($userRole == "superadmin") {
            
            $employee_role= "department_employee";
         }elseif($userRole == "Branch_Owner"){

            $employee_role= "franchises_employee";
         }else{

         }

    // Create the user and franchise if all checks pass
    $user = User::create([
        'name' => $request->head_name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'Branch_Owner',
        'user_id' => $user_id,
         'referred_by' => auth()->user()->id,
          'referred_role_type' =>$employee_role,
    ]);

    $websites = json_encode($request->franchise_website);
$social_media_links = json_encode($request->social_media_link);
$social_media_type = json_encode($request->social_media_type);

   

    $franchise = new FranchiseModel;
    $franchise->franchise_id = $request->franchise_id;
    $franchise->name = $request->franchise_name;
    $franchise->user_id = $user->id;
    $franchise->state = $request->franchise_state;
    $franchise->country = $request->franchise_country;
    $franchise->phone_number = $request->franchise_number;
    $franchise->address = $request->franchise_address;
    $franchise->city = $request->franchise_city;
    $franchise->label = $request->franchise_label;
    $franchise->gender = $request->manager_gender;
    $franchise->websites = $websites;
   
    $franchise->social_media_links = $social_media_links;
    $franchise->social_media_type = $social_media_type;
   

    // Handle the logo file upload
    if ($request->hasFile('logo')) {
        foreach ($request->file('logo') as $logo) {
            $logo->move(public_path('logos'), $logo->getClientOriginalName());
            $franchise->logo = 'logos/'.$logo->getClientOriginalName();
        }
    }

    $franchise->save();

    $notifyUser = $user->id;
$notifyUser1 = $user->referred_by;
$userIds = [$notifyUser,$notifyUser1];
$message = "franchise id: " . $franchise->franchise_id . " is created";

foreach ($userIds as $userId) {
    $user = User::find($userId);
    if ($user) {
        Notification::send($user, new alertUser($user, $message));
    }
}


    $franchisesall = FranchiseModel::with('user')->get();

          // dd($franchises);

          return view('manage-franchise', ['franchises' => $franchisesall]);
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
    $franchise = FranchiseModel::where('user_id', $id)->with(['user' => function ($query) {
        $query->select('id', 'name', 'email', 'password');
    }])->first();

    // Decrypt password
    $password = $franchise->user->password;

    // Decode social media data from JSON
    $socialMediaTypes = json_decode($franchise->social_media_type, true);
    $socialMediaLinks = json_decode($franchise->social_media_links, true);
    $website = json_decode($franchise->websites, true);

    // Pass data to the view
    return view('edit-franchise', [
        'franchises' => $franchise,
        'socialMediaTypes' => $socialMediaTypes,
        'socialMediaLinks' => $socialMediaLinks,
        'website' => $website,
        'password' => $password,
    ]);
}






    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request)
{   
    $id = $request->input('edit_id');
    
    $franchise = FranchiseModel::where('user_id', $id)->first();

    $websites = json_encode($request->franchise_website);
$social_media_links = json_encode($request->social_media_link);
$social_media_type = json_encode($request->social_media_type);
    
    if ($franchise) {
        $franchise->name = $request->franchise_name;
        $franchise->state = $request->franchise_state;
        $franchise->country = $request->franchise_country;
        $franchise->phone_number = $request->franchise_number;
        $franchise->city = $request->franchise_city;

         $franchise->websites = $websites;
   
    $franchise->social_media_links = $social_media_links;
    $franchise->social_media_type = $social_media_type;

        // Save the updated franchise record to the database
        $franchise->save();
    }

    $userRole = Auth::user()->role;
    $user = User::where('id', $id)->first();

    if ($user) {
        $user->email = $request->input('email');

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->role = 'Branch_Owner';
        $user->referred_by = auth()->user()->id;
        $user->referred_role_type = $userRole;

        $user->save();
    }

     return redirect()->intended('/franchise');
}



    public function changeStatus(Request $request){

       // dd($request);
    $user_id = $request->id;
    $statusUser = FranchiseModel::where('id', $user_id)->first();
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
