<?php

namespace app\admin\model;

use think\Model;

class Book extends Model
{
    //book_name 的搜索器
    public function searchBookNameAttr($query,$value,$data){
        $query->where('book_name','like','%'.$value.'%');
    }

    public function searchAutherAttr($query,$value,$data){
        if ($value){
            $query->where('auther','=',$value);
        }
    }

}
