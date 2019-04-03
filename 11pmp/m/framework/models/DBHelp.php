<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/3
 * Time: 11:25
 */
namespace app\models;
class DBHelp{

    private $_pdo;
    public function __construct()
    {
        $this->_pdo = new \PDO('mysql:host=localhost;dbname=08b;charset=utf8','root','');
    }

    public function add($sql){
        return $this->_pdo->exec($sql);
    }

    public function save($sql){
        return $this->_pdo->exec($sql);
    }

    public function select($sql){
        return $this->_pdo->query($sql)->fetchAll();
    }

    public function del($sql){
        return $this->_pdo->exec($sql);
    }
}