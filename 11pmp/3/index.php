<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/15
 * Time: 11:43
 */

include 'Student.php';
$obj1 = new Student('张三1',10);
$obj2 = new Student('张三2',35);
$obj3 = new Student('张三3',13);
$obj4 = new Student('张三4',16);
$obj5 = new Student('张三5',18);
$obj6 = new Student('张三6',12);
$obj7 = new Student('张三7',19);
$obj8 = new Student('张三8',29);
//
echo objSort(8);
function objSort($n){
    //全局
    for ($i=1;$i<=$n;$i++){
        $c = "obj".$i;
        global $$c;
    }

    //
    $max = 1;
    for ($i=1;$i<=$n;$i++){
        $a = "obj".$i;
        $b = "obj".$max;
        if ($$a->_age > $$b->_age){
            $max = $i;
        }
    }

    $c = "obj".$max;
    return $$c->_name;
}

/**
 * @param $arr对数组排序
 */
//var_dump(arrSort($arr));

//function arrSort($arr,$i=1,$max=1){
//    if ($i > count($arr)){
//        return $max;
//    }
//    //赋值
//    if ($arr['obj'.$i]>$arr['obj'.$max]){
//        $max = $i;
//    }
//    ++$i;
//    return arrSort($arr,$i,$max);
//}

//function arrSort($arr){
//    $num = count($arr);
//    for ($i=0; $i<$num; $i++){
//        for ($j=$i+1;$j<$num;$j++){
//            $c = $arr[$i];
//            if ($arr[$i]>$arr[$j]){
//                $arr[$i] = $arr[$j];
//                $arr[$j] = $c;
//            }
//        }
//    }
//    return $arr;
//}