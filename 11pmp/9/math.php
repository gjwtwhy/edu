<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/21
 * Time: 9:23
 */

$result = LastRemaining_Solution(5,3);
var_dump($result);

//1,生成列表
//2，计数器k=1
//3, 游戏开始while(){k++}
//4, 判断计数器是否和喊数相等：unset（）
//5, 游戏结束，只剩一个
function LastRemaining_Solution($n, $m){
    $list = range(1,$n);
    $num = 1;
    while (count($list)>1){
        foreach ($list as $k => $v) {
            if ($num==$m){
                unset($list[$k]);
                $num=1;
                continue;
            }
            $num++;
        }
    }
    return $list;
}

/**
 * 1,2,3,4,5
 * 3: 4,5,1,2
 * 1: 2,4,5
 * 5: 2,4,2,4,
 * 2: 4
 * @param $n
 * @param $m
 */
