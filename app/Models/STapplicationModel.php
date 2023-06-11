<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class STapplicationModel extends Model
{
    use HasFactory;

     protected $table = 'applications';

      public function chat()
        {
            return $this->hasMany(ApplicationChat::class, 'application_id', 'id');
        }

         public function statusview()
        {
            // return $this->hasMany(User::class);
           
             return $this->belongsTo(ApplicationStatus::class,'current_status','id');
          
        }
}
