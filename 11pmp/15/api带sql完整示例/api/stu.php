<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/2
 * Time: 8:53
 */

include 'api.php';
//接收参数
$params = $_REQUEST;
//验证签名
if (api::check($params)==false){
    api::Response(0,'验证签名失败');
}

include "db.php";
$objDb = new db();
//列表
if ($params['a']=='list'){
   $list = $objDb->getList();
   api::Response(1,'',$list);
}
//添加
if ($params['a']=='add'){
    $objDb->save($params);
    api::Response();
}