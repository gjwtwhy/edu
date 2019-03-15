<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/15
 * Time: 15:35
 */
include 'Db.php';
$objDb = Db::getInstance();
$list = $objDb->table('stu')->select();
var_dump($list);exit;