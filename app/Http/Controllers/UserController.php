<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response(['data'=>UserResource::collection($users),'message'=>'Success'],200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required', 
            'password' => 'required|same:password'            
        ]);
 
        if ($validator->fails()) {
            return response (['errors' => $validator->errors()->all(), 'Error']);
 
            $validated['password'] = Hash::make($request->password);
            $account = User::create($validateData);
            $accessToken = $user->createToken('authToken')->accessToken;
            return response(['account' => $account, 'access_token' => $accessToken], 201);
        }
    }
 
    public function login(Request $request)
    {
        if (Auth::attempt(['login' => $request->login, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('bankToken')->accessToken;
            return response(['token'=>$token, 'user_id'=>$user->id, 'message' => 'You are logged'], 200); 
        }
        else {
            return response(['error' => 'Authorisation error'], 400);
        }
    }
 
    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        return response(['message' => 'You are logged out'], 200);
    }
}
