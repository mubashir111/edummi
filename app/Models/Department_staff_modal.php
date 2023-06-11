<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department_staff_modal extends Model
{
    use HasFactory;
      protected $table = 'staff_department';

       public function user()
        {
            // return $this->hasMany(User::class);
           return $this->hasOne(User::class, 'user_id','staff_id');

          
        }

         public function department()
        {
            // return $this->hasMany(User::class);
           return $this->hasOne(deparmentModel::class, 'id','department_id');

          
        }
}
