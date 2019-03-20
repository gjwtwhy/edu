<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/20
 * Time: 14:52
 */

//两家人组合
$a = ['白色','黄色'];
$b = ['XL','L'];

$arr = [];
foreach ($a as $k => $v) {
    foreach ($b as $kk => $vv) {
        $arr[] = $v.$vv;
    }
}

//多家人组合
$list = [['白色','黄色'],['XL','L'],['有袖','无袖']];
$result = mathList($list);
//var_dump($result);
function mathList($list){
    //弹出数组前两个单元
    $a = array_shift($list);
    $b = array_shift($list);

    //两家组合
    $arr = [];
    foreach ($a as $k => $v) {
        foreach ($b as $kk => $vv) {
            $arr[] = $v.$vv;
        }
    }
    //如果组合完毕
    if (empty($list)){
        return $arr;
    }

    //把组合结果压入数组头部
    array_unshift($list,$arr);
    return mathList($list);
}

//1234
$list = [[1],[2],[3],[4]];
$rs = mathList2($list);

function mathList2($list){
    //弹出数组前两个单元
    $a = array_shift($list);
    $b = array_shift($list);

    //两家组合
    $arr = [];
    foreach ($a as $k => $v) {
        foreach ($b as $kk => $vv) {
            $arr[] = $v.$vv;
            $arr[] = $vv.$v;
        }
    }

    //如果组合完毕
    if (empty($list)){
        return $arr;
    }

    //把组合结果压入数组头部
    array_unshift($list,$arr);
    return mathList2($list);
}

