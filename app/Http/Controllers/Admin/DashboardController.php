<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\User;
use App\Models\ProductModel;

class DashboardController extends Controller
{
    public function dashboard(){
        $data['TotalOrder'] = OrderModel::getTotalOrder();
        $data['NewOrder'] = OrderModel::getNewOrder();
        $data['TotalAmount'] = OrderModel::getTotalAmount();
        $data['TodayPayment'] = OrderModel::getTodayPayment();
        $data['UserRegistrations'] = User::getUserRegistrations();
        $data['TotalProduct'] = ProductModel::getTotalProduct();

        $data['LatestOrders'] = OrderModel::getLatestOrders();

        $data['header_title'] = "Dashboard";
        return view('admin.dashboard', $data);
    }
}
