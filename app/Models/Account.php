<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Bank;
use App\Models\Contact;
use App\Models\Transfer;
use App\Models\Credit;

class Account extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function transfersOutcoming()
    {
        return $this->hasMany(Transfer::class, 'sender_id');
    }

    public function transfersIncoming()
    {
        return $this->hasMany(Transfer::class, 'receiver_id');
    }

    public function transfers()
    {
      return $this->transfersOutcoming()->union($this->transfersIncoming()->toBase());
    }

    public function credits()
    {
        return $this->hasMany(Credit::class);
    }
}
