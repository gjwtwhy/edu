<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/19
 * Time: 10:46
 */
class Db{
    private static $_instance = null;
    private static $_pdo = null;
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

    /**
     * 数据库连接
     * @return null|PDO
     */
    public static function connect(){
        if (self::$_pdo == null){
            self::$_pdo = new PDO("mysql:host=localhost;dbname=08b;charset=utf8","root","");
        }
        return self::$_pdo;
    }
}