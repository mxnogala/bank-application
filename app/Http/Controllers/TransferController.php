<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CreditResource;
use App\Http\Resources\TransferResource;
use App\Models\Transfer;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers = Transfer::all();
        return response(['data' => TransferResource::collection($transfers)], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
/*
        $validator = Validator::make($request->all(), [
            'sender_id' => 'required', 
            'receiver_id' => 'required',
            'title' => 'required',
            'amount' => 'required'
        ]); 

        return response(['data'=> new Transfer()])
        */
		
		$data = $request->all();
		$toAccount = $data['account_number'];
		$toAccount = Account::where('account_number', '=', $toAccount)->get();
		$toAccountId = $toAccount->first()->id;

		
		$currenUserId = Auth::user()->id;

        
        $fromAccount = Account::findOrFail($currenUserId);
		$toAccount = Account::findOrFail($toAccountId);


		$fromAccount->setCurrentBalance($currenUserId,$data['amount'],1);
		$toAccount->setCurrentBalance($toAccountId,$data['amount'],0);

		$toRow = [
			'sender_id'=>$currenUserId,
			'receiver_id'=>$toAccountId,
			'receiver_data'=>"$toAccount->first_name $toAccount->last_name",
			'receiver_address'=>$data['receiver_address'],
			'title'=>$data['title'],
			'amount'=>$data['amount'],
			'transfer_date'=>$data['transfer_date'],
			'created_at'=>Carbon::now(),
			'updated_at'=>Carbon::now(),
		];

        Transfer::create($toRow);
		return response(['message'=>"Transfer created successfuly!"],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($transferId)
    {
        $transfer = Transfer::findOrFail($transferId);
        return response(['data' => new TransferResource($transfer)], 200);
    }

    public function showAll($accountId)
    {
		//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
    public function showUserTransfers($accountId){
		$transfers = Transfer::findForAccount($accountId);
		return response(['data'=>TransferResource::collection($transfers)],200);
	}
}
