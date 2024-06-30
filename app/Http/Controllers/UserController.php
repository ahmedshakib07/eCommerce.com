<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\User;
use App\Models\ProductWishlistModel;
use App\Models\ProductReviewModel;
use Auth;
use Hash;

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

        $data['showOrders'] = OrderModel::getOrderRecordUser(Auth::user()->id);
        return view('user.orders', $data);
    }

    public function orders_detail($id) {
        $data['showOrdersdetails'] = OrderModel::getSingleOrderUser(Auth::user()->id, $id);
        if (!empty($data['showOrdersdetails'])) {
            $data['meta_title'] = 'Orders Detail';
            $data['meta_description'] = '';
            $data['meta_keywords'] = '';
        } else {
            abort(404);
        }
        
        return view('user.orders_detail', $data);
    }

    public function edit_profile() {
        $data['meta_title'] = 'Edit Profile';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        $data['getUser'] = User::getSingle(Auth::user()->id);

        return view('user.edit_profile', $data);
    }

    public function update_profile(Request $request) {
        $user = User::getSingle(Auth::user()->id);

        $user->name = trim($request->Name);
        $user->lastName = trim($request->lastName);
        $user->companyName = trim($request->companyName);
        $user->country = trim($request->country);
        $user->address_one = trim($request->address_one);
        $user->address_two = trim($request->address_two);
        $user->city = trim($request->city);
        $user->state = trim($request->state);
        $user->postcode = trim($request->postcode);
        $user->phone = trim($request->phone);
        $user->email = trim($request->email);

        $user->save();

        return redirect()->back()->with('success', "Profile successfully Updated");
    }

    public function change_password() {
        $data['meta_title'] = 'Change Password';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('user.change_password', $data);
    }

    public function update_password(Request $request) {
        $user = User::getSingle(Auth::user()->id);

        if (Hash::check($request->OldPassword, $user->password)) {
            if ($request->NewPassword == $request->ConfirmPassword) {
                $user->password = Hash::make($request->password);
                $user->save();

                return redirect()->back()->with('success', "Password successfully Updated.!");
            } else {
                return redirect()->back()->with('error', "Incorrect New and old passwords must not match!");
            }
            
        }
        else {
            return redirect()->back()->with('error', "Incorrect Old Passwords must not match!");
        }
    }

    public function track_my_order() {
        $data['meta_title'] = 'Track My Order';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('user.track_my_order', $data);
    }

    public function add_to_wishlist(Request $request) {
        $check = ProductWishlistModel::checkProduct($request->product_id, Auth::user()->id);
        if(empty($check)){
            $save = new ProductWishListModel;
            $save->product_id = $request->product_id;
            $save->user_id = Auth::user()->id;
            $save->save();

            $json['is_wishlist'] = 1;
        }
        else {
            ProductWishlistModel::DeleteRecord($request->product_id, Auth::user()->id);

            $json['is_wishlist'] = 0;
        }

        $json['status'] = true;
        echo json_encode($json);

    }

    public function make_review(Request $request) {
        $save = new ProductReviewModel;

        $save->product_id = trim($request->product_id);
        $save->order_id = trim($request->order_id);
        $save->user_id = Auth::user()->id;
        $save->review = trim($request->review);
        $save->rating = trim($request->rating);

        $save->save();

        return redirect()->back()->with('success', "Thank You for Your Review.!");
    }
}
