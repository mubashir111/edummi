<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class leadsModdel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'leads';

     public function leasstatus()
    {
        return $this->belongsTo(LeadsstatusModal::class, 'status', 'id');

        
    }

    protected $fillable = [
        'name', 'first_name', 'middle_name', 'last_name', 'email', 'phone', 'address', 'date_of_birth', 'gender',
    ];
}
