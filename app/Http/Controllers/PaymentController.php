<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\CouponCodeModel;
use App\Models\ShippingChargeModel;
use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\ColorModel;
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

        // dd($request->all());

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

        // echo $getProduct->id;
        // dd(Cart::get($getProduct->id));

        return redirect()->back();
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
            // $json['message'] = "Please Enter Your Coupon Code!";
        }
        echo json_encode($json);
    }

    public function placeOrder(Request $request){

        dd($request->all());
        
        $order = new OrderModel;
        $order->firstName = trim($request->firstName);
        $order->lastName = trim($request->lastName);
        $order->companyName = trim($request->companyName);
        $order->country = trim($request->firstName);
        $order->address_one = trim($request->address_one);
        $order->address_two = trim($request->address_two);
        $order->city = trim($request->city);
        $order->state = trim($request->state);
        $order->postcode = trim($request->postcode);
        $order->phone = trim($request->phone);
        $order->email = trim($request->email);
        $order->notes = trim($request->notes);
        $order->discountCode = trim($request->discountCode);
        $order->shipping_id = trim($request->shipping);
        $order->payment_method = trim($request->payment_method);        
        $order->save();

        foreach(Cart::getContent() as $key => $cart){
            dd($cart);
            
            $order_item = new OrderItemModel;
            $order_item->order_id = $order->id;
            $order_item->product_id = $cart->id;
            $order_item->quantity = $cart->quantity;
            $order_item->price = $cart->price;

            $color_id = $cart->attributes->color_id;
            if (!empty($color_id)) {
                $getColor = ColorModel::getSingle($color_id);
                $order_item->color_name = $getColor->name;
            }

            $size_id = $cart->attributes->size_id;
            if (!empty($size_id)) {
                $getSize = ProductSizeModel::getSingle($size_id);
                $order_item->size_name = $getSize->name;
                $order_item->size_amount = $getSize->price;
            }

            $order_item->total_price = $cart->price;
            $order_item->save();
            
        }
    }
}
