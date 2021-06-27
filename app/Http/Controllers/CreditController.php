<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CreditResource;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credits = Credit::all();
        return response(['data'=>CreditResource::collection($credits)], 200);
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
    public function store(Request $request, $id)
    {
        $data = $request->all();
        $credits = new Credit;
        $row = [
            'account_id' => $id,
            'debt' => $data['debt'],
            'next_instalment_date' => $data['next_instalment_date'],
            'final_instalment_date' => $data['final_instalment_data'],
            'minilam_instalment' => $data['minimal_instalment'],
            'remaining_funds' => $data['remaining_funds']
        ];
        $createCredit = Credit::create($row);
        return response(['data' => new CreditResource($createCredit)], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($accountId, $creditId)
    {
        $credit = Credit::findOrFail($creditId);
        return response(['data' => new CreditResource($credit)], 200);
    }

    public function showAll($accountId)
    {
        $account = Account::findOrFail($accountId);
        return response(['data' => CreditResource::collection($account->credits)], 200);
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
    public function update(Request $request, Credit $credit)
    {
        return response(['credits' => new CreditResource($credit)], 200);
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
