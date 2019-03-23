<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/23
 * Time: 9:16
 */
//1道题
$arr = [1,2,3,4];
$list = mathOne($arr);
$num = count($list);
//var_dump($list);
function mathOne($arr){
    $len = count($arr);
    $result = [];

    for ($i=0;$i<$len;$i++){
        for ($j=0;$j<$len;$j++){
            for ($k=0;$k<$len;$k++){
                if ($arr[$i]!=$arr[$j] && $arr[$j]!=$arr[$k] && $arr[$i]!=$arr[$k]){
                    $result[] = $arr[$i].$arr[$j].$arr[$k];
                }
            }
        }
    }

    return $result;
}

//2道题-单例
class Db{
    private static $_instance = null;
    private function __construct()
    {
    }
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
    public static function getInstance(){
        if (!(self::$_instance instanceof Db)){
            self::$_instance = new Db();
        }

        return self::$_instance;
    }
}
//4, 路径比对
//思路：按斜杠分割转数组，数组内依次比较
$aPath = "/a/b/c/d/e/a.php";
$bPath = "/a/b/c/d/e/a.html";
$result = findCommonPath($aPath,$bPath);
//var_dump($result);
function findCommonPath($aPath,$bPath){
    $result = [];
    $aPathArr = explode('/',$aPath);
    $bPathArr = explode('/',$bPath);
    //为什么要计算长度
    $len = count($aPathArr)>count($bPathArr)?count($bPathArr):count($aPathArr);

    for ($i=0;$i<$len;$i++){
        if ($aPathArr[$i]==$bPathArr[$i]){
            $result[] = $aPathArr[$i];
        } else {
            break;
        }
    }

    //str
    $str = implode('/',$result);
    return $str;
}

//4题文件夹
$dir = 'D:\work\beijing\08b';
my_dir($dir);
function my_dir($dir){
    $handle = opendir($dir);
    while (($file=readdir($handle))!==false){
        if ($file=='.' || $file=='..'){
            continue;
        }

        $filePath = $dir.'/'.$file;//路径+文件名
        if (is_dir($filePath)){
            my_dir($filePath);
        } else{
            echo $filePath."\r\n";
        }
    }
    closedir($handle);
}

//5题：
