<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/3
 * Time: 11:25
 */

//注册自动加载
include 'Loader.php';
spl_autoload_register('Loader::autoload');

//接收参数
$a = $_GET['a'];
//类名
$cname = "app\controllers\NewsController";
//方法名
$aname = "news".ucfirst($a);

//实例化类
$c = new $cname();
//调用方法
$c->$aname();
