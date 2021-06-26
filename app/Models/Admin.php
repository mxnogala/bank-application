<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bank;

class Admin extends Model
{
    use HasFactory;

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
