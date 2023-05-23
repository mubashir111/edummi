<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class applicationModel extends Model
{
    use HasFactory;
     protected $table = 'applications';

      public function student()
        {
            // return $this->hasMany(User::class);
           
             return $this->belongsTo(studentsModel::class, 'user_id', 'id');
          
        }
}
