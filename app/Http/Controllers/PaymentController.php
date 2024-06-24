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
use App\Models\User;
use Cart;
use Hash;
use Auth;

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

        // dd($request->all());

        $validate = 0;
        $message = '';

        if (!empty(Auth::check())) {
            $user_id = Auth::user()->id;
        }
        else {
            
            if (!empty($request->is_create)) {
                $checkEmail = User::checkEmail($request->email);
                if (!empty($checkEmail)) {
                    $message = "This email already register please choose another";
                    $validate = 1;
                } else {
                    $save = new User;
                    $save->name = trim($request->firstName);
                    $save->email = trim($request->email);
                    $save->password = Hash::make($request->password);
                    $save->save();
    
                    $user_id = $save->id;
                }
                
            } 
            else {
                $user_id = '';
            }
        }

        if (empty($validate)) {

            $getShipping = ShippingChargeModel::getSingle($request->shipping);
            $payable_total = Cart::getSubTotal();
            $coupon_amount = 0;
            $coupon_code = '';

            if (!empty($request->coupon_code)) {
                $getCoupon = CouponCodeModel::checkCoupon($request->coupon_code);

                if (!empty($getCoupon)) {

                    $coupon_code = $request->coupon_code;
                    if($getCoupon->type == 'Amount'){
                        $coupon_amount = $getCoupon->percent_amount;
                        $payable_total = ($payable_total - $getCoupon->percent_amount);
                    }
                    else {
                        $coupon_amount = ($payable_total * $getCoupon->percent_amount)/100;
                        $payable_total = ($payable_total - $coupon_amount);
                    }
                }
            }
            // dd($payable_total);

            $shipping_amount = !empty($getShipping->price) ? $getShipping->price : 0;
            $total_amount = ($payable_total + $shipping_amount);
            // dd($request->all());

            $order = new OrderModel;

            if (!empty($user_id)) {
                $order->user_id = trim($user_id);
            } else {
                # code...
            }
            
            $order->firstName = trim($request->firstName);
            $order->lastName = trim($request->lastName);
            $order->companyName = trim($request->companyName);
            $order->country = trim($request->country);
            $order->address_one = trim($request->address_one);
            $order->address_two = trim($request->address_two);
            $order->city = trim($request->city);
            $order->state = trim($request->state);
            $order->postcode = trim($request->postcode);
            $order->phone = trim($request->phone);
            $order->email = trim($request->email);
            $order->notes = trim($request->notes);

            $order->coupon_code = trim($coupon_code);
            $order->coupon_amount = trim($coupon_amount);

            $order->shipping_id = trim($request->shipping);
            $order->shipping_amount = trim($shipping_amount);

            $order->total_amount = trim($total_amount);

            $order->payment_method = trim($request->payment_method);        
            $order->save();

            foreach(Cart::getContent() as $key => $cart){
                // dd($cart);
                
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
            $json['status'] = true;
            $json['message'] = "Order placed";
            $json['redirect'] = url('checkout/payment?order_id='.base64_encode($order->id));;
        }
        else {
            $json['status'] = false;
            $json['message'] = $message;
        }
        // return redirect()->back()->with('success', 'Your order has been placed!');
        // die;
        echo json_encode($json);
    }

    public function checkout_payment(Request $request) {
        if (!empty(Cart::getSubTotal()) && !empty($request->order_id)) {
            $order_id = base64_decode($request->order_id);
            $getOrder = OrderModel::getSingle($order_id);

            if (!empty($getOrder)) {
                if ($getOrder->payment_method == 'cash') {
                    $getOrder->is_payment = 1;
                    $getOrder->save();

                    Cart::clear();
                    return redirect('cart')->with('success', "Order Successfully Placed");
                }
                // elseif ($getOrder->payment_method == 'bkash') {
                //     # code...
                // }
                elseif ($getOrder->payment_method == 'paypal') {

                    $query                  = array();
                    $query['business']      = "receivepayment@business.com";
                    $query['cmd']           = '_xclick';
                    $query['item_name']     = "eCommerce_com";
                    $query['no_shipping']   = '1';
                    $query['item_number']   = $getOrder->id;
                    $query['amount']        = $getOrder->total_amount;
                    $query['currency_code'] = 'USD';

                    $query['cancel_return'] = url('checkout');
                    $query['return']        = url('paypal/success-payment');
                    
                    $query_string           = http_build_query($query);

                    header('Location: https://www.sandbox.paypal.com/cgi-bin/webscr?' . $query_string);
                    
                    // LIVE.....
                    // header('Location: https://www.paypal.com/cgi-bin/webscr?'.$query_string);

                    exit();
                }
                elseif ($getOrder->payment_method == 'stripe') {
                    # code...
                }
            } else {
                abort(404);
            }
            
        } else {
            abort(404);
        }
        
    }

    public function paypal_success_payment(Request $request){
        dd($request->all());
        // !empty($request->item_number) && !empty($request->st) && $request->st == 'Completed'
        if (!empty($request->PayerID)) {
            $getOrder = OrderModel::getSingle($request->PayerID); // PayerID এর জাগায় item_number হবে

            dd($getOrder);
            if (!empty($getOrder)) {
                $getOrder->is_payment           = 1;
                // $getOrder->transection_id    = $request->tx;
                // $getOrder->payment_data         = json_encode($request->all());
                $getOrder->save();

                Cart::clear();
                return redirect('cart')->with('success', "Order Successfully Placed");
            } else {
                abort(404);
            }
            
            
        } else {
            abort(404);
        }
        
    }
}
