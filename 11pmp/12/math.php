<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/26
 * Time: 10:05
 */
$a = [
    [
        '1_class'=> '工具',
        '2_class'=> '备忘录',
        '1_id'=> 1,
        '2_id'=> 2
    ],
    [
        '1_class'=> '教育',
        '2_class'=> '学历教育',
        '3_class'=> '中等',
        '1_id'=> 3,
        '2_id'=> 4,
        '3_id'=> 6
    ],
    [
        '1_class'=> '教育',
        '2_class'=> '学历教育',
        '3_class'=> '高等',
        '1_id'=> 3,
        '2_id'=> 4,
        '3_id'=> 5
    ],
    [
        '1_class'=> '教育',
        '2_class'=> '成人教育',
        '1_id'=> 3,
        '2_id'=> 7,
    ],
];

//1，先把数组处理成带PID的数据队列
$list = [];
foreach ($a as $k => $v) {
    $arr = [];
    foreach ($v as $kk => $vv) {
        $d = explode('_',$kk);
        if ($d[1]=='id'){
            $arr[$d[0]]['value'] = $vv;
        } elseif($d[1]=='class'){
            $arr[$d[0]]['label'] = $vv;
        }
        $arr[$d[0]]['pid']=$d[0]-1;
    }

    foreach ($arr as $s => $t) {
        //pid变更为pid对应的value值，如果是0的pid=0
        $t['pid'] = $t['pid']>0?$arr[$t['pid']]['value']:0;
        $list[$t['value']] = $t;
    }
}

$a = digui($list,0);
var_dump($a);
function digui($list, $pid){
    $result = [];
    foreach ($list as $k => $v) {
        if ($v['pid'] == $pid){
            $v['children'] = digui($list, $v['value']);
            $result[] = $v;
        }
    }
    return $result;
}