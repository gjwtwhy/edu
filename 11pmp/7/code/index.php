<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/19
 * Time: 9:01
 */
include 'model/EbUser.php';
$objUser = new EbUser();
$list = $objUser->select();
var_dump($list);exit;

//include "Model.php";
//$objModel = new Model();
//$list = $objModel->table('8b_user as u')
//    ->fields('u.username,info.name')
//    ->join('8b_user_info as info','u.id = info.uid', 'inner')
//    ->order('id','desc')->limit(10)->select();
//$objModel->table('8b_user')->add(['username'=>'hello','passwd'=>'world']);
//var_dump($list);exit;
//sql
//left join
//select * from table1 left join table2 on table1.id = table2.tid;
//select * from table1 right join table2 on table1.id = table2.tid;
//select * from table1 inner join table2 on table1.id = table2.tid;
//1, select * from table where 条件 order by 字段 desc/asc limit 数量；
//2, delete from table where 条件
//3, update 表名 set 字段=值 where 条件
//4，insert into 表名(字段) values(值)
//5, 模糊查询 where 字段 like '%值%';
//6, 分组     group by 字段
//7, 聚合函数 select count(id) from table ; sum求和, avg求平均，max(最大值),min（最小值）
//8, 多表联合操作
//   select * from table left join (左连接) right join (右连接) inner join(内连接)

//5, desc 表名(查看表结构)
//6, show create table 表名(查看表信息)
//7,

//echo "<br/>";
//$objDb1 = Db::getInstance();
//include "Model.php";
//$objModel = new Model();
//var_dump($objModel);
//$objMode2 = new Model();
//exit;
//1,去空格 str_replace
//2,大写转小写：1找大写字母；只变单字母；2全部转小写：strtolower
//3,大写前面+下划线
//4，首字母不加下划线

//1,3,2,4
//$result = mathone('Hello Wold');
//var_dump($result);
function mathOne($str){
    //去空格
    $str = str_replace(' ','', $str);
    //大写字母前加下划线
    $str2 = $str[0];
    $len = strlen($str);
    for ($i=1;$i<$len;$i++){
        $m = $str[$i];//单字母
        if (ord($m)>=65 && ord($m)<=90){
            $str2.='_'.$m;
        } else {
            $str2.=$m;
        }
    }
    //转小写
    $str2 = strtolower($str2);
    return $str2;
}

