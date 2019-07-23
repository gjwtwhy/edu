<?php

namespace app\admin\model;

use think\Model;
use app\admin\model\MonthUserRole;
use app\admin\model\MonthRolePower;
use app\admin\model\MonthPower;

class MonthUser extends Model
{
    //登录方法
    public function login($username,$pwd){
        //用户表信息获取
        $userInfo = $this->where(['username'=>$username,'pwd'=>$pwd])->field('id,username')->find();
        if (!$userInfo){
            return false;
        }

        //用户ID-》用户角色关系表得到角色ID
        $roleIds = MonthUserRole::where(['uid'=>$userInfo['id']])->column('role_id');
        if (!$roleIds){
            return false;
        }

        //角色ID-》角色权限关系表获取权限ID
        $power_ids = MonthRolePower::where([['role_id','in',$roleIds]])->column('power_id');

        //权限ID-》权限表获取权限信息
        $pList = MonthPower::all($power_ids);
        $ca = [];
        foreach ($pList as $k=>$v){
            $ca[] = $v['c'].'/'.$v['a'];
        }

        //返回：用户信息，权限（控制器，方法名）,权限ID
        return ['user'=>$userInfo,'power'=>$ca,'p_ids'=>$power_ids];
    }
}
