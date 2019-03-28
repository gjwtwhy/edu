<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/27
 * Time: 14:05
 */


$data = json_encode(['status'=>200]);
$callback = $_GET['callback'];
echo "$callback($data)";
exit;