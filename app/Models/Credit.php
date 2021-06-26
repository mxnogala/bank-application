<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;

class Credit extends Model
{
    use HasFactory;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
