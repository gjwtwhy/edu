<?php
/**
 * 发红包保存页面
 * User: guoju
 * Date: 2019/3/7
 * Time: 15:21
 */
if ($_POST){
    //接参数
    $uid = $_POST['uid'];
    $money = $_POST['money'];
    $fen = $_POST['fen'];
    //参数验证,不能为空省
    //验证总金额不能小于 份数*0.01
    $min = $fen*0.01;
    if ($money<$min){
        echo "总金额不能低于：".$min."元";
        exit;
    }

    include 'db.php';
    $objdb = new db();
    $userinfo = $objdb->getUserInfo($uid);
    //判断用户余额是否够发红包
    if ($userinfo['money']<$money){
        echo "余额不足";
        exit;
    }
    //发送红包流程
    $objdb->send($uid,$money,$fen);
    echo "发送成功";
    exit;
}