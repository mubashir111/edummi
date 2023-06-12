<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\studentsModel;
use App\Models\studentaddressModel;
use App\Models\passportModel;
use App\Models\STapplicationModel;
use App\Models\documentsModel;
use App\Models\deparmentModel;
use App\Models\ImportantContactsModel;
use App\Models\academic_qualificationsModal;
use App\Models\work_experienceModal;
use App\Models\test_attendanceModel;
use Carbon\Carbon;
use App\Notifications\alertUser;
use App\Notifications\students_create;
use App\Models\NotificationModel;
use Illuminate\Support\Facades\Notification;
use App\Models\ApplicationStatus;
use App\Models\applicationModel;
use App\Models\intakeModal;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
    
     $user_id =  auth()->user()->id;

    $studentcreatenotification= NotificationModel::where('type','App\Notifications\add_new_student')->get();        

       
        $userRole = auth()->user()->role;
        if ($userRole === "superadmin") {
            $students = studentsModel::with('assignedto')->get();
        } elseif ($userRole === "Branch_Owner") {


$students = studentsModel::where('referred_by', auth()->user()->id)->orWhere('manager_id', auth()->user()->id)
->with('assignedto')
->get();




        } else{
            $students = studentsModel::where('referred_by',auth()->user()->id)->with('assignedto')->get();
           
        }

        



        


        $user = auth()->user()->user_id;

 $departments = deparmentModel::where('created_by',$user)->get();

 //$employee = User::where('role',$departments->department_name)->get();

  $users_role =  Auth::user()->role;

  NotificationModel::where('notifiable_id', $user_id)
    ->where('type','App\Notifications\students_create')
    ->delete();


        return view('manage-students', [
    'students' => $students->sortByDesc('created_at'),
    'departments' => $departments,
    'users_role' => $users_role,
    'studentcreatenotification' => $studentcreatenotification
]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function studentstatusMarkread(Request $request)
{

    NotificationModel::where('notifiable_id', $request->id)
        ->where('type','App\Notifications\add_new_student')
        ->delete();

    return response()->json(['status' => 'success', 'message' => 'Marked as read.']);
}


   public function departmentstudents()
    {
        $user = auth()->user()->user_id;

        $students = studentsModel::where('assigned_to',$user)->get();



 $departments = deparmentModel::where('created_by',auth()->user()->user_id)->get();


        return view('department-students',['students'=> $students ,'departments' => $departments]);

    }


    public function departmentstudents_visa()
    {

        $user = auth()->user()->user_id;

        $students = studentsModel::where('document_status',"verified")->with('application')->get();



       $departments = deparmentModel::where('created_by',auth()->user()->user_id)->get();

         $application_status = ApplicationStatus::all();


        return view('department-students-verified',['students'=> $students ,'departments' => $departments,'application_status' => $application_status]);


    }


    public function create()
    {
        
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
         $student_id = "ST" . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

          $student_check = studentsModel::where('student_id', $student_id)->first();

    if($student_check){
        // If the franchise_id already exists, generate a new one and check again
        return $this->store();
    }


         $userRole = auth::user()->role;
         $userId = auth::user()->id;

        
        if ($userRole === "superadmin") {
            $manager_id_sa = auth::user()->id;
        } elseif ($userRole === "Branch_Owner") {
             $manager_id_sa = auth::user()->referred_by;
            

        } else{
            $manager_id_sa = auth::user()->referred_by;

           
           
        }
  
         $student = new studentsModel;
           $student->first_name = $request->first_name;
            $student->middle_name = $request->middle_name;
            $student->last_name = $request->last_name;

            // Concatenate the first name, middle name, and last name with spaces
            $nameParts = [];
            if (!empty($request->first_name)) {
                $nameParts[] = $request->first_name;
            }
            if (!empty($request->middle_name)) {
                $nameParts[] = $request->middle_name;
            }
            if (!empty($request->last_name)) {
                $nameParts[] = $request->last_name;
            }

            $student->name = implode(' ', $nameParts);

            $student->phone = $request->number;
            $student->email = $request->email;
            $student->student_id = $student_id;
             $student->referred_by  = $userId;
             $student->manager_id  = $manager_id_sa;
              $student->referral_role_type =$userRole;
               $student->created_at=Carbon::now(); 
               
           

            // Handle the logo file upload
         if ($request->hasFile('students_image')) {
        foreach ($request->file('students_image') as $students_image) {
            $students_image->move(public_path('students'), $students_image->getClientOriginalName());
            $student->image_url = 'students/'.$students_image->getClientOriginalName();
        }
    }
            
            $student->save();

            // $notifyUser = $user->id;
$notifyUser1 = $student->referred_by;
$notifyUser2 =1;
 $notifyUser3 = $student->id;
$userIds = [$notifyUser1];

$userIdss = [$notifyUser1,$notifyUser2];
$message = "student id: " . $student->student_id . " is created";

foreach ($userIds as $userId) {
    $user = User::find($userId);
    if ($user) {
        Notification::send($user, new alertUser($user, $message));
    }
}


foreach ($userIdss as $userId2) {
    $user = User::find($userId2);
    if ($user) {
        Notification::send($user, new students_create($user, $message));
    }
}


$student_notification = new NotificationModel;

$id = rand(0, 99999);
while (NotificationModel::where('id', $id)->exists()) {
    $id = rand(0, 99999);
}

$student_notification->id = $id;
$student_notification->type = "App\Notifications\add_new_student";
$student_notification->notifiable_id = $notifyUser3;
$student_notification->save();


           


           
         return redirect()->back()->with('success', 'Student created successfully');


           
        
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

     public function assignto(Request $request)
    {
        
        $department = deparmentModel::where('id',$request->department)->first();

        $student = studentsModel::where('id', $request->student_id)->first();
       

         $student->assigned_to = $request->employee;
         $student->department = $request->department;


         $student->current_status = "Hand over to ".$department->department_name;
         $student->save();
         
         return redirect()->back()->with('success', 'Student assigned to department employee successfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response  documentEdit
     */
    public function edit($id)
    {
         $students = studentsModel::where('id', $id)
    ->with('passport')
    ->with('application')
    ->with('document')
    ->with('important_contacts')
    ->with('academic_qualifications')
    ->with('work_experience')
    ->with('test_attendance')
    ->first();

    $mailing_address= studentaddressModel::where('student_id', $id)->where('address_type',"mailing")->first();

     $permanent_address= studentaddressModel::where('student_id', $id)->where('address_type',"permanent")->first();

    //dd($students);


         return view('personal-information',['students'=> $students , 'mailing_address'=>$mailing_address , 'permanent_address'=>$permanent_address]);
    }


      public function documentEdit($id)
    {

        $students = studentsModel::where('id', $id)
    ->with('document')
    ->first();


         return view('document',['students'=> $students ]);


    }

     public function applicationEdit($id)
    {

        $students = studentsModel::where('id', $id)
    ->with('application')->with('application.statusview')
    ->first();



        $intakes = intakeModal::all();


         return view('applications',['students'=> $students,'intakes'=>$intakes]);


    } 

    public function academicQualificationEdit($id)
    {
     $students = studentsModel::where('id', $id)
    ->with('academic_qualifications')
    ->first();

     return view('academic-qualification',['students'=> $students]);

    } 




     public function workExperience($id)
    {

        
        $students = studentsModel::where('id', $id)
    ->with('work_experience')
    ->first();

     return view('work-experience',['students'=> $students]);


    }

     public function testsEdits($id)
    {

        $students = studentsModel::where('id', $id)
    ->with('test_attendance')
    ->first();

     return view('test',['students'=> $students]);


    }

    public function verifiedtestsEdits($id)
    {

        $students = studentsModel::where('id', $id)
    ->with('test_attendance')
    ->first();

     return view('verified-student-test',['students'=> $students]);


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
                     

     public function assignedstudents($id)
    {
         $students = studentsModel::where('id', $id)
    ->with('passport')
    ->with('application')
    ->with('document')
    ->with('academic_qualifications')
    ->get();

   

    //dd($students->student_id);

     return view('student-docs',compact('students') );

}


 public function application_student_view($id)
    {
         $students = studentsModel::where('id', $id)
    ->with('passport')
    ->with('application')
    ->with('document')
    ->with('academic_qualifications')
    ->first();

    $mailing_address= studentaddressModel::where('student_id', $id)->where('address_type',"mailing")->first();

     $permanent_address= studentaddressModel::where('student_id', $id)->where('address_type',"permanent")->first();

    //dd($students->student_id);

     return view('student-personal-detail',compact('students', 'mailing_address', 'permanent_address'));



}

 public function application_student_document_view($id)
    {
           
            $students = studentsModel::where('id', $id)
    ->with('passport')
    ->with('application')
    ->with('document')
    ->with('academic_qualifications')
    ->first();

    $mailing_address= studentaddressModel::where('student_id', $id)->where('address_type',"mailing")->first();

     $permanent_address= studentaddressModel::where('student_id', $id)->where('address_type',"permanent")->first();

    //dd($students->student_id);

     return view('student-document-view',compact('students', 'mailing_address', 'permanent_address'));


    }

     public function application_student_application_view($id)
    {

         $students = studentsModel::where('id', $id)
    ->with('passport')
    ->with('application')
     ->with('application.chat')
    ->with('document')
    ->with('academic_qualifications')
    ->first();

    $mailing_address= studentaddressModel::where('student_id', $id)->where('address_type',"mailing")->first();

     $permanent_address= studentaddressModel::where('student_id', $id)->where('address_type',"permanent")->first();


    //dd($students->student_id);

     return view('student-applications-verify',compact('students', 'mailing_address', 'permanent_address'));

    }


    

 public function filter_students_application()
    {
        
        $user = auth()->user()->user_id;

       $students = studentsModel::where('assigned_to', $user)
        ->with('application')
        ->with('application.statusview as application_status')
        ->get();
        //dd($students);

         return view('student-applications',compact('students') );

    }
   
   public function students_application_user(Request $request, $id)
    {    

        $user_id = auth()->user()->id;
         $students = studentsModel::where('id',$id)->with('application')->first();
         $application_status = ApplicationStatus::all();


         $employee = User::where('id',$user_id)->with('department.department')->first();
          
          foreach ($employee->department as $departmentdd){
            foreach ($departmentdd->department as $departmentss){

                

                if($departmentdd->department->department_role =="visa_handling"){

            $user_role= 1;
         }else{
            $user_role= 2;
         }


            }

             
          }
          

        return view('student-applications-details', compact('students', 'application_status', 'user_role'));


      }


       public function students_status(Request $request)
{
    $students = studentsModel::find($request->student_id);
    if (!$students) {
        // Handle the case where the student doesn't exist
    }

    $students->document_status = $request->status;

    $department = deparmentModel::find($students->department);
    $employee = User::where('user_id', $students->assigned_to)->first();
    

   if ($students->document_status === 'verified') {
        $students->current_status = "Student document has been verified by {$employee->name} ({$department->department_name})";
    } elseif ($students->document_status === 'pending') {
        $students->current_status = "Student document is being verified by {$employee->name} ({$department->department_name})";
    } elseif ($students->document_status === 'rejected') {
        $students->current_status = "Student document has been rejected by {$employee->name} ({$department->department_name})";
    }

    $students->save();
   
    






}




       public function students_profile(Request $request)
    {

        $students = studentsModel::where('student_id',$request->id)->first();

    if ($students) {
        return response()->json(['status' => 'success', 'response' => $students]);
    } else {
        return response()->json(['status' => 'error', 'message' => 'Failed to load id']);
    }

     }


   public function update(Request $request, $manage_student)
    {
        //dd($request, $manage_student);

            $student = studentsModel::where('student_id', $manage_student)->first();
$user_id = $student->id;


// check if the 'name' attribute is not null
if ($request->filled('name')) {
    $student->name = $request->name;
}

// check if the 'email' attribute is not null
if ($request->filled('email')) {
    $student->email = $request->email;
}

// check if the 'phone' attribute is not null
if ($request->filled('phone')) {
    $student->phone = $request->phone;
}

// check if the 'date_of_birth' attribute is not null
if ($request->filled('date_of_birth')) {
    $student->date_of_birth = $request->date_of_birth;
}

// check if the 'gender' attribute is not null
if ($request->filled('gender')) {
    $student->gender = $request->gender;
}

// check if the 'marital_status' attribute is not null
if ($request->filled('marital_status')) {
    $student->marital_status = $request->marital_status;
}

// check if the 'nationality' attribute is not null
if ($request->filled('Nationality')) {
    $student->nationality = $request->Nationality;

}   

// check if the 'citizenship' attribute is not null
if ($request->filled('citizenship')) {
    $student->citizenship = $request->citizenship;
}


// check if the 'another_nationality' attribute is not null
if ($request->filled('another_nationality')) {
    $student->another_nationality = $request->another_nationality;
}else{

    $student->another_nationality = null;
}

// check if the 'study_another_contry' attribute is not null
if ($request->filled('study_another_contry')) {
    $student->study_another_contry = $request->study_another_contry;
}else{

    $student->study_another_contry = null;
}

// check if the 'applied_for_immigration' attribute is not null
if ($request->filled('applied_imigaration_country')) {
    $student->applied_imigaration_country = $request->applied_imigaration_country;
}else{

    $student->applied_imigaration_country = null;
}

// check if the 'medical_conditions' attribute is not null
if ($request->filled('medical_issue_detail')) {
    $student->medical_conditions = $request->medical_issue_detail;
}else{

    $student->medical_conditions = null;
}

// check if the 'visa_refusal_country' attribute is not null
if ($request->filled('visa_refusal_country')) {
    $student->visa_refusal = $request->visa_refusal_country;
}else{

    $student->visa_refusal = null;
}

// check if the 'visa_refusal_visa_type' attribute is not null
if ($request->filled('visa_refusal_visa_type')) {
    $student->visa_refusal_type = $request->visa_refusal_visa_type;
}else{

    $student->visa_refusal_type = null;
}

// check if the 'criminal_offence_detail' attribute is not null
if ($request->filled('criminal_offence_detail')) {
    $student->convicted_of_crime = $request->criminal_offence_detail;
}else{

    $student->convicted_of_crime = null;
}

// check if the 'visa_type' attribute is not null
if ($request->filled('visa_type')) {
    $student->visa_type = $request->visa_type;
}

$student->referred_by = Auth::user()->id;
$student->referral_role_type = Auth::user()->role;

// check if the 'manager_id' attribute is not null
if ($request->filled('referred_by')) {
    $student->manager_id = $request->referred_by;
}

 if ($request->hasFile('students_image')) {
        foreach ($request->file('students_image') as $students_image) {
            $students_image->move(public_path('students'), $students_image->getClientOriginalName());
            $student->image_url = 'students/'.$students_image->getClientOriginalName();
        }
    }
    
$student->save();



          


         $address = studentaddressModel::where('student_id', $user_id)->where('address_type',"mailing")->first();

         if(!$address){
          $address= new studentaddressModel;
    }



                          if ($request->filled('mailing_address_1')) {
                $address->address_line_1 = $request->mailing_address_1;
            }

            if ($request->filled('mailing_address_2')) {
                $address->address_line_2 = $request->mailing_address_2;
            }

            if ($request->filled('mailing_city')) {
                $address->city = $request->mailing_city;
            }

            if ($request->filled('mailing_state')) {
                $address->state = $request->mailing_state;
            }

            if ($request->filled('mailing_pincode')) {
                $address->zip_code = $request->mailing_pincode;
            }

            if ($request->filled('mailing_country')) {
                $address->country = $request->mailing_country;
            }
            $address->email_type = "mailing_address";
            $address->address_type = "mailing";
            $address->student_id = $user_id;
             $address->updated_at =  Carbon::now();





            $address->save();


            $address2 = studentaddressModel::where('student_id', $user_id)->where('address_type',"permanent")->first();

         if(!$address2){
            $address2= new studentaddressModel;
    }

          
                        if ($request->filled('permenent_address1')) {
                $address2->address_line_1 = $request->permenent_address1;
            }

            if ($request->filled('permenent_address2')) {
                $address2->address_line_2 = $request->permenent_address2;
            }

            if ($request->filled('permenent_city')) {
                $address2->city = $request->permenent_city;
            }

            if ($request->filled('permenent_state')) {
                $address2->state = $request->permenent_state;
            }

            if ($request->filled('permenent_pincode')) {
                $address2->zip_code = $request->permenent_pincode;
            }

            if ($request->filled('permenent_country')) {
                $address2->country = $request->permenent_country;
            }
            $address2->address_type ="permanent";
            $address2->email_type = "permanent";
            $address2->student_id = $user_id;
             $address2->updated_at =  Carbon::now();

            $address2->save();

           

           // important contacts

           $important_contact = ImportantContactsModel::where('user_id',$user_id)->first();

         if(!$important_contact){
            
            $important_contact= new ImportantContactsModel;
             $important_contact->created_at =  Carbon::now();
    }
            
            if ($request->filled('important_contact_name')) {
                $important_contact->name = $request->important_contact_name;
            }

             if ($request->filled('important_contact_number')) {
                $important_contact->phone = $request->important_contact_number;
            }

             if ($request->filled('important_contact_email')) {
                $important_contact->email = $request->important_contact_email;
            }

            if ($request->filled('important_contact_relation')) {
                $important_contact->relation_with_applicant = $request->important_contact_relation;
            }
            

            if ($request->filled('important_contact_name')) {
             $important_contact->updated_at =  Carbon::now();

               $important_contact->user_id =$user_id;


             $important_contact->save();
         }


     

     


     


            
            $passport = passportModel::where('user_id',$user_id)->first();

         if(!$passport){
            
            $passport= new passportModel;
    }


            
                        if ($request->filled('passport_number')) {
                $passport->passport_number = $request->passport_number;
            }

            if ($request->filled('passport_issue_date')) {
                $passport->issue_date = $request->passport_issue_date;
            }

            if ($request->filled('passport_expiry_date')) {
                $passport->expiry_date = $request->passport_expiry_date;
            }

           

            if ($request->filled('passport_issue_country')) {
                $passport->passport_issue_country = $request->passport_issue_country;
            }
            

             if ($request->filled('country_of_birth')) {
                $passport->country_of_birth = $request->country_of_birth;
            }

             if ($request->filled('city_of_birth')) {
                $passport->city_of_birth = $request->city_of_birth;
            }

             if ($request->filled('passport_number')) {

            $passport->user_id =$user_id;

             $passport->save();
         }

             
          

           



    $document1 = documentsModel::where('user_id', $user_id)->first();

if (!$document1) {
    $document1 = new documentsModel;
    $document1->user_id = $user_id;
}

$document1->updated_at = Carbon::now();

$documents = [
    '9th_marksheet',
    '10th_marksheet',
    '11th_marksheet',
    '12th_marksheet',
    'bachlors_marksheet',
    'consolidate_marksheet',
    'acadamic_transcript',
    'final_degree',
    'application_form',
    'passport_file',
    'statment_purpose',
    'cv',
    'latter_of_recomentation',
    'english_certificate',
    'bank_balance',
    'financial_affidavit',
    'gap_explanation_letter',
    'Online_Submission_Configaration',
    'sat_file',
    'gre',
    'gmat',
    'toefl',
    'ielts_file',
    'pte',
    'exempyion_certificate',
    'additional_documents'
];

foreach ($documents as $document) {
    if ($request->hasFile($document)) {
        foreach ($request->file($document) as $file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $file->move(public_path('students/documents'), $filename);
            $document1->{$document . '_url'} = 'students/documents/' . $filename;
        }
    }
}

$document1->save();




            //  if ($request->hasFile('9th_marksheet')) {

            //     $documnet1= new documentsModel;
            //     $documnet1->user_id  = $user_id;
            //     $documnet1->document_name  = "Std. 9th Marksheet";
            //     $documnet1->updated_at  = Carbon::now();

                
            //     foreach ($request->file('9th_marksheet') as $students_marksheet9) {
            //         $students_marksheet9->move(public_path('students/documents'), $students_marksheet9->getClientOriginalName());
            //         $documnet1->document_url = 'students/documents'.$students_marksheet9->getClientOriginalName();
            //     }

            //     $documnet1->save();
            // }





            return back();







    }


    public function newapplication(Request $request)
{
    $user_id = $request->student_id;

    do {
        // Generate a random application ID
        $application_id = mt_rand(100000, 999999);

        // Check if the application ID already exists
        $existing_application = STapplicationModel::where('application_id', $application_id)->first();
    } while ($existing_application);

    $application = new STapplicationModel;

    // Set the generated application ID
    $application->application_id = $application_id;

    // Set other fields based on the request
    if ($request->filled('year')) {
        $application->year = $request->year;
    }

    if ($request->filled('intake')) {
        $application->intake = $request->intake;
    }

    if ($request->filled('universityName')) {
        $application->university_name = $request->universityName;
    }

    if ($request->filled('courseName')) {
        $application->course = $request->courseName;
    }

    $userRole = Auth::user()->role;

         if ($userRole == "superadmin") {
            
            $manager_id_create= Auth::user()->id;
            $referred_by_create = Auth::user()->id;
         }elseif($userRole == "Branch_Owner"){

            $manager_id_create= Auth::user()->referred_by;
            $referred_by_create = Auth::user()->id;
         }else{
             
              $manager_id_create= Auth::user()->referred_by;
            $referred_by_create = Auth::user()->id;
         }

    $application->manager_id = $manager_id_create;
    $application->referred_by = $referred_by_create;
    $application->user_id = $user_id;
    $application->created_at = Carbon::now();
    $application->save();
}

 public function country_education(Request $request)
{

     $academic_qualification = new academic_qualificationsModal;

      $academic_qualification->institution = $request->country_education;

      $academic_qualification->qualification = $request->education_level;
      $academic_qualification->student_id = $request->student_id;
       $academic_qualification->created_at = Carbon::now();
    $academic_qualification->save();

     


 }

  public function academicQualificationshow(Request $request)
    {

     $academic_qualification = academic_qualificationsModal::where('id', $request->academic_qalification_id)->first();
     

     
    if ($academic_qualification) {
        return response()->json(['status' => 'success', 'response' => $academic_qualification]);
    } else {
        return response()->json(['status' => 'error', 'message' => 'Failed to load id']);
    }



    } 

    public function academicQualificationupdate(Request $request)
    {

     $academic_qualification = academic_qualificationsModal::where('id', $request->edit_id)->first();
     
     if ($academic_qualification) {
      $academic_qualification->institution = $request->country_education;

      $academic_qualification->qualification = $request->education_level;

       $academic_qualification->save();
   }


       return back();
    



    } 



 public function work_experiences(Request $request)
{


            
            $work_experience= new work_experienceModal;

       
       if ($request->filled('experience_company_name')) {
               $work_experience->company_name =  $request->experience_company_name;
            }
       
        if ($request->filled('experience_company_location')) {
              $work_experience->location =  $request->experience_company_location;
            }
        
         if ($request->filled('experience_company_designation')) {
              $work_experience->job_title =  $request->experience_company_designation;
            }

             if ($request->filled('experience_company_start_date')) {
             $work_experience->start_date =  $request->experience_company_start_date;
            }
       
       if ($request->filled('experience_company_end_date')) {
             $work_experience->end_date =  $request->experience_company_end_date;
            }

            $work_experience->created_at  = Carbon::now();
            $work_experience->student_id  = $request->student_id;
            $work_experience->save();

}


 public function workexperienceshow(Request $request)
{

    $work_experience = work_experienceModal::where('id', $request->work_experience_id)->first();


    if ($work_experience) {
        return response()->json(['status' => 'success', 'response' => $work_experience]);
    } else {
        return response()->json(['status' => 'error', 'message' => 'Failed to load id']);
    }

}

 public function workexperienceupdate(Request $request)
{
     $work_experience = work_experienceModal::where('id', $request->edit_id)->first();

       if ($work_experience) {

              $work_experience->company_name =  $request->experience_company_name;
               $work_experience->location =  $request->experience_company_location;
                $work_experience->job_title =  $request->experience_company_designation;
                 $work_experience->start_date =  $request->experience_company_start_date;
                  $work_experience->end_date =  $request->experience_company_end_date;
                  $work_experience->updated_at  = Carbon::now();
                    $work_experience->save();

       }

       return back();
}



public function gre_test(Request $request)
{
    $user_id = $request->student_id;

    $test_attendance = test_attendanceModel::where('student_id', $user_id)->first();

    if (!$test_attendance) {
        $test_attendance = new test_attendanceModel();
        $test_attendance->created_at = Carbon::now();
        $test_attendance->score = '{}'; // Set an empty JSON object as default
    }

    $existing_scores = json_decode($test_attendance->score, true) ?? [];
    $new_scores = [
        'gre_overall_score' => $request->gre_overall_score,
        'gre_exam_quantitative' => $request->gre_exam_quantitative,
        'gre_exam_verbal' => $request->gre_exam_verbal,
        'gre_analytical_writing' => $request->gre_analytical_writing,
        'gre_exam_date' => $request->gre_exam_date,
    ];

    // Merge the existing and new scores, updating the values if they exist in the new scores
    $scores = array_merge($existing_scores, $new_scores);

    $test_attendance->test_name = "GRE";
    $test_attendance->score = json_encode($scores);
    $test_attendance->updated_at = Carbon::now();
    $test_attendance->student_id = $user_id;
    $test_attendance->save();
}


public function gmat_test(Request $request)
{
    $user_id = $request->student_id;

    $test_attendance = test_attendanceModel::where('student_id', $user_id)->first();

    if (!$test_attendance) {
        $test_attendance = new test_attendanceModel();
        $test_attendance->created_at = Carbon::now();
        $test_attendance->score = '{}'; // Set an empty JSON object as default
    }

    $existing_scores = json_decode($test_attendance->score, true) ?? [];
    $new_scores = [
        'gmat_overall_score' => $request->gmat_overall_score,
        'gmat_date_examination' => $request->gmat_date_examination,
        'gmat_quantitative' => $request->gmat_quantitative,
        'gmat_verbal' => $request->gmat_verbal,
        'gmat_analytical_writing' => $request->gmat_analytical_writing,
        'gmat_analytical_integrated' => $request->gmat_analytical_integrated,
    ];

    // Merge the existing and new scores, updating the values if they exist in the new scores
    $scores = array_merge($existing_scores, $new_scores);

    $test_attendance->score = json_encode($scores);
    $test_attendance->updated_at = Carbon::now();
    $test_attendance->student_id = $user_id;
    $test_attendance->save();
}


public function toefl_test(Request $request)
{
    $user_id = $request->student_id;

    $test_attendance = test_attendanceModel::where('student_id', $user_id)->first();

    if (!$test_attendance) {
        $test_attendance = new test_attendanceModel();
        $test_attendance->created_at = Carbon::now();
        $test_attendance->score = '{}'; // Set an empty JSON object as default
    }

    $existing_scores = json_decode($test_attendance->score, true) ?? [];
    $new_scores = [
        'toefl_overall_score' => $request->toefl_overall_score,
        'toefl_date_of_examination' => $request->toefl_date_of_examination,
        'toefl_reading' => $request->toefl_reading,
        'toefl_lisenting' => $request->toefl_lisenting,
        'toefl_speaking' => $request->toefl_speaking,
        'toefl_writing' => $request->toefl_writing,
    ];

    // Merge the existing and new scores, updating the values if they exist in the new scores
    $scores = array_merge($existing_scores, $new_scores);

    $test_attendance->score = json_encode($scores);
    $test_attendance->updated_at = Carbon::now();
    $test_attendance->student_id = $user_id;
    $test_attendance->save();
}


public function ielts_test(Request $request)
{
    $user_id = $request->student_id;

    $test_attendance = test_attendanceModel::where('student_id', $user_id)->first();

    if (!$test_attendance) {
        $test_attendance = new test_attendanceModel();
        $test_attendance->created_at = Carbon::now();
        $test_attendance->score = '{}'; // Set an empty JSON object as default
    }

    $existing_scores = json_decode($test_attendance->score, true) ?? [];
    $new_scores = [
        'ielts_nationality' => $request->ielts_nationality,
        'ielts_trf_no' => $request->ielts_trf_no,
        'ielts_date_of_exam' => $request->ielts_date_of_exam,
        'ielts_reading' => $request->ielts_reading,
        'ielts_listening' => $request->ielts_listening,
        'ielts_speaking' => $request->ielts_speaking,
        'ielts_writing' => $request->ielts_writing,
        'ielts_center' => $request->ielts_center,
        'ielts_overall_score' => $request->ielts_overall_score,
    ];

    // Merge the existing and new scores, updating the values if they exist in the new scores
    $scores = array_merge($existing_scores, $new_scores);

    $test_attendance->score = json_encode($scores);
    $test_attendance->updated_at = Carbon::now();
    $test_attendance->save();
}


public function pte_test(Request $request)
{
    $user_id = $request->student_id;

    $test_attendance = test_attendanceModel::where('student_id', $user_id)->first();

    if (!$test_attendance) {
        $test_attendance = new test_attendanceModel();
        $test_attendance->created_at = Carbon::now();
        $test_attendance->score = '{}'; // Set an empty JSON object as default
    }

    $existing_scores = json_decode($test_attendance->score, true) ?? [];
    $new_scores = [
        'pte_overall_score' => $request->pte_overall_score,
        'pte_date_of_exam' => $request->pte_date_of_exam,
        'pte_reading' => $request->pte_reading,
        'pte_listening' => $request->pte_listening,
        'pte_speaking' => $request->pte_speaking,
        'pte_writing' => $request->pte_writing,
    ];

    // Merge the existing and new scores, updating the values if they exist in the new scores
    $scores = array_merge($existing_scores, $new_scores);

    $test_attendance->score = json_encode($scores);
    $test_attendance->updated_at = Carbon::now();
    $test_attendance->save();
}


public function det_test(Request $request)
{
    $user_id = $request->student_id;

    $test_attendance = test_attendanceModel::where('student_id', $user_id)->first();

    if (!$test_attendance) {
        $test_attendance = new test_attendanceModel();
        $test_attendance->created_at = Carbon::now();
        $test_attendance->score = '{}'; // Set an empty JSON object as default
    }

    $existing_scores = json_decode($test_attendance->score, true) ?? [];
    $new_scores = [
        'det_overall_score' => $request->det_overall_score,
        'det_date_of_exam' => $request->det_date_of_exam,
    ];

    // Merge the existing and new scores, updating the values if they exist in the new scores
    $scores = array_merge($existing_scores, $new_scores);

    $test_attendance->score = json_encode($scores);
    $test_attendance->updated_at = Carbon::now();
    $test_attendance->save();
}



public function sat_test(Request $request)
{
    $user_id = $request->student_id;

    $test_attendance = test_attendanceModel::where('student_id', $user_id)->first();

    if (!$test_attendance) {
        $test_attendance = new test_attendanceModel();
        $test_attendance->created_at = Carbon::now();
        $test_attendance->score = '{}'; // Set an empty JSON object as default
    }

    $existing_scores = json_decode($test_attendance->score, true) ?? [];
    $new_scores = [
        'sat_overall_score' => $request->sat_overall_score,
        'sat_exam_date' => $request->sat_exam_date,
        'sat_reading_writing' => $request->sat_reading_writing,
        'sat_math' => $request->sat_math,
        'sat_essay' => $request->sat_essay,
        'sat_remarks' => $request->sat_remarks,
    ];

    // Merge the existing and new scores, updating the values if they exist in the new scores
    $scores = array_merge($existing_scores, $new_scores);

    $test_attendance->score = json_encode($scores);
    $test_attendance->updated_at = Carbon::now();
    $test_attendance->save();
}


public function act_test(Request $request)
{
    $user_id = $request->student_id;

    $test_attendance = test_attendanceModel::where('student_id', $user_id)->first();

    if (!$test_attendance) {
        $test_attendance = new test_attendanceModel();
        $test_attendance->created_at = Carbon::now();
        $test_attendance->score = '{}'; // Set an empty JSON object as default
    }

    $existing_scores = json_decode($test_attendance->score, true) ?? [];
    $new_scores = [
        'act_overall_score' => $request->act_overall_score,
        'act_date_of_exam' => $request->act_date_of_exam,
        'act_reading' => $request->act_reading,
        'act_math' => $request->act_math,
        'act_science' => $request->act_science,
        'act_english' => $request->act_english,
        'act_writing' => $request->act_writing,
    ];

    // Merge the existing and new scores, updating the values if they exist in the new scores
    $scores = array_merge($existing_scores, $new_scores);

    $test_attendance->score = json_encode($scores);
    $test_attendance->updated_at = Carbon::now();
    $test_attendance->save();
}



public function edit_aplications(Request $request)
{
    $existing_application = STapplicationModel::where('id', $request->id)->first();

    if( $existing_application){
        $existing_application->delete();
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
