<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;

class Credit extends Model
{
    use HasFactory;
    protected $fillable = ['account_id', 'debt', 'next_instalment_date', 'final_instalment_date', 'minimal_instalment', 'remaining_funds'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    
}
