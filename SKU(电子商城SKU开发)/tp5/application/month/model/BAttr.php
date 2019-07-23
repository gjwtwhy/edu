<?php

namespace app\month\model;

use think\Model;

class BAttr extends Model
{
    //
    public function cate(){
        return $this->hasOne('BCate','id','cate_id');
    }
}
