<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{
    use HasFactory;

    protected $table = 'page';

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord(){
        return self::select('page.*')->get();
    }

    public function getImage(){
        if(!empty($this->image_name) && file_exists('upload/pages/'.$this->image_name)){
            return url('upload/pages/'.$this->image_name);
        }
        else{
            return "";
        }
    }
}
