<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messegecontroller extends Model
{
    use HasFactory;
     protected $table = 'tickets';

     public function user()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');

        
    }


}
