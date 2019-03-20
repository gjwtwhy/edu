<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/20
 * Time: 9:45
 */

$result = GetUglyNumber_Solution(9);
echo $result;

//数量：
//无限循环
//判定第几个=传的数量 return
function GetUglyNumber_Solution($index){
    $num = 1;//数量
    $value = 1;//值
    while (true){
        if ($num==$index){
            return $value;
        }

        $value++;//判定2，3, 4

        //判定是不是丑数，是 数量+1
        if (is_ugly($value)){
            $num ++;
        }

    }
}

/**
 * 判定值是不是丑数
 * @param $value
 */
function is_ugly($m){
    //对2处理
    while ($m%2==0){
        $m=$m/2;
    }
    //对3处理
    while ($m%3==0){
        $m=$m/3;
    }
    //对5处理
    while ($m%5==0){
        $m=$m/5;
    }
    if ($m==1){
        return true;
    }
    return false;
}