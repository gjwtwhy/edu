<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/21
 * Time: 13:59
 */
class Db{
    private $_db = null;
    public function __construct()
    {
        $this->_db = new PDO();
    }

    public function getList($page){
        //计算偏移量
        $sql = "";
        //执行获取分页数据
        return ;
    }

    public function  getNum(){
        $sql = "select ";
        return ;
    }

    public function add($data){
        $sql = "";
        return ;
    }
}