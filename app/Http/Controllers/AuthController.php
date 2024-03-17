<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use Mail;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\RegisterMail;


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
        return redirect(url(''));
    }


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

    public function activate_email($id){
        $id = base64_decode($id);
        $user = User::getSingle($id);
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        // toastr()->info('Your Email Successfully Verifird!');
        return redirect(url(''))->with('success', "Your Email Successfully Verifird!");
    }
}
