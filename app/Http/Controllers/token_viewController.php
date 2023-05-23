<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tokenModel;
use App\Models\messegecontroller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class token_viewController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
{
    $tickets = messegecontroller::all();

    return view('manage-tickets', ['tickets' => $tickets]);
}


    public function ticketView()
{   
    $user = auth()->user()->id; // Get the authenticated user
    $adminId =auth()->user()->referred_by; // Replace <ADMIN_ID> with the actual admin user ID

$allMessages = messegecontroller::where('sender_id', $user)->orderBy('created_at', 'asc')->get();

return view('ticket-chat', ['messages' => $allMessages]);

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
    $ticket = new messegecontroller;

    if ($request->message) {
        $ticket->content = $request->message;
    }

 

   if ($request->hasFile('file')) {
    $attachment = $request->file('file');
    $timestamp = time(); // Get the current timestamp
    $filename = $timestamp . '_' . $attachment->getClientOriginalName(); // Generate a unique filename

    $attachment->move(public_path('tickets'), $filename);
    $ticket->attachment = 'tickets/' . $filename;
}



    $ticket->sender_id = auth()->user()->id;
    $ticket->recipient_id = auth()->user()->referred_by;
    $ticket->created_at = Carbon::now(); // Add the current timestamp

    $ticket->save();
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messages = messegecontroller::where('id', $id)->first();

        return view('ticket-chat-response', ['messages' => $messages]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
{
    $message = MessegeController::where('id', $id)->first();

    if ($message) {
        $message->response_message= null;
         $message->response_attachment= null;
          $message->save();

        // Row successfully deleted
       return new JsonResponse(['status' => 'success', 'message' => 'Row deleted successfully']);
    } else {
        // Row not found
         return new JsonResponse(['status' => 'error', 'message' => 'Row not found']);
    }
}


public function editcontent(Request $request){
    $id =  $request->id;
    $message = MessegeController::where('id', $id)->first();

   if ($message->response_message == null && $message->response_attachment == null) {
    $message->delete();

    // Row successfully deleted
    return new JsonResponse(['status' => 'success', 'message' => 'Row deleted successfully']);
} else {
    // Row not found
    return new JsonResponse(['status' => 'error', 'message' => 'Row can\'t be deleted']);
}

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
       
        $ticket = messegecontroller::where('id', $id)->first();
        if($request->message){
            $ticket->response_message = $request->message ;
        }
        
         if ($request->hasFile('file')) {
    $attachment = $request->file('file');
    $timestamp = time(); // Get the current timestamp
    $filename = $timestamp . '_' . $attachment->getClientOriginalName(); // Generate a unique filename

    $attachment->move(public_path('tickets'), $filename);
    $ticket->response_attachment = 'tickets/' . $filename;
}

     $ticket->save();

  
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
