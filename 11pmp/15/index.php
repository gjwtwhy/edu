<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/28
 * Time: 8:47
 */

$array = [0,1,2,3,4,5,6,7,8,9,10,11,12];
$sum = 10;
$a = FindNumbersWithSum($array,$sum);
var_dump($a);exit;
function FindNumbersWithSum($array, $sum){
    //最小值大于和
    if ($array[0]>$sum){
        return false;
    }
    //取出队列里最小数---大于和的数据
    $min = [];
    foreach ($array as $k => $v) {
        if ($v<floor($sum/2)){
            $min[] = $v;
        }
        if ($v>$sum){
            $array = array_slice($array,0,$k);
        }
    }

    //无最小数
    if (empty($min)){
        return false;
    }

    //获取组合
    $min_result = -1;
    $zuhe = '';
    foreach ($min as $kk => $vv) {
        $_max = $sum-$vv;
        if ($_max==$vv){
            continue;
        }

        if (in_array($_max,$array)){
//            $zuhe[] = $vv.','.$_max;//返回所有组合

            $cj = $vv*$_max;//乘积最小处理
            if ($min_result==-1 || $cj<$min_result){
                $min_result = $cj;
                $zuhe = $vv.','.$_max;
            }
        }
    }

    return $zuhe;
}