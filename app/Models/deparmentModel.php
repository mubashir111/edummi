<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deparmentModel extends Model
{
    use HasFactory;
    protected $table = 'departments';


    public function users()
        {
            // return $this->hasMany(User::class);
            return $this->hasMany(Department_staff_modal::class,'department_id','id');
          
        }


}
