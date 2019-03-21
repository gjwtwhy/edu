<?php
/**
 * url: /api/user.php
 * get: 获取用户列表
 * post: 添加用户数据
 * put: 修改用户信息
 * delete: 删除用户信息
 * User: guoju
 * Date: 2019/3/21
 * Time: 10:26
 */

include 'eb/Model.php';
include "model/EbUser.php";

$method = $_SERVER['REQUEST_METHOD'];
$m = strtolower($method);
$m = "user".ucfirst($m);
$list = $m();

/**
 * 列表
 */
function userGet(){
    $objUser = new EbUser();
    $list = $objUser->select();
    return $list;
}

/**
 * 添加
 */
function userPost(){
    //接收参数
    $data = $_POST;
    //参数验证
    //数据库处理
    $objUser = new EbUser();
    $objUser->add($data);
    return "post";
}

/**
 * 修改
 */
function userPut(){
    $id = $_GET['id'];

}

/**
 * 删除
 */
function userDelete(){
    $id = $_GET['id'];
    $objUser = new EbUser();
    $objUser->delete($id);
    return "delete";
}