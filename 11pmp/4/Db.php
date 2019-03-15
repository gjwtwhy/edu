<?php
/**
 * 单例模式的数据库操作
 * 1，会写单例模式（三私一公）
 * 2，定义数据库连接对象
 * 3, 数据库处理
 * User: guoju
 * Date: 2019/3/15
 * Time: 15:21
 */
class Db{
    private static $_instance = null;
    private static $_db = null;

    private $_table = '';//定义表名

    private function __construct()
    {
        if (self::$_db==null){
            self::$_db = new PDO('mysql:host=localhost;dbname=1607b;charset=utf8',"root","");
        }
        return self::$_db;
        // TODO: Implement __destruct() method.
    }
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance(){
        if (!self::$_instance instanceof Db){
            self::$_instance = new Db();
        }
        return self::$_instance;
    }

    /**
     * 设置操作的数据表
     */
    public function table($table){
        $this->_table = $table;
        return $this;
    }

    public function select(){
        $sql = "select * from $this->_table";
        return self::$_db->query($sql)->fetchAll();
    }
//    public function getNews(){
//        $sql = "select * from news where order by limit ";
//        return self::$_db->query($sql)->fetchAll();
//    }
}