<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class OrderModel extends Model
{
    use HasFactory;

    protected $table = 'orders';

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord(){
        $return = OrderModel::select('orders.*');
        if (!empty(Request::get('id'))) {
            $return = $return->where('id', '=', Request::get('id'));
        }
        if (!empty(Request::get('order_number'))) {
            $return = $return->where('order_number', 'like', '%'.Request::get('order_number').'%');
        }
        if (!empty(Request::get('phone'))) {
            $return = $return->where('phone', 'like', '%'.Request::get('phone').'%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%'.Request::get('email').'%');
        }
        if (!empty(Request::get('city'))) {
            $return = $return->where('city', 'like', '%'.Request::get('city').'%');
        }
        if (!empty(Request::get('from_date'))) {
            $return = $return->whereDate('cteated_at', '>=', Request::get('from_date'));
        }
        if (!empty(Request::get('to_date'))) {
            $return = $return->whereDate('cteated_at', '<=', Request::get('to_date'));
        }

        $return = $return->where('is_payment', '=', 1)
                ->where('is_delete', '=', 0)
                ->orderBy('id', 'desc')
                ->paginate(10);

        return $return;
    }

    public function getShipping(){
        return $this->belongsTo(ShippingChargeModel::class, 'shipping_id');
    }

    public function getItem(){
        return $this->hasMany(OrderItemModel::class, 'order_id');
    }

    static public function getTotalOrder(){
        return self::select('id')
                ->where('is_payment', '=', 1)
                ->where('is_delete', '=', 0)
                ->count();

    }

    static public function getNewOrder(){
        return self::select('id')
                ->where('is_payment', '=', 1)
                ->where('is_delete', '=', 0)
                ->whereDate('created_at', '=', date('Y-m-d'))
                ->count();

    }

    static public function getTotalAmount(){
        return self::select('id')
                ->where('is_payment', '=', 1)
                ->where('is_delete', '=', 0)
                ->sum('total_amount');

    }

    static public function getTodayPayment(){
        return self::select('id')
                ->where('is_payment', '=', 1)
                ->where('is_delete', '=', 0)
                ->whereDate('created_at', '=', date('Y-m-d'))
                ->sum('total_amount');

    }

    static public function getLatestOrders(){
        return OrderModel::select('orders.*')
                ->where('is_payment', '=', 1)
                ->where('is_delete', '=', 0)
                ->orderBy('id', 'desc')
                ->limit(10)
                ->get();
    }

    static public function getTotalOrderMonth($start_date, $end_date){
        return self::select('id')
                ->where('is_payment', '=', 1)
                ->where('is_delete', '=', 0)
                ->whereDate('created_at', '>=', $start_date)
                ->whereDate('created_at', '<=', $end_date)
                ->count();
    }

    static public function getTotalAmountMonth($start_date, $end_date){
        return self::select('id')
                ->where('is_payment', '=', 1)
                ->where('is_delete', '=', 0)
                ->whereDate('created_at', '>=', $start_date)
                ->whereDate('created_at', '<=', $end_date)
                ->sum('total_amount');
    }



    // For User Part

    static public function getTotalOrderUser($user_id){
        return self::select('id')
                ->where('is_payment', '=', 1)
                ->where('user_id', '=', $user_id)
                ->where('is_delete', '=', 0)
                ->count();

    }

    static public function getTotalAmountUser($user_id){
        return self::select('id')
                ->where('is_payment', '=', 1)
                ->where('user_id', '=', $user_id)
                ->where('is_delete', '=', 0)
                ->sum('total_amount');

    }

    static public function getStatusUser($user_id, $status){
        return self::select('id')
                ->where('is_payment', '=', 1)
                ->where('user_id', '=', $user_id)
                ->where('status', '=', $status)
                ->where('is_delete', '=', 0)
                ->count();

    }

    // End User Part

}
