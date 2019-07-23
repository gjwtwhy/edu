<?php

namespace app\admin\model;

use think\Model;

class MonthPower extends Model
{
    /**
     * 无限极分类
     * @param $list
     * @param $pid
     */
    public function getTree($list,$pid){
        $tree = [];
        foreach ($list as $k=>$v){
            if ($v['pid'] == $pid){
                $v['child'] = $this->getTree($list,$v['id']);
                $tree[] = $v;
            }
        }

        return $tree;
    }
}
