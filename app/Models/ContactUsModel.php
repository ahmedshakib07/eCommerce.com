<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ContactUsModel extends Model
{
    use HasFactory;

    protected $table = 'contact_us';

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord(){ 
        $return = self::select('contact_us.*');

        if (!empty(Request::get('id'))) {
            $return = $return->where('id', '=', Request::get('id'));
        }
        if (!empty(Request::get('phone'))) {
            $return = $return->where('phone', 'like', '%'.Request::get('phone').'%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%'.Request::get('email').'%');
        }
        if (!empty(Request::get('from_date'))) {
            $return = $return->whereDate('cteated_at', '>=', Request::get('from_date'));
        }
        if (!empty(Request::get('to_date'))) {
            $return = $return->whereDate('cteated_at', '<=', Request::get('to_date'));
        }


        $return = $return->orderBy('contact_us.id', 'desc')
                    ->paginate(10);

        return $return;
    }

    public function getUser(){
        return $this->belongsTo(user::class, 'user_id');
    }

}
