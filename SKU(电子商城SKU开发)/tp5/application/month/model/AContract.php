<?php
namespace app\month\model;

use think\Model;

class AContract extends Model
{
    protected $autoWriteTimestamp = true;

    public function getPriceAttr($value){
        $v = $value/100;
        return $v;
    }

    public function product()
    {
        return $this->hasOne('AProduct','id','product_id');
    }

    public function pay()
    {
        return $this->hasOne('APayment','id','pay_id');
    }
    public function log()
    {
        return $this->hasOne('ALogistics','id','log_id');
    }
    public function sale()
    {
        return $this->hasOne('ASaler','id','saler_id');
    }
}