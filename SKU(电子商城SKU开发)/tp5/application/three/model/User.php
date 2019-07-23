<?php

namespace app\three\model;

use think\Model;

class User extends Model
{
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;

    public function searchCityIdAttr($query,$value,$data){
        if ($value){
            $query->where('city_id','=', $value);
        }
    }

    public function getMobileAttr($value){
        if ($value){
            $mobile = substr_replace($value,'****',3,4);
            return $mobile;
        }
    }

    public function getSexAttr($value){
        $sex = [1=>'男',2=>'女'];
        return $sex[$value];
    }

    public function setSexAttr($value){
        $sex = ['男'=>1,'女'=>2];
        if (isset($sex[$value])){
            return $sex[$value];
        }
    }

    public function city(){
        return $this->hasOne('City','id','city_id');
    }
}
