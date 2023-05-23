<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentsModel extends Model
{
    use HasFactory;

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
        return $this->belongsTo(STapplicationModel::class, 'id', 'user_id');

        
    } 

     public function document()
    {
        return $this->belongsTo(documentsModel::class, 'id', 'user_id');

        
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
       
         return $this->belongsTo(User::class,'assigned_to','id');

        
    }

}
