<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/3
 * Time: 11:31
 */
namespace app\models;
class NewsModel extends DBHelp{
    public function getNewsAll(){
        $sql = "select * from news";
        return $this->select($sql);
    }

    public function getNewsById($id){
        $sql = "select * from news where id=$id";
        return $this->select($sql);
    }

    public function setClicksById($id){
        $sql = "update news set click=click+! where id=$id";
        return $this->save($sql);
    }
}