<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Admin;
use App\Model\Account;

class Bank extends Model
{
    use HasFactory;

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
