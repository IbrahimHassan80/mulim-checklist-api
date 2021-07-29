<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\add_user_request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class authcontroller extends Controller
{
    public function storeUser(Request $request){
        $rules = [
            'first_name'  => 'required|max:20',
            'second_name' => 'required|max:20',
            'email'       => 'required|email|unique:users,email',
            'mobile'      => 'required|numeric|unique:users,mobile',
            'password'    => 'required',
        ];
       
        $validator = validator::make($request->all(), $rules);
        if($validator->fails()){
                return response()->json([
                    'message' => 'the given data was invalid',
                    'errNum' => 500,
                    'error' => $validator->errors(),
                ]);
        }
       
        $request['password']  = Hash::make($request->password);
        $user = User::create($request->all());
        
        $token=$user->createToken('my-app-token')->plainTextToken;
        $respons=[
            'user'=>$user,
            'token'=>$token
        ];
        return $respons;
       
    }

    public function loginUser(Request $request){
        $rules = [
            'email'       => 'required|email',
            'password'    => 'required',
        ];
        $validator = validator::make($request->all(), $rules);
        
        if($validator->fails()){
                return response()->json([
                    'message' => 'the given data was invalid',
                    'errNum' => 500,
                    'error' => $validator->errors(),
                ]);
        }
        
        $user= User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function logoutUser(Request $request){
        auth()->user()->tokens()->delete();
        return 'done';
    }
}