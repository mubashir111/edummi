<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationChat;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class ApplicationChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $application_chat = new ApplicationChat;

    if ($request->message) {
       $application_chat->sender_message = $request->message;
    }

 

   if ($request->hasFile('file')) {
    $attachment = $request->file('file');
    $timestamp = time(); // Get the current timestamp
    $filename = $timestamp . '_' . $attachment->getClientOriginalName(); // Generate a unique filename

    $attachment->move(public_path('application_chat'), $filename);
   $application_chat->attachment = 'application_chat/' . $filename;
}



   $application_chat->sender_id = auth()->user()->id;
   $application_chat->recipient_id = auth()->user()->referred_by;
   $application_chat->application_id =  $request->application_id; // Add the current timestamp
   $application_chat->created_at = Carbon::now(); 

   $application_chat->save();

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
