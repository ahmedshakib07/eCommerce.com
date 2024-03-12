<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\CouponCodeModel;
use App\Models\ShippingChargeModel;
use Cart;

class PaymentController extends Controller
{

    public function cart(Request $request){
        // dd(Cart::getContent());

        $data['meta_title'] = 'Cart';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('payment.cart', $data);
    }

    public function cartDelete($id){

        Cart::remove($id);
        return redirect()->back();
    }

    public function addToCart(Request $request){

        $getProduct = ProductModel::getSingle($request->product_id);
        $total = $getProduct->price;
        if(!empty($request->size_id)){
            $size_id= $request->size_id;
            $getSize = ProductSizeModel::getSingle($size_id);
            $size_price = !empty($getSize->price) ? $getSize->price:0;
            $total = $total + $size_price;
        }
        else{
            $size_id = 0;
        }

        $color_id = !empty($request->color_id) ? $request->color_id : 0;

        Cart::add([
            'id' => $getProduct->id,
            'name' => 'Product',
            'price' => $total,
            'quantity' => $request->qty,
            'attributes' => array(
                'size_id' => $size_id,
                'color_id' => $color_id,
            )
        ]);

        return redirect()->back();
        // dd($request->all());
    }

    public function updateCart(Request $request){
        // dd($request->all());
        foreach ($request->cart as $cart) {
            Cart::update($cart['id'], array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $cart['qty']
                ),
            ));
        }
        return redirect()->back();
    }

    public function checkout(Request $request){
        
        $data['meta_title'] = 'Checkout';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        $data['getShipping'] = ShippingChargeModel::getRecordActive();

        return view('payment.checkout', $data);
    }

    public function applyCouponCode(Request $request){
        // dd($request->all());
        $getCoupon = CouponCodeModel::checkCoupon($request->coupon_code);
        // dd($getCoupon);

        if (!empty($getCoupon)) {
            $total = Cart::getSubTotal();

            if($getCoupon->type == 'Amount'){
                $coupon_amount = $getCoupon->percent_amount;
                $payable_total = ($total - $getCoupon->percent_amount);
            }
            else {
                $coupon_amount = ($total * $getCoupon->percent_amount)/100;
                $payable_total = ($total - $coupon_amount);
            }

            $json['status'] = true;
            $json['coupon_amount'] = number_format($coupon_amount, 2);
            $json['payable_total'] = $payable_total;
            $json['message'] = "Success";
        } else {
            $json['status'] = false;
            $json['coupon_amount'] = '0.00';
            $json['payable_total'] = Cart::getSubTotal();
            $json['message'] = "Coupon Code Invalid";
        }
        echo json_encode($json);
    }
}
