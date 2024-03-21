<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use Mail;
use Str;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\RegisterMail;
use App\Mail\ForgotPasswordMail;


class AuthController extends Controller
{
    // ....................ADMIN PART

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
        return redirect('admin/dashboard');
    }
    // ........./.........ADMIN PART END




    // ...........USER OR CITIZEN PART

    public function auth_register(Request $request){
        // dd($request->all());
        $checkEmail = User::checkEmail($request->email);
        if (empty($checkEmail)) {
            $save = new User;
            $save->name = trim($request->name);
            $save->email = trim($request->email);
            $save->password = Hash::make($request->password);
            $save->save();

            Mail::to($save->email)->send(new RegisterMail($save));

            $json['status'] = true;
            $json['message'] = "your account successfully created. Please verify your email address.";
        } else {
            $json['status'] = false;
            $json['message'] = "This email already register please choose another";
        }
        echo json_encode($json);
    }

    public function auth_login(Request $request){
        // dd($request->all());
        $remember = !empty($request->is_remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 0, 'is_delete' => 0], $remember)){
            
            if (!empty(Auth::user()->email_verified_at)) {
                $json['status'] = true;
                $json['message'] = "Successfully Login";
            }
            else {
                $save = User::getSingle(Auth::user()->id);
                Mail::to($save->email)->send(new RegisterMail($save));
                Auth::logout();

                $json['status'] = false;
                $json['message'] = "Your email not verifiedc, Please verify your email.";
            }

        }
        else{
            $json['status'] = false;
            $json['message'] = "Please enter currect email and password!";
        }
        echo json_encode($json);
    }

    public function logout_user(){
        Auth::logout();
        return redirect(url(''));
    }

    public function activate_email($id){
        $id = base64_decode($id);
        $user = User::getSingle($id);
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect(url(''))->with('success', "Your Email Successfully Verifird!");
    }

    public function forget_password(Request $request){
        $data['meta_title'] = 'Forget Password';
        return view('auth.forget', $data);
    }

    public function auth_forget_password(Request $request){
        $user = User::where('email', '=', $request->email)->first(); 
        if(!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();
        
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', "Please check your email and reset your password");
        }
        else{
            return redirect()->back()->with('error', "Email not found in the system.");
        }
    }

    public function reset($token){
        $user = User::where('remember_token', '=', $token)->first(); 
        if(!empty($user)){
            $data['user'] = $user;
            $data['meta_title'] = 'Reset Password';
            return view('auth.reset', $data);
        }
        else{
            abort(404);
        }
    }

    public function auth_reset($token, Request $request){
        if($request->password == $request->cpassword){
            $user = User::where('remember_token', '=', $token)->first();
            $user->password = Hash::make($request->password);
            $user->remember_token= Str::random(30);
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();

            return redirect(url(''))->with('success', "Password successfully reset");
        }
        else{
            return redirect()->back()->with('error', "Password and confirm password does not match");
        }
    }
    // ...........USER OR CITIZEN PART
}
