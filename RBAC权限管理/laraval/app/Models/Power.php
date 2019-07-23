<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    //
    protected $table = 'power';

    //处理菜单层级展示
    public function getMenu($powerIds){
        //根据权限ID权限表获取权限列表信息
        $list = self::find($powerIds)->toArray();
        //递归处理层级展示
        $arr = $this->digui($list,0);

        return $arr;
    }

    /**
     * 递归处理数据结构
     * @param $list
     * @param $pid
     */
    public function digui($list,$pid){
        $arr = [];
        foreach ($list as $k=>$v) {
            if ($v['pid'] == $pid){
                $v['child'] = $this->digui($list,$v['id']);
                $arr[] = $v;
            }
        }
        return $arr;
    }
}
