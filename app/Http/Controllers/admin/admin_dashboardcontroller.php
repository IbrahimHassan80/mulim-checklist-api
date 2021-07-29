<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\adminLoginRequest;
use App\Http\Requests\Add_admin_request;
use App\Http\Requests\add_user_request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class admin_dashboardcontroller extends Controller
{
    
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function adminLogin(){
        return view('admin.login.login');
    }

    public function checkAdminLogin(adminLoginRequest $request){
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
		{
    		return redirect()->route('admin.dashboard');
    	} 
    	else {
    		return redirect()->route('admin.login')->with(['failed'=>'wrong email or oassword']);
    	    }
    }

    public function addAdmin(){
        $roles = Role::select('id','name')->get();
        return view('admin.Admins.Add_admins', compact('roles'));
    }

    public function storeAdmin(Add_admin_request $request){
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($request->role){
            $role = Role::find($request->role);
            $admin->assignRole($role);
            }
            
        return 'good';
        }

    public function showaAmins(){
        $admins = Admin::select('id', 'name', 'email')->get();
        return  view('admin.Admins.show_admins', compact('admins'))->with(['var' => 1]);
    }    
    public function deleteAmins($id){
        $admin = Admin::find($id);
        if(!$admin){
            return 'not found this admin';
        }
        $admin->delete();
        return back();
    }
    public function addUser(){
        return view('admin.users.Add_user');
    }

    public function storeUser(add_user_request $request){
       
        $request['password']  = Hash::make($request->password);
        $user = User::create($request->all());
        if($user)
        return redirect()->route('admin.add.user')->with(['success'=> 'User Save Succesfully']);
    }
    public function storePhoto(Request $request){
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
            return 'Done';
    }
    
    public function logout(Request $request)
    {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('admin.login');
    }
}