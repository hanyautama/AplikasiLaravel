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

		//$request->user()->createToken('access_token')->plainTextToken;
		//$request->session()->regenerate();	

        	return response()->json($response, $status);
	}

	public function destroy(Request $request){
		
		$request->user()->tokens()->where('tokenable_id', Auth::user()->id)->delete();

		$status = 401;
		$response = [
			'error'=>'gagal',
		];

		if(Auth::check()){
			$status = 200;

			$response = [
				'O.K'=>'Log Out',
			];
		}

        	return response()->json($response, $status);
	}

	public function show(Request $request){
		return $request->user();
	}
}
