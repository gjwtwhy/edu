<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/2
 * Time: 8:58
 */
class db{
    private $_db = null;
    public function __construct()
    {
        $this->_db = new PDO('mysql:host=localhost;dbname=1607b','root','');
    }

    /**
     * 列表
     */
    public function getList(){
        $sql = "select * from stu order by id desc";
        return $this->_db->query($sql)->fetchAll();
    }

    /**
     * 添加
     */
    public function save($data){
        $sql = "insert into stu (id,classname,name,subject,age) VALUES (null,'{$data['classname']}','{$data['name']}','{$data['subject']}','{$data['age']}')";
        return $this->_db->exec($sql);
    }
}