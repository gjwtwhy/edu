<?php
/**
 * 抢红包
 * User: guoju
 * Date: 2019/3/7
 * Time: 15:51
 */
if ($_POST){
    //接参数
    $uid = $_POST['uid'];
    $redid = $_POST['redid'];
    //参数验证

    include 'db.php';
    $objdb = new db();
    //验证该红包是否还有剩余
    $redinfo = $objdb->getRedInfo($redid);
    if ($redinfo['left_fen']==0){
        echo json_encode(['status'=>0,'message'=>'此红包已抢光']);
        exit;
    }
    //验证该用户是否已抢过此红包
    $info = $objdb->checkUserRed($uid,$redid);
    if ($info){
        echo json_encode(['status'=>0,'message'=>'用户已抢过此红包']);
        exit;
    }
    //可抢
    $money = $objdb->qiang($uid,$redid);
    echo json_encode(['status'=>1,'money'=>$money]);
    exit;
}