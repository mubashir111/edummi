<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\course_finderModel;
use App\Notifications\alertUser;
use App\Models\NotificationModel;
use App\Models\InstitutionCreateModel;
use Illuminate\Support\Facades\Notification;
use App\Models\User;


class CourseFinder extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */ 
    public function index()
    {
       
           $course_finder = course_finderModel::where('status',1)->get();

            return view('course-finder',['course_finder' => $course_finder]);
    }

     public function institute_list_details()
    {
           $institute_lists = InstitutionCreateModel::all();

            return view('institute-list',['institute_list' => $institute_lists]);
    }

    public function coursefinder_view($url)
    {

          $course_finder = course_finderModel::where('id',$url)->first();
          $urllink =  $course_finder->link;
        if(isset($urllink)){
            return view('course-finder-view',['url' =>$urllink]);
        }
        
    }

     public function courserfinderdelete(Request $request)
    {

        $course_finder = course_finderModel::where('id',$request->dlt_id)->first();
        $course_finder->delete();
       
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
         $course_finder = new course_finderModel;
        $course_finder->label = $request->label;
        $course_finder->link = $request->link;
        $course_finder->created_by = auth()->user()->user_id;
        $course_finder->roll_type = Auth::user()->role;
         $course_finder->save();

           // $notifyUser = $departments->id;
        // $notifyUser1 = $departments->referred_by;
$userIds = [1];
$message = "New coursefinder ".$course_finder->label." is created";

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
        //
    }
}
