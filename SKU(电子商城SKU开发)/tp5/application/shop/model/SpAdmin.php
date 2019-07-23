<?php
namespace app\shop\model;

use think\Model;
use app\shop\model\SpAdminRole;
use app\shop\model\SpRolePower;
use app\shop\model\SpPower;
class SpAdmin extends Model
{
    public function login($username, $pwd){
        //1查询用户表
        $userInfo = $this->where(['username'=>$username,'pwd'=>$pwd])->find();
        if (!$userInfo){
            return false;
        }

        //2查询用户-角色关系表
        $roleIds = SpAdminRole::where('uid',$userInfo['id'])->column('role_id');
        //3查询权限ID-角色权限关系表
        $powerIds = SpRolePower::where([['role_id','in',$roleIds]])->column('power_id');
        //4查询权限信息
        $powerList = SpPower::where([['id','in',$powerIds]])->column('ca');

        return ['user'=>$userInfo->toArray(),'power'=>$powerList,'power_ids'=>$powerIds];
    }
}