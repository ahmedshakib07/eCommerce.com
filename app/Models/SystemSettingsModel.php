<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSettingsModel extends Model
{
    use HasFactory;

    protected $table = 'system_settings';

    static public function getSingle(){
        return self::find(1);
    }

    public function getLogo(){
        if(!empty($this->logo) && file_exists('upload/settings/'.$this->logo)){
            return url('upload/settings/'.$this->logo);
        }
        else{
            return "";
        }
    }

    public function getFavicon(){
        if(!empty($this->favicon) && file_exists('upload/settings/'.$this->favicon)){
            return url('upload/settings/'.$this->favicon);
        }
        else{
            return "";
        }
    }

    public function getFooterIcon(){
        if(!empty($this->footer_icon) && file_exists('upload/settings/'.$this->footer_icon)){
            return url('upload/settings/'.$this->footer_icon);
        }
        else{
            return "";
        }
    }
}
