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
                ->paginate(20);

        return $return;
    }

    public function getShipping(){
        return $this->belongsTo(ShippingChargeModel::class, 'shipping_id');
    }

    public function getItem(){
        return $this->hasMany(OrderItemModel::class, 'order_id');
    }
}
