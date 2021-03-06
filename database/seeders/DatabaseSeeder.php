<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'login' => '123456',
            'password' => Hash::make('pass1234'),
            'pin' => Hash::make('1234'),
			'is_admin' => false  
        ]);

        DB::table('users')->insert([
            'login' => '543211',
            'password' => Hash::make('pass1234'),
            'pin' => Hash::make('1234'),
			'is_admin' => true       
        ]);

        DB::table('users')->insert([
            'login' => '732159',
            'password' => Hash::make('pass1234'),
            'pin' => Hash::make('1234'),
			'is_admin' => false       
        ]);

        DB::table('users')->insert([
            'login' => '423658',
            'password' => Hash::make('pass1234'),
            'pin' => Hash::make('1234'),
			'is_admin' => true       
        ]);

        DB::table('users')->insert([
            'login' => '647258',
            'password' => Hash::make('pass1234'),
            'pin' => Hash::make('1234'),
			'is_admin' => false       
        ]);

        DB::table('users')->insert([
            'login' => '967425',
            'password' => Hash::make('pass1234'),
            'pin' => Hash::make('1234'),
			'is_admin' => false       
        ]);

        DB::table('banks')->insert([
            'bank_name' => 'Santander'
        ]);

        DB::table('banks')->insert([
            'bank_name' => 'PKO'
        ]);

        DB::table('accounts')->insert([
            'user_id' => 1,
            'bank_id' =>1,
            'account_number' => '1234123412341234',
            'balance' => 48993.45,
            'pesel'=>'99100404849',
            'first_name' => 'Jan',
            'last_name' => 'Nowak',
            'birth_date' => '1960-04-01',
            'address' => 'Jasna 20',
            'zip_code' => '12-345',
            'city' => 'Pozna??',
            'phone_number' => '123456789',
            'email' => 'jannowak@mail.pl'

        ]);
        
        DB::table('accounts')->insert([
            'user_id' => 2,
            'bank_id' =>2,
            'account_number' => '4321432143214321',
            'balance' => 165002.22,
            'pesel'=>'56987451236',
            'first_name' => 'Anna',
            'last_name' => 'Kowalska',
            'birth_date' => '1978-08-21',
            'address' => 'Ciemna 13',
            'zip_code' => '26-698',
            'city' => 'G??dki',
            'phone_number' => '987654321',
            'email' => 'annakowalskak@mail.pl'
        ]);
        
        DB::table('accounts')->insert([
            'user_id' => 3,
            'bank_id' =>2,
            'account_number' => '1234567891234567',
            'balance' => 13645.98,
            'pesel'=>'56981451236',
            'first_name' => 'Przemys??aw',
            'last_name' => 'Kot',
            'birth_date' => '1999-08-21',
            'address' => 'Jasna 11',
            'zip_code' => '26-698',
            'city' => 'G??dki',
            'phone_number' => '987654329',
            'email' => 'przemyslawkot@mail.pl'
        ]);
        
        DB::table('accounts')->insert([
            'user_id' => 4,
            'bank_id' =>1,
            'account_number' => '9234567891234567',
            'balance' => 9999.22,
            'pesel'=>'59987451236',
            'first_name' => 'Joanna',
            'last_name' => 'Kowalska',
            'birth_date' => '1978-08-21',
            'address' => 'Ciemna 14',
            'zip_code' => '26-698',
            'city' => 'G??dki',
            'phone_number' => '987154321',
            'email' => 'joannakowalska@mail.pl'
        ]);


        DB::table('admins')->insert([
            'bank_id' => 1,
            'login' => 'admin1',
            'password' => 'admin123'
        ]);

        DB::table('admins')->insert([
            'bank_id' => 2,
            'login' => 'admin2',
            'password' => 'admin123'
        ]);

        DB::table('credits')->insert([
            'account_id' => 2,
            'debt' => 30000,
            'next_instalment_date' => '2021-07-01',
            'final_instalment_date' => '2030-07-01',
            'minimal_instalment' => 1500,
            'remaining_funds' =>25000
        ]);

        DB::table('credits')->insert([
            'account_id' => 2,
            'debt' => 15000,
            'next_instalment_date' => '2021-07-25',
            'final_instalment_date' => '2030-09-25',
            'minimal_instalment' => 1500,
            'remaining_funds' =>9000
        ]);

        DB::table('credits')->insert([
            'account_id' => 1,
            'debt' => 30000,
            'next_instalment_date' => '2021-07-01',
            'final_instalment_date' => '2030-07-01',
            'minimal_instalment' => 1500,
            'remaining_funds' =>25000
        ]);
		
        DB::table('credits')->insert([
            'account_id' => 1,
            'debt' => 100000,
            'next_instalment_date' => '2021-07-01',
            'final_instalment_date' => '2030-07-01',
            'minimal_instalment' => 10000,
            'remaining_funds' =>50000
        ]);
		
        DB::table('credits')->insert([
            'account_id' => 2,
            'debt' => 5000,
            'next_instalment_date' => '2021-10-01',
            'final_instalment_date' => '2033-07-01',
            'minimal_instalment' => 100,
            'remaining_funds' =>1000
        ]);

        DB::table('transfers')->insert([
            'sender_id' => 1,
            'receiver_id' => 2,
            'receiver_data' => 'Anna Kowalska',
            'receiver_address' => 'ul. Ciemna',
            'title' => 'Nowy przelew',
            'amount' => 250, 
            'transfer_date' => '2021-06-26'
        ]);
        DB::table('transfers')->insert([
            'sender_id' => 2,
            'receiver_id' => 1,
            'receiver_data' => 'Jan Nowak',
            'receiver_address' => 'ul. Jasna',
            'title' => 'Nowy przelew',
            'amount' => 250, 
            'transfer_date' => '2021-06-26'
        ]);
    }
}
