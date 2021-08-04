<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\adminLoginRequest;
use App\Http\Requests\Add_admin_request;
use App\Http\Requests\add_user_request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\Models\Admin;
use App\Models\User;
use App\Models\alsalawat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\sendActivateCode;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminDashboardController extends Controller
{
    
    public function dashboard(){
        return view('Admin.dashboard');
    }

    public function adminLogin(){
        return view('Admin.login.login');
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
        return view('Admin.Admins.Add_admins', compact('roles'));
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
            
       return redirect()->route('admin.add')->with(['success'=> 'Admin Add Succesfully']);
        }

    public function showaAmins(){
        $admins = Admin::select('id', 'name', 'email')->get();
        return  view('Admin.Admins.show_admins', compact('admins'))->with(['var' => 1]);
    }    
    public function deleteAmins($id){
        $admin = Admin::find($id);
        if(!$admin){
            return back();
        }
        $admin->delete();
        return back();
    }
    /// ----------------------------------------------///
    
    /// ---------------------Users ----------------//
    public function addUser(){
        return view('Admin.users.Add_user');
    }

    public function showusers(){
        $users = User::select('id','first_name','second_name','email','mobile')->get();
        return  view('Admin.users.show_users', compact('users'))->with(['var' => 1]);
    }   

    public function storeUser(add_user_request $request){
      try{
        $request['password']  = Hash::make($request->password);
        $request->request->add(['activate_code' => Str::random(5)]);
        
       // DB::beginTransaction();
        $user = User::create($request->all());
        if($user)
       // $data = ['activecode' => $user->activate_code];
       // Mail::To($user->email)->send(new sendActivateCode($data));
       // DB::commit();
        return redirect()->route('admin.add.user')->with(['success'=> 'User Save Succesfully']);
      } catch(\Exception $ex){
        DB::rollback();
        return $ex;
      }
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
    
    public function deleteusers($id){
        $user = User::find($id);
        if(!$user){
            return back();
        }
        $user->delete();
        return back();
    }
     // ------------------------------------------------------------------------- //

     public function alsalawat(){
        $alsalawat = alsalawat::select('id','type','alfard','alsonna_before','alsonna_after')->get();
        return view('Admin.Alsalawat.alsalawat', compact('alsalawat'))->with(['var' => 1]);
     }
    
    public function questions(){
        return view('Admin.questions.questions');
    }
    
     public function logout(Request $request)
    {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('admin.login');
    }
}