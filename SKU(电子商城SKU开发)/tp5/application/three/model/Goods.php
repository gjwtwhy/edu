<?php

namespace app\three\model;

use think\Model;

class Goods extends Model
{
    public function searchNameAttr($query,$value,$data){
        $query->where('name','like', '%'.$value . '%');
    }
    public function searchCatIdAttr($query,$value,$data){
        if ($value) {
            $query->where('cat_id', '=', $value);
        }
    }
    public function searchPriceAttr($query,$value,$data){
        $query->whereBetweenTime('price',$value[0],$value[1]);
    }

    public function getStatusAttr($value){
        $status = [1=>'正常',0=>'删除'];
        return $status[$value];
    }
    //
    public function gc(){
        return $this->hasOne('GoodsCategory','id','cat_id');
    }
}
