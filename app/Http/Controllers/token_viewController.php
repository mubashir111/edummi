<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tokenModel;
use App\Models\messegecontroller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use App\Notifications\token_status;
use App\Models\NotificationModel;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class token_viewController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
{


        $userRole = auth()->user()->role;
        $user_id =  auth()->user()->id;

        if ($userRole === "superadmin") {
             $tickets = messegecontroller::orderByDesc('created_at')->with('user')->get();
        } elseif ($userRole === "Branch_Owner") {
            $tickets = messegecontroller::where('recipient_id',auth()->user()->id)->with('user')->orderByDesc('created_at')->get();

        } else{
           
           $tickets = messegecontroller::where('recipient_id',auth()->user()->id)->with('user')->orderByDesc('created_at')->get();
        }



        $notification= NotificationModel::where('type', 'App\Notifications\token_status')->where('notifiable_id',$user_id)->delete();

       


    return view('manage-tickets', ['tickets' => $tickets]);

}


    public function ticketView()
{   
    $user = auth()->user()->id; // Get the authenticated user
    $adminId =auth()->user()->referred_by; // Replace <ADMIN_ID> with the actual admin user ID

$allMessages = messegecontroller::where('sender_id', $user)->orderBy('created_at', 'asc')->get();

 $notification= NotificationModel::where('type', 'App\Notifications\token_status')->where('notifiable_id',$user)->delete();

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


    // $notifyUser = $user->id;
$notifyUser1 = $ticket->recipient_id;
$userIds = [$notifyUser1];
$message = "A new ticket has been raised by " . $ticket->sender_id;




foreach ($userIds as $userId) {
    $user = User::find($userId);
    if ($user) {
        Notification::send($user, new token_status($user, $message));
    }
}
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messages = messegecontroller::where('id', $id)->with('user')->first();

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
    $ticket = MessegeController::where('id', $id)->first();

    if ($request->message) {
        $existingMessage = $ticket->response_message ? json_decode($ticket->response_message, true) : []; // Decode existing JSON message to an array or initialize an empty array
        $newMessage = $request->message;
        
        // Append the new message to the existing message array
        $updatedMessage = array_merge($existingMessage, [$newMessage]);

        $ticket->response_message = json_encode($updatedMessage); // Encode the updated message array back to JSON
       
    }

   if ($request->hasFile('file')) {
    $attachment = $request->file('file');
    $timestamp = time(); // Get the current timestamp
    $filename = $timestamp . '_' . $attachment->getClientOriginalName(); // Generate a unique filename
    $attachment->move(public_path('tickets'), $filename);
    $existingAttachments = $ticket->response_attachment ? json_decode($ticket->response_attachment, true) : []; // Decode existing JSON attachments to an array or initialize an empty array
    $existingAttachments[] = 'tickets/' . $filename; // Append the new attachment to the existing attachments array

    $ticket->response_attachment = json_encode($existingAttachments); // Encode the updated attachments array back to JSON
}


    $ticket->save();

    // Rest of your code
}


public function tokenstatuschange($id,$status){
   
   $ticket = MessegeController::where('id', $id)->first();

   if($status == 1){
      
    $ticket->status = "verified";

   }elseif($status == 2){

    $ticket->status = "pending";


   }elseif($status == 3){
      
      $ticket->status = "rejected";

   }


   $ticket->save();


           // $notifyUser = $user->id;
$notifyUser1 = $ticket->sender_id;
$userIds = [$notifyUser1];
$message = "The raised ticket has been responded ";


foreach ($userIds as $userId) {
    $user = User::find($userId);
    if ($user) {
        Notification::send($user, new token_status($user, $message));
    }
}


    return redirect()->back()->with('success', 'status has changed');
 
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
