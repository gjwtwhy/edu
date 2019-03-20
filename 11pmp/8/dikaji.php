<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/20
 * Time: 14:33
 */

$str = '1234';
$arr = str_split($str);

getZuhe($arr,0,count($arr)-1);

function getZuhe(&$arr, $start, $max){
    //echo $max;exit;
    if ($start == $max){
        echo join('',$arr);
        echo "<br/>";
    }

    for ($i=$start; $i<=$max; $i++){
        rev($arr[$start], $arr[$i]);
        getZuhe($arr, $start+1, $max);
        rev($arr[$start],$arr[$i]);
    }
}


function rev(&$a, &$b){
    $c = $a;
    $a = $b;
    $b = $c;
}