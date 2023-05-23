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
use Carbon\Carbon;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $students = studentsModel::all();

        $user = auth()->user()->user_id;

 $departments = deparmentModel::where('created_by',$user)->get();

 //$employee = User::where('role',$departments->department_name)->get();

  $users_role =  Auth::user()->role;


         return view('manage-students',['students'=> $students ,'departments' => $departments,'users_role' => $users_role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

   public function departmentstudents()
    {
        $user = auth()->user()->id;

        $students = studentsModel::where('assigned_to',$user)->get();



 $departments = deparmentModel::where('created_by',auth()->user()->user_id)->get();


        return view('department-students',['students'=> $students ,'departments' => $departments]);

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


         $userRole = Auth::user()->role;
         $userId = Auth::user()->id;
  
         $student = new studentsModel;
            $student->first_name = $request->first_name;
            $student->middle_name = $request->middle_name;
            $student->last_name = $request->last_name;
            $student->phone = $request->number;
            $student->email = $request->email;
            $student->student_id = $student_id;
             $student->referred_by  = $userId;
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


            $students = studentsModel::all();
         return view('manage-students',['students'=> $students]);

           
        
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
       

        $student = studentsModel::where('id', $request->student_id)->first();
       

         $student->assigned_to = $request->employee;
         $student->department = $request->department;
         $student->save();
         return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $students = studentsModel::where('id', $id)
    ->with('passport')
    ->with('application')
    ->with('document')
    ->first();

    $mailing_address= studentaddressModel::where('student_id', $id)->where('address_type',"mailing")->first();

     $permanent_address= studentaddressModel::where('student_id', $id)->where('address_type',"permanent")->first();

    //dd($students);


         return view('personal-information',['students'=> $students , 'mailing_address'=>$mailing_address , 'permanent_address'=>$permanent_address]);
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
    ->get();

   

    //dd($students->student_id);

     return view('student-docs',compact('students') );

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

// check if the 'applied_for_immigration' attribute is not null
// if ($request->filled('applied_imigaration_status')) {
//     $student->applied_for_immigration = $request->applied_imigaration_status;
// }

// check if the 'medical_conditions' attribute is not null
if ($request->filled('medical_issue_status')) {
    $student->medical_conditions = $request->medical_issue_status;
}

// check if the 'visa_refusal' attribute is not null
// if ($request->filled('visa_refusal_status')) {
//     $student->visa_refusal = $request->visa_refusal_status;
// }

// check if the 'convicted_of_crime' attribute is not null
// if ($request->filled('criminal_offence_status')) {
//     $student->convicted_of_crime = $request->criminal_offence_status;
// }

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

           

            $passport = passportModel::where('user_id', $user_id)->first();

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

            $passport->user_id  = $user_id;
             $passport->save();
          

           $application= new STapplicationModel;
    


            

                        if ($request->filled('request_aplication_year')) {
                $application->year  = $request->request_aplication_year;
            }

            if ($request->filled('request_aplication_intake')) {
                $application->intake  = $request->request_aplication_intake;
            }

            if ($request->filled('request_university_name')) {
                $application->university_name  = $request->request_university_name;
            }

            if ($request->filled('request_course_name')) {
                $application->course  =  $request->request_course_name;
            }
            $application->user_id  = $user_id;
            $application->created_at  = Carbon::now();
            $application->save();



             $document1 = documentsModel::where('user_id', $user_id)->where('document_name', 'Std. 9th Marksheet')->first();
    if (!$document1) {
        $document1 = new documentsModel;
         
        
    }
   
             $document1->user_id = $user_id;
          $document1->updated_at = Carbon::now();

           if ($request->hasFile('9th_marksheet')){
        
        foreach ($request->file('9th_marksheet') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"9th_Marksheet_url"} = 'students/documents/' . $filename;
    }

    
}




if ($request->hasFile('10th_marksheet')){
        
        foreach ($request->file('10th_marksheet') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"10th_Marksheet_url"} = 'students/documents/' . $filename;
    }

    
}



if ($request->hasFile('11th_marksheet')){
        
        foreach ($request->file('11th_marksheet') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"11th_Marksheet_url"} = 'students/documents/' . $filename;
    }

    
}


