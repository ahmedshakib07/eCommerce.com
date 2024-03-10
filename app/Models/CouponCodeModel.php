<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponCodeModel extends Model
{
    use HasFactory;

    protected $table = 'coupon_code';

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord(){ 
        return self::select('coupon_code.*')
                    ->where('coupon_code.is_delete', '=', 0)
                    ->orderBy('coupon_code.id', 'desc')
                    ->paginate(10);
    }

    static public function checkCoupon($coupon_code){ 
        return self::select('coupon_code.*')
                    ->where('coupon_code.is_delete', '=', 0)
                    ->where('coupon_code.status', '=', 0)
                    ->where('coupon_code.name', '=', $coupon_code)
                    ->where('coupon_code.exper_date', '>=', date('y-m-d'))
                    ->first();
    }
}
