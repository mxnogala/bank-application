<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;

class Transfer extends Model
{
    use HasFactory;

    public function sender()
    {
        return $this->belongsTo(Account::class);
    }

    public function receiver() 
    {
        return $this->hasOne(Account::class, 'id', 'receiver_id');
    }
}
