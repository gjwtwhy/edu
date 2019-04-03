<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/3
 * Time: 11:34
 */
namespace app\controllers;
use app\models\NewsModel;
class NewsController{
    private $_objNews;
    public function __construct()
    {
        $this->_objNews = new NewsModel();
    }

    public function newsList(){
        $list = $this->_objNews->getNewsAll();
        return view('list',['list'=>$list]);
    }


}