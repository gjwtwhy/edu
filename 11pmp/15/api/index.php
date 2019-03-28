<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/26
 * Time: 15:48
 */
include 'Api.php';

//签名验证
if (!Api::checkSign($_REQUEST)){
    Api::response([],5000,'签名验证失败');
}

//正常业务处理
$result = [
    ['name'=>'张三','banji'=>''],
    ['name'=>'张三1','banji'=>''],
    ['name'=>'张三2','banji'=>''],
    ['name'=>'张三3','banji'=>''],
];
Api::response($result,200);