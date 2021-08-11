<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class usercontroller extends Controller
{
    public function storePhotoProfile(Request $request){
        $rules = [
            'photo' => 'required',
        ];
        $validator = validator::make($request->all(), $rules);  
        if($validator->fails()){
            return response()->json([
                'message' => 'the given data was invalid',
                'errNum' => 500,
                'error' => $validator->errors(),
       ]);
         }
        
        $file_extension = $request -> photo->getclientoriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'project/users';
        $request->photo->move($path, $file_name);
        $user = User::where('id', auth()->user()->id)->update(['photo' => $file_name]);
        if($user)
            return 'Photo changed succeffully';
    }

    public function deletePhoto(){
        if(File::exists(public_path('project/users/' . auth()->user()->photo))){
           File::delete(public_path('project/users/' . auth()->user()->photo));}  
            $user = User::where('id', auth()->user()->id)->update(['photo' => null]);
            if($user)
             return 'photo deleted';
    }

    public function changePassword(Request $request){
        $rules = [
            'current_password' => 'required',
            'new_password'        => 'required',
        ];
        $validator = validator::make($request->all(), $rules);  
        if($validator->fails()){
            return response()->json([
              'message' => 'the given data was invalid',
              'errNum' => 500,
              'error' => $validator->errors(),]);
         } 
    
        $user = auth()->user();
         if(Hash::check($request->current_password, $user->password)){
           $update = $user->update([
             'password' => bcrypt($request->new_password)]);
            if($update)
              return 'password change succefully';
          } else {
            return 'old password is wrong';
    }
}
}