if ($request->hasFile('12th_marksheet')){
        
        foreach ($request->file('12th_marksheet') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"12th_Marksheet_url"} = 'students/documents/' . $filename;
    }

    
}


if ($request->hasFile('bachlors_marksheet')){
        
        foreach ($request->file('bachlors_marksheet') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"Bachlors_Individual_Marksheets_url"} = 'students/documents/' . $filename;
    }

    
}

if ($request->hasFile('consolidate_marksheet')){
        
        foreach ($request->file('consolidate_marksheet') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"Consolidated_Marksheet_url"} = 'students/documents/' . $filename;
    }

    
}


if ($request->hasFile('acadamic_transcript')){
        
        foreach ($request->file('acadamic_transcript') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"academic_Marksheet_url"} = 'students/documents/' . $filename;
    }

    
}

if ($request->hasFile('final_degree')){
        
        foreach ($request->file('final_degree') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"Degree_Certificate_url"} = 'students/documents/' . $filename;
    }

    
}

if ($request->hasFile('application_form')){
        
        foreach ($request->file('application_form') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"application_form_url"} = 'students/documents/' . $filename;
    }

    
}

if ($request->hasFile('passport_file')){
        
        foreach ($request->file('passport_file') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"copy_of_Passport_url"} = 'students/documents/' . $filename;
    }

    
}


if ($request->hasFile('statment_purpose')){
        
        foreach ($request->file('statment_purpose') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"statment_of_purpose_url"} = 'students/documents/' . $filename;
    }

    
}

if ($request->hasFile('cv')){
        
        foreach ($request->file('cv') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"cv_url"} = 'students/documents/' . $filename;
    }

    
}

if ($request->hasFile('latter_of_recomentation')){
        
        foreach ($request->file('latter_of_recomentation') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"latter_of_recommendation_url"} = 'students/documents/' . $filename;
    }

    
}


if ($request->hasFile('english_certificate')){
        
        foreach ($request->file('english_certificate') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"english_language_certificate_url"} = 'students/documents/' . $filename;
    }

    
}


if ($request->hasFile('bank_balance')){
        
        foreach ($request->file('bank_balance') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"bank_balance_certificate_url"} = 'students/documents/' . $filename;
    }

    
}


if ($request->hasFile('financial_affidavit')){
        
        foreach ($request->file('financial_affidavit') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"financial_affidavit_url"} = 'students/documents/' . $filename;
    }

    
}


if ($request->hasFile('gap_explanation_letter')){
        
        foreach ($request->file('gap_explanation_letter') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"gap_explanation_latter_url"} = 'students/documents/' . $filename;
    }

    
}

if ($request->hasFile('Online_Submission_Configaration')){
        
        foreach ($request->file('Online_Submission_Configaration') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"online_submission_configaration_page_url"} = 'students/documents/' . $filename;
    }

    
}


if ($request->hasFile('sat_file')){
        
        foreach ($request->file('sat_file') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"SAT_url"} = 'students/documents/' . $filename;
    }

    
}

if ($request->hasFile('gre')){
        
        foreach ($request->file('gre') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"GRE_url"} = 'students/documents/' . $filename;
    }

    
}

if ($request->hasFile('gmat')){
        
        foreach ($request->file('gmat') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"GMAT_url"} = 'students/documents/' . $filename;
    }

    
}


if ($request->hasFile('toefl')){
        
        foreach ($request->file('toefl') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"TOEFL_url"} = 'students/documents/' . $filename;
    }

    
}

if ($request->hasFile('ielts_file')){
        
        foreach ($request->file('ielts_file') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"IELTS_url"} = 'students/documents/' . $filename;
    }

    
}

if ($request->hasFile('pte')){
        
        foreach ($request->file('pte') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"PTE_url"} = 'students/documents/' . $filename;
    }

    
}

if ($request->hasFile('exempyion_certificate')){
        
        foreach ($request->file('exempyion_certificate') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"exemption_url"} = 'students/documents/' . $filename;
    }

    
}

if ($request->hasFile('additional_documents')){
        
        foreach ($request->file('additional_documents') as $file) {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('students/documents'), $filename);
        $document1->{"additional_documents_url"} = 'students/documents/' . $filename;
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
