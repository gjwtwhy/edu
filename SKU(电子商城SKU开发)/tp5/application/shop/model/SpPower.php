<?php
namespace app\shop\model;

use think\Model;

class SpPower extends Model
{
    public function getTreeList($list, $pid){
        $tree = [];
        foreach ($list as $k=>$v) {
            if ($v['pid'] == $pid){
                $v['child'] = $this->getTreeList($list,$v['id']);
                $tree[] = $v;
            }
        }

        return $tree;
    }
}