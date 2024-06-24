<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use Auth;

class OrdersController extends Controller
{
    public function list(){
        $data['getRecord'] = OrderModel::getRecord();
        $data['header_title'] = 'Orders';
        return view('admin.orders.list', $data);
    }

    public function orders_detail($id){
        $data['getRecord'] = OrderModel::getSingle($id);
        $data['header_title'] = 'Order Detail';
        return view('admin.orders.detail', $data);
    }
}
