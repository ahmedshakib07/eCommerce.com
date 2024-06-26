<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use Auth;

class UserController extends Controller
{
    public function dashboard() {
        $data['meta_title'] = 'Dashboard';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        $data['TotalOrder'] = OrderModel::getTotalOrderUser(Auth::user()->id);
        $data['TotalAmount'] = OrderModel::getTotalAmountUser(Auth::user()->id);

        $data['UserPendingOrders'] = OrderModel::getStatusUser(Auth::user()->id, 0);
        $data['UserOrdersInProgress'] = OrderModel::getStatusUser(Auth::user()->id, 1);
        $data['UserCompletedOrders'] = OrderModel::getStatusUser(Auth::user()->id, 2);
        // $data['UserTotalAmount'] = OrderModel::getStatusUser(Auth::user()->id, 3);
        $data['UserCancelledOrders'] = OrderModel::getStatusUser(Auth::user()->id, 4);

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
