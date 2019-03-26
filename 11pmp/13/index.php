<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/25
 * Time: 14:55
 */
echo decbin(99);
exit;
echo 1010;
echo "<br/>";
echo 101;
echo "<br/>";
echo 5 >> 1;
//echo 1010;
exit;
echo 10 ^ 5;exit;
//$a = 1^3;
//$b = (1 & 3) << 1;
//echo $a + $b;
//exit;
//echo "1:".decbin(1);
//echo "<br/>";
//echo "2:".decbin(2);
//echo "<br/>";
//echo "3:".decbin(3);
//echo "<br/>";
//echo "4:".decbin(4);
//echo "<br/>";
//echo "5:".decbin(5);
//
////echo 0000 0101 ^0000 0100= 0000 1111;
//echo "<br/>";
//echo sum2(5);

function sum2($n){
    $sum = 0;
    //return $n>1?$sum=$n+sum2($n-1):1;
    $n>=1 && $sum = $n+sum2($n-1);
    return $sum;
}

echo Sum_Solution(3,1);

function Sum_Solution($a, $b){
    if ($b==0) return $a;
    $sum = $a ^ $b;//取的不进位加和
    $carry = ($a & $b) << 1;//进位结果
    return Sum_Solution($sum,$carry);
}
?>
