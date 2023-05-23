<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FirstMail;
use App\Mail\PasswordReset;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class mailController extends Controller
{
     public function sendEmail()
    {
        $email = new FirstMail();
        Mail::to('recipient@example.com')->send($email);
        
        return "Email sent successfully!";
    }

    //  public function sendResetLinkEmail(Request $request)
    // {
          
          
    //     $request->validate([
    //         'email' => 'required|email',
    //     ]);

    //     $status = Password::sendResetLink($request->only('email'));
        

    //     // Redirect the user to a success page or display a success message
    //     return redirect()->route('resetpassword')->with('status', trans($status));
    // }


    public function sendResetLinkEmail(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

   $user = User::where('email', $request->email)->first();
    if ($user){
            
            $token = Str::random(120);
             $user->password_reset =  $token ;
             $user->save();

              $email = new PasswordReset($user,$token);
        Mail::to($request->email)->send($email);

         return redirect()->route('resetpassword')->with('status','Please check your inbox for password reset');
      }else{

        return redirect()->route('resetpassword')->with('status','Email address invalid');

      }

    
    

    // Redirect the user to a success page or display a success message
   
}

 public function resetpassword(Request $request, $id){


    $user = User::where('password_reset',$id)->first();

     if ($user){

       return view('new-password', compact('user'));


     }else{


     }

 }

 public function verifypassword(Request $request)
{


    $password = $request->input('password');
    $rePassword = $request->input('re-password');

    if ($password !== $rePassword) {
       
       
        return back()->with('status', 'Passwords do not match');


    }

    $id = decrypt($request->input('user_id'));
    $user = User::where('id',$id)->first();

   if ($user) {
    $user->password = Hash::make($password);
    $user->password_reset = null;
    $user->save();

    return view('auth.login')->with('status', 'Password changed successfully')->with('type', 'success');
    // Password successfully changed and status updated
}
else {
        return back()->with('status', 'Email address invalid');
    }
}



}
