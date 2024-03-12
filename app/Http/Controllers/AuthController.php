<?php

namespace App\Http\Controllers;

use Hash;
use Auth;

use Illuminate\Http\Request;
use App\Model\User;


class AuthController extends Controller
{
    public function login_admin(){
        if(!empty(Auth::check()) && Auth::user()->is_admin == 1){
            toastr()->info('Successfully Login!');
            return redirect('admin/dashboard');
        }
        return view('admin.auth.login');
    }

    public function auth_login_admin(Request $request){
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1, 'status' => 0, 'is_delete' => 0], $remember)){
            
            toastr()->info('Successfully Login!');
            return redirect('admin/dashboard');
        }
        else{
            toastr()->error('Please enter currect email and password!');
            return redirect()->back();
        }
    }

    public function logout_admin(){
        Auth::logout();
        return redirect('admin');
    }


    public function authRegister(Request $request){
        // dd($request->all());
        $checkEmail = User::checkEmail($request->email);
        if (empty($checkEmail)) {
            $save = new User;
            $save->name = trim($request->name);
            $save->email = trim($request->email);
            $save->password = Hash::make($request->password);
            $save->save();

            $json['status'] = true;
            $json['message'] = "your account successfully created";
        } else {
            $json['status'] = false;
            $json['message'] = "This email already register please choose another";
        }
        echo json_encode($json);
    }
}
