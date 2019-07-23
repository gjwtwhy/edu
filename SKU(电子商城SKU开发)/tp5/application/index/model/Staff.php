<?php

namespace app\index\model;

use think\Model;

class Staff extends Model
{
    public function searchYNameAttr($query,$value,$data){
        $query->where('y_name','like','%'.$value.'%');
    }
    public function searchYSexAttr($query,$value,$data){
        if ($value){
            $query->where('y_sex','=',$value);
        }
    }
    public function searchYAgeAttr($query,$value,$data){
        if ($value){
            $query->whereBetween('y_age',"$value[0],$value[1]");
        }
    }
    public function getPageList($name='',$sex,$s_age,$e_age){
        $list = Staff::withSearch(
            ['y_name','y_sex','y_age'],
            [
                'y_name'=>$name,
                'y_sex'=>$sex,
                'y_age'=>[$s_age,$e_age],
            ])->paginate(2)->toArray();
        //echo Staff::getLastSql();exit;
        return $list;
    }
}
