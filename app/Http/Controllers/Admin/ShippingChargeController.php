<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingChargeModel;
use Auth;

class ShippingChargeController extends Controller
{
    public function list(){
        $data['getRecord'] = ShippingChargeModel::getRecord();
        $data['header_title'] = 'Shipping Charge';
        return view('admin.shippingCharge.list', $data);
    }

    public function add(){
        $data['header_title'] = 'Add New Shipping Charge';
        return view('admin.shippingCharge.add', $data);
    }

    public function insert(Request $request){

        $shippingCharge = new ShippingChargeModel;
        $shippingCharge->name = trim($request->name);
        $shippingCharge->price = trim($request->price);
        $shippingCharge->status = trim($request->status);
        $shippingCharge->save();

        toastr()->info('Shipping Charge Created Successfully!');
        return redirect('admin/shipping_charge/list');
    }

    public function edit($id){
        $data['getRecord'] = ShippingChargeModel::getSingle($id);
        $data['header_title'] = 'Edit Shipping Charge';
        return view('admin.shippingCharge.edit', $data);
    }

    public function update($id, Request $request){

        $shippingCharge = ShippingChargeModel::getSingle($id);
        $shippingCharge->name = trim($request->name);
        $shippingCharge->price = trim($request->price);
        $shippingCharge->status = trim($request->status);
        $shippingCharge->save();

        toastr()->success('Shipping Charge Updated Successfully!');
        return redirect('admin/shipping_charge/list');
    }

    public function delete($id){
        $shippingCharge = ShippingChargeModel::getSingle($id);
        $shippingCharge->is_delete = 1;
        $shippingCharge->save();

        return redirect()->back();
    }
}
