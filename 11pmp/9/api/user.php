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
$m();

/**
 * //封装接口输出方法
 * @param $data 数据
 * @param int $status 状态
 * @param string $message 错误信息
 */
function output($data, $status=200,$message=''){
    echo json_encode([
        'status'=>$status,
        'message'=>$message,
        'data'=>$data
    ]);
    exit;
}

/**
 * 列表
 */
function userGet(){
    //接收页码
    $page = isset($_GET['p'])?$_GET['p']:1;
    $pageNum = 2;
    $offset = ($page-1)*$pageNum;
    //获取数据库数据
    $objUser = new EbUser();
    $row = $objUser->fields('count(id) as num')->find();
    $totalNum = $row['num'];
    $totalPage = ceil($totalNum/$pageNum);

    //分页数据
    $list = $objUser->fields('*')->limit($pageNum,$offset)->order('id','desc')->select();

    $data = [
        'list'=>$list,
        'totalPage'=>$totalPage,
        'page'=>$page
    ];
    output($data);
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