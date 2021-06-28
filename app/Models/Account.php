<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Bank;
use App\Models\Contact;
use App\Models\Transfer;
use App\Models\Credit;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens; 

class Account extends Model {
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = ['user_id', 'bank_id', 'account_number', 'login', 'password', 'pin', 'balance',
     'pesel', 'first_name', 'last_name', 'birth_date', 'zip_code', 'city', 'phone_number', 'email'];


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

	public function setCurrentBalance($id,$amount,$type){
        $account = Account::find($id);
        $currentBalance = 0;
        if($type === 1){
            $currentBalance = floatval($account->balance) - floatval($amount);
        }else{
            $currentBalance = floatval($account->balance) + floatval($amount);
        }

        $account->balance = $currentBalance;
        $account->save();
        return $currentBalance;
    }

}
