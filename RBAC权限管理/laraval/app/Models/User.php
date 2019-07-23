<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserRole;
use App\Models\RolePower;
use App\Models\Power;

class User extends Model
{
    //
    protected $table = 'user';

    /**
     * 获取某用户角色权限信息
     * @param $user_id
     */
    public function getRolePower($user_id){
        //获取角色ID
        $role_ids =UserRole::where('user_id',$user_id)->pluck('role_id')->toArray();
        //获取权限ID
        $power_ids = RolePower::whereIn('role_id',$role_ids)->pluck('power_id')->toArray();
        //获取权限信息
        $power_url = Power::whereIn('id',$power_ids)->pluck('url')->toArray();

        return ['role_ids'=>$role_ids,'power_ids'=>$power_ids,'power_url'=>$power_url];
    }
}
