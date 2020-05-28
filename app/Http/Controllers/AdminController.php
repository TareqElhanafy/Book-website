<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\ResetAdminPasswordRequest;
use App\Mail\ResetAdminPassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{


        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function login(){
        return view('admin.login');
    }
    public function doAdminlogin(AdminLoginRequest $request){
        $remember=request()->remember==1? true: false;

        if (Auth::guard('admin')->attempt(['email'=>request()->email,'password'=>request()->password],$remember)){
            return redirect('/admin/dashboard');
        }else{
             return redirect(route('adminLogin'));
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
         return redirect(route('welcome.index'));
    }

    public function forget(){
        return view('admin.forget');
    }

    public function sendPasswordEmail(){
        $admin=Admin::where('email',request()->email)->firstOrFail();

        DB::transaction(function() use($admin){
            $admin->token=Admin::generateToken();
            $admin->tokenexpired=Carbon::now();
            $admin->save();
        });
        Mail::to($admin->email)->send(new ResetAdminPassword($admin));
    
        session()->flash('success','please check your mail to reset your password');
        return redirect('/');

    }
    public function verify($token){
        $admin=Admin::where('token',$token)->firstOrFail();
        if($admin){
            $admin->token=null;
            $admin->tokenexpired=null;
            $admin->save();
            return redirect(route('newresetpassword',$admin->id));
        }else{
            return redirect(route('adminforgetpage'));
        }
    }
public function viewResetPage(Admin $admin){
    return view('admin.resetpage')->with('admin',$admin);

}
public function doAdminPasswordreset(ResetAdminPasswordRequest $request){
    $admin=Admin::where('email',$request->email)->firstOrFail();
if($admin){
    $admin->password=bcrypt($request->password);
    $admin->save();
    
    return redirect(route('adminLogin'));
}else {
    return redirect(route('adminforgetpage'));
}
}
}
