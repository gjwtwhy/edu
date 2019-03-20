<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/20
 * Time: 13:58
 */

$time = time();
$time = $time*1000;
echo json_encode(['time'=>$time]);