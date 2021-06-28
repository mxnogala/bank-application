<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;

class Transfer extends Model
{
    use HasFactory;

	protected $fillable = ['account_number', 'sender_id', 'receiver_id', 'receiver_data', 'receiver_address', 'title',
     'amount', 'transfer_date', 'created_at', 'updated_at'];

    public function sender()
    {
        return $this->belongsTo(Account::class);
    }

    public function receiver() 
    {
        return $this->hasOne(Account::class, 'id', 'receiver_id');
    }
	public static function findForAccount($id){
        $transfers = Transfer::where('sender_id',$id)->orWhere('receiver_id',$id)->get();
        return $transfers;
	}
}
