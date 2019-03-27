<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/27
 * Time: 10:59
 */
//$a = "ABC";
//$b = &$a;
//unset($a);
//echo $b;//"ABC"
//$a = "EFG";
//echo $b;//"EFG,"

//$a = [
//    [
//        'value'=>1,
//        'label'=>'张三'
//    ]
//];
//foreach ($a as $k => &$v) {
//    $v['pid']=0;
//}

//function test(&$a){
//    $a = $a+100;
//}
//$b = 1;
//echo $b;//1
//echo "<br/>";
//test($b);
//echo "<br/>";
//echo $b;//

//function a(&$b){
//    $b++;
//}
//
//$c = 0;
//call_user_func_array('a',array(&$c));
//echo $c;

//function &test(){
//    static $b=0;
//    $b=$b+1;
//    echo $b;
//    return $b;
//}
////$a = test();
////$a = 6;
////$a = test();
////exit;
//$a = &test();
//$a = 5;
//$a = test();

$a = array();
$array = [
    "foo" => "bar",
    "bar" => "foo",
];

$array = [
    0=>['foo'=>['a'=>'v']],
    1=>['bar'=>"foo"]
];
//print_r($array);

foreach ($array as $k=>$v){
    echo "----\r\n";
    echo $k;
    print_r($v);
    foreach ($v as $kk => $vv) {
        print_r($vv);
    }
}
