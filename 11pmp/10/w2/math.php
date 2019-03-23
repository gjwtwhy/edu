<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/23
 * Time: 10:27
 */

//1
$list = one(5,3);
//var_dump($list);
function one($n,$m){
    $arr = range(1,$n);
    $i = 1;
    while (count($arr)>1){
        foreach ($arr as $k => $v) {
            if ($i==$m){
                unset($arr[$k]);
                $i=1;
                continue;
            }
            $i++;
        }
    }
    return $arr;
}

//2
$arr = range(1,10);
$l = two($arr);
//var_dump($l);
function two($arr){
    rsort($arr);
    //result
    $result = [
        [array_shift($arr)],
        [array_shift($arr)],
        [array_shift($arr)],
    ];

    foreach ($arr as $k => $v) {
        $result[2][] = $v;
        //第2位的综合先和第0位的总和比较
        if (array_sum($result[2])>array_sum($result[0])){
            $c = $result[2];
            $result[2] = $result[1];
            $result[1] = $result[0];
            $result[0] = $c;
        }elseif(array_sum($result[2])>array_sum($result[1])){
            $c = $result[2];
            $result[2] = $result[1];
            $result[1] = $c;
        }
    }
    return $result;
}

//3:银行办业务，返回 用户平均等待时间
$active_time =  [9.01, 9.10, 9.20, 9.21, 9.22,9.30];
$process_time = [0.30, 0.18, 0.22, 0.47, 0.11,0.48];
echo four($active_time,$process_time);
function four($active_time,$process_time){
    $windows = [];//0=>结束时间，1=>结束时间，2=》结束时间，3=》结束时间
    $wait = 0;
    //游戏开始，银行开始进人
    foreach ($active_time as $k => $v) {
        if (count($windows)<4){
            $windows[] = $v+$process_time[$k];
        } else {
            //处理第5个人
            sort($windows);
            $min = $windows[0];
            if ($v > $min) {
                $windows[0] = $v + $process_time[$k];
            } else {
                $w = $min - $v;
                $windows[0] = $v + $w + $process_time[$k];
                $wait += $w;
            }
        }
    }
    return $wait;
}