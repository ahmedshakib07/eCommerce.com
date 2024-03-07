<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CouponCodeModel;
use Auth;

class CouponCodeController extends Controller
{
    public function list(){
        $data['getRecord'] = CouponCodeModel::getRecord();
        $data['header_title'] = 'Coupon Code';
        return view('admin.couponCode.list', $data);
    }

    public function add(){
        $data['header_title'] = 'Add New Coupon Code';
        return view('admin.couponCode.add', $data);
    }

    public function insert(Request $request){

        $couponCode = new CouponCodeModel;
        $couponCode->name = trim($request->name);
        $couponCode->type = trim($request->type);
        $couponCode->percent_amount = trim($request->percent_amount);
        $couponCode->exper_date = trim($request->exper_date);
        $couponCode->status = trim($request->status);
        $couponCode->save();

        toastr()->info('Coupon Code Created Successfully!');
        return redirect('admin/coupon_code/list');
    }

    public function edit($id){
        $data['getRecord'] = CouponCodeModel::getSingle($id);
        $data['header_title'] = 'Edit Coupon Code';
        return view('admin.couponCode.edit', $data);
    }

    public function update($id, Request $request){

        $couponCode = CouponCodeModel::getSingle($id);
        $couponCode->name = trim($request->name);
        $couponCode->type = trim($request->type);
        $couponCode->percent_amount = trim($request->percent_amount);
        $couponCode->exper_date = trim($request->exper_date);
        $couponCode->status = trim($request->status);
        $couponCode->save();

        toastr()->success('Coupon Code Updated Successfully!');
        return redirect('admin/coupon_code/list');
    }

    public function delete($id){
        $couponCode = CouponCodeModel::getSingle($id);
        $couponCode->is_delete = 1;
        $couponCode->save();

        return redirect()->back();
    }
}
