<?php

namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    //
    public function login($username,$pwd){
       // $objU = new Admin();
        $list = $this->where("(username = '$username' or email = '$username' or mobile = '$username') and pwd='$pwd'")->select()->toArray();
       //echo $objU->getLastSql();exit;
        return $list;
    }
}
