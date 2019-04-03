<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/3
 * Time: 11:47
 */
class Loader{
    public static function autoload($class){
        $file = __DIR__.'/'.substr($class,4).'.php';
        if (file_exists($file)){
            include $file;
        }
    }
}

function view($name,$data){
    include __DIR__.'/views/news/'.$name.'.html';
}