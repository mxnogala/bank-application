<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BankResource;
use Illuminate\Support\Facades\Validator;
use App\Models\Bank; 
use App\Models\Account;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();
        return response(['data'=>BankResource::collection($banks)],200);
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
        $data = $request->all();

        $bank = Bank::create($data);
        return response(['data' => new BankResource($bank)], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($accountId)
    {
		$bank = Bank::findOrFail($accountId);
		if($bank->id != $accountId){
			return response(["message"=>"Bank doesn't match this user"], 400);
		}
		return response(['data' => new BankResource($bank)], 200);
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
    public function update(Request $request, $bankId)
    {
        $bankId->update($request->all());
        return response(['data' => new BankResource($bankId)], 200);
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
}
