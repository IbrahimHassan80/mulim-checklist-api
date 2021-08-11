<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\adminLoginRequest;
use App\Http\Requests\Add_admin_request;
use App\Http\Requests\AdminEditRequest;
use App\Http\Requests\add_user_request;
use App\Http\Requests\UserEditRequest;
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
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Kutia\Larafirebase\Facades\Larafirebase;
use Illuminate\Support\Facades\Validator;
/// thank
class AdminDashboardController extends Controller
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
            $admin->syncRoles([$request->role]);
            }
       return redirect()->route('admin.add')->with(['success'=> trans('messages.saved_successfully')]);
    }

    public function showaAmins(){
        $admins = Admin::select('id', 'name', 'email')->get();
        return view('admin.Admins.show_admins', compact('admins'))->with(['var' => 1]);
    }
   
    public function editAmins($id){
        $admin = Admin::find($id);
        if(!$admin)
            return redirect()->route('admin.show');
        $roles = Role::select('id','name')->get();
        $admin_roles = $admin->roles->pluck('name','id');
        return view('admin.Admins.edit_admin', compact('admin','admin_roles','roles'));
    }    
          
     public function storeAdminEdit(AdminEditRequest $request, $id){
        $admin = Admin::find($id);
        if(!$admin)
        return redirect()->route('admin.show');
      
        $admin->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),]);
        if($request->role){
          $admin->syncRoles([$request->role]);
          }
          return redirect()->back()->with(['success'=> trans('messages.saved_successfully')]);
     }
        
     public function deleteRole(Request $request){
            $role = Role::find($request->role);
            $admin = Admin::find($request->admin);
            $admin->removeRole($role);
            return back();
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
        return view('admin.users.Add_user');
    }

    public function showusers(){
        $users = User::select('id','first_name','second_name','email','mobile')->get();
        return  view('admin.users.show_users', compact('users'))->with(['var' => 1]);
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
        return redirect()->route('admin.add.user')->with(['success'=> trans('messages.saved_successfully')]);
      } catch(\Exception $ex){
        DB::rollback();
        return $ex;
      }
    }
    
    public function editUser($id){
        $user = User::find($id);
        if(!$user)
        return redirect()->route('show.user');

        return view('admin.users.edit_user', compact('user'));
    }

    public function storeEditUser(UserEditRequest $request, $id){
        $user = User::find($id);
        if(!$user)
        return back();

        $request['password']  = Hash::make($request->password);
        $user->update($request->all());
        return redirect()->back()->with(['success'=> trans('messages.saved_successfully')]);
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
        return view('admin.Alsalawat.alsalawat', compact('alsalawat'))->with(['var' => 1]);
     }
    
    public function changeLang($locale){
        session()->put('locale', $locale);
        return redirect()->back();
    }

     public function logout(Request $request)
    {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('admin.login');
    }
}