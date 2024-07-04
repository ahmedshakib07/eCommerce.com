<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsModel extends Model
{
    use HasFactory;

    protected $table = 'contact_us';

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord(){ 
        return self::select('contact_us.*')
                    ->orderBy('contact_us.id', 'desc')
                    ->paginate(10);
    }

}
