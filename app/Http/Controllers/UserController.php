<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard() {
        $data['meta_title'] = 'Dashboard';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('user.dashboard', $data);
    }

    public function orders() {
        $data['meta_title'] = 'Orders';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('user.orders', $data);
    }

    public function edit_profile() {
        $data['meta_title'] = 'Edit Profile';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('user.edit_profile', $data);
    }

    public function change_password() {
        $data['meta_title'] = 'Change Password';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('user.change_password', $data);
    }

    public function track_my_order() {
        $data['meta_title'] = 'Track My Order';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('user.track_my_order', $data);
    }
}
