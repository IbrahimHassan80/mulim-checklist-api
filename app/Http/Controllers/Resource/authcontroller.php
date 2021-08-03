<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\add_user_request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\sendActivateCode;
use App\Mail\passwordResetMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
class authcontroller extends Controller
{
    public function storeUser(Request $request){
      try{
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
        $request->request->add(['activate_code' => Str::random(5)]);
        DB::beginTransaction();
        $user = User::create($request->all());
        if($user){
        $data = ['activecode' => $user->activate_code];
        Mail::To($user->email)->send(new sendActivateCode($data));
        DB::commit();
        $token=$user->createToken('my-app-token')->plainTextToken;
        $respons=[
            'user'   => $user,
            'token'  => $token,
            'verify' => 'activate code send to your mail check it'
        ];
        return $respons;
        }
    } catch(\Exception $ex){
        DB::rollback();
        return response()->json([
            'error' => "proplem found",
        ]);
      }        
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
                ]); }
        
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

    public function forgetpassword(Request $request){
        try{
        // Validate //
        $rules = ['email' => 'required|email'];
        $validator = validator::make($request->all(), $rules);   
        if($validator->fails()){
                return response()->json([
                    'message' => 'the given data was invalid',
                    'errNum' => 500,
                    'error' => $validator->errors(),
                ]); }
        
                
        $user = User::where('email', $request->email)->first();
        if($user){
            DB::beginTransaction();
            $user->update([
                'password_reset_code' => Str::random(5)
            ]);
            $data = ['password_code' => $user->password_reset_code];
            Mail::To($user->email)->send(new passwordResetMail($data));
            DB::commit();
            return 'good';
        } else {
            return response()->json([
                'message' => 'the given data was invalid',
                'errNum' => 500,
                'error' => "the email does not exist",
            ]);
        }
    } catch(\Exception $ex){
        DB::rollback();
        return $ex;
        return response()->json([
            'error' => "proplem found",
        ]);
      }
    }

    public function forgetPasswordCode(Request $request){
        $rules = ['code' => 'required|exists:users,password_reset_code'];
        $validator = validator::make($request->all(), $rules);   
        if($validator->fails()){
                return response()->json([
                    'message' => 'the given data was invalid',
                    'errNum' => 500,
                    'error' => $validator->errors(),
                ]); }
        $user = User::where('password_reset_code', $request->code)->first();
        if(!$user){
            return response()->json([
                'message' => 'the given data was invalid',
                'errNum' => 500,
                'error' => 'this user not exists',
            ]);
        } else {
            return response()->json([
                'message' => 'success',
                'errNum' => 200,
                'error' => 'succeded',
            ]);
        }
    }

   public function changeForgetPassword(Request $request, $code){
        $rules = [
            'password' => 'required|confirmed|min:6',];
            $validator = validator::make($request->all(), $rules);   
            if($validator->fails()){
                return response()->json([
                    'message' => 'the given data was invalid',
                    'errNum' => 500,
                    'error' => $validator->errors(),
                ]); }
                
                $user = User::where('password_reset_code', $code)->first();
                if(!$user){
                    return 'this user not exists';
                } else {
                    $user->update(['password' => Hash::make($request->password)]);
                    return 'password changed succefully';
                }
            }

    public function logoutUser(Request $request){
        auth()->user()->tokens()->delete();
        return 'done';
    }
}