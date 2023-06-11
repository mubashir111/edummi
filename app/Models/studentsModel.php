<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class studentsModel extends Model
{
    use HasFactory;

     use Notifiable;

     protected $table = 'students';


      public function address()
    {
        return $this->belongsTo(studentaddressModel::class,'id','student_id');

        
    }

     public function passport()
    {
        return $this->belongsTo(passportModel::class, 'id', 'user_id');

        
    }
    
        public function application()
        {
            return $this->hasMany(STapplicationModel::class, 'user_id', 'id');
        }


     public function document()
    {
        return $this->belongsTo(documentsModel::class, 'id', 'user_id');

        
    }

     public function important_contacts()
    {
        return $this->belongsTo(ImportantContactsModel::class, 'id', 'user_id');

        
    }

     public function academic_qualifications()
    {
        
         return $this->hasMany(academic_qualificationsModal::class, 'student_id', 'id');

    }

     public function work_experience()
    {
        
         return $this->hasMany(work_experienceModal::class, 'student_id', 'id');

    }


     public function test_attendance()
    {
        
         return $this->belongsTo(test_attendanceModel::class, 'id', 'student_id');

    }

     public function username()
    {
       
         return $this->belongsTo(User::class,'id','referred_by');

        
    }

     public function usersname()
    {
       
         return $this->belongsTo(User::class,'referred_by','id');

        
    }





    public function assignedto()
    {
       

         return $this->belongsTo(Department_staff_modal::class,'assigned_to','staff_id')->with('user')->with('department');

        
    }

}
