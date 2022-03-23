<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; //sanctum auth

class LoginController extends Controller
{
	//reccuring variables

	//function for right crential give back token
	public function store(Request $request){
		$credentials = $request->validate([
            		'email' => ['required', 'email'],
            		'password' => ['required'],
		]);


		$status = 401;
		$response = [
			'error'=>'gagal',
		];
		if (Auth::attempt($credentials)) {
            		$status = 200;
            		$token = $request->user()->createToken('access_token')->plainTextToken;
            		$response = [
                		'access_token' => $token,
                		'token_type' => 'Bearer',
            			];
        	}

        	return response()->json($response, $status);
    	}

}