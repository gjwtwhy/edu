<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/3
 * Time: 13:45
 */

//echo combinatorial(10);

/**
 * 1题
 * @param $m
 * @return int
 */
function combinatorial($m){
    $t = 0;
    for ($i=0; $i <=10 ; $i++) {
        for ($j=0; $j <=5 ; $j++) {
            for ($k=0; $k <=2 ; $k++) {
                if($i*1+$j*2+$k*5==$m){
                    $t++;
                }
            }
        }
    }
    return $t;
}

//echo decimalToOctal(20);
/**
 * 2题
 * @param $n
 * @return string
 */
function decimalToOctal($n){
    $str = '';
    while ($n>0){
        $str .= $n%8;
        $n = floor($n/8);
    }
    return strrev($str);
}

echo move(1,1);
/**
 * @param $x
 * @param $y
 * @return int
 */
function move($x,$y){
    if ($x == 0 && $y == 0){
        return 0;
    } elseif ($x==0 || $y==0) {
        return 1;
    }

    return move($x, $y - 1) + move($x - 1, $y);
}