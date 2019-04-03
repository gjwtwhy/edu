<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/3
 * Time: 9:53
 */
$m = refresh(20);
echo a(20);
/**
 * 1题-递归
 * @param $m
 * @return float
 */
function refresh($m){
    $p= floor($m/2);
    //空瓶数量
    $e = $p;
    //瓶盖数量
    $g = $p;
    $t = ref($e,$g,$p);
    return $t;
}
function ref($e,$g,$t){
    $ep = floor($e/2);
    $gp = floor($g/4);
    $t += $ep;
    $t += $gp;

    $e1 = $e%2;
    $g1 = $g%4;
    $e = $ep+$gp+$e1;
    $g = $ep+$gp+$g1;

    if ($e>1 || $g>3){
        return ref($e,$g,$t);
    } else {
        return $t;
    }
}

/**
 * 1题-非递归
 * @param $m
 * @return int
 */
function a($m){
    $kp = $g = $p = 0;
    for ($i=$m/2;$i>0;$i--){//喝掉一瓶
        $kp++;
        $g++;
        while ($kp>=2){
            $kp-=2;
            $i++;
        }
        while ($g>=4){
            $g-=4;
            $i++;
        }
        $p++;
    }
    return $p;
}

//echo binaryToDecimal('100');
/**
 * 2题
 * @param $n
 * @return float|int
 */
function binaryToDecimal($n){
    $len = strlen($n);
    ///$str = strrev($n);
    $return = 0;
//    for ($i=$len-1;$i>=0;$i--){
//        $a = pow(2,$i);
//        $return += $str[$i]*$a;
//    }
    for ($i=0;$i<$len;$i++){
        $a = pow(2,$len-$i-1);
        $return += $n[$i]*$a;
    }
    return $return;
}

echo climbTheStairs(10);
/**
 * 3题 递归
 * @param $n
 * @return int
 */
function climbTheStairs($n){
    if ($n==1){
        return 1;
    }
    if ($n==2){
        return 2;
    }
    if ($n==3){
        return 4;
    }
    return climbTheStairs($n-1)+climbTheStairs($n-2)+climbTheStairs($n-3);
}

/**
 * 3题非递归
 * @param $n
 * @return mixed
 */
function climbTheStairs2($n){
    $list = [1,2,4];
    for ($i=3;$i<$n;$i++){
        $list[] = $list[$i-1]+$list[$i-2]+$list[$i-3];
    }

    return $list[$n-1];
}

