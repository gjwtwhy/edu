<?php

namespace App\Http\Controllers\Three;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'passwd'=>'required'
        ],[
            'username.required'=>'用户名不能为空',
            'passwd.required'=>'密码不能为空'
        ]);

        $info = Admin::where(['username'=>$request->post('username'),'passwd'=>$request->post('passwd')])->first();
        if ($info){
            $u = [];
            $u['id'] = $info->id;
            $u['username'] = $info->username;
            session(['user'=>$u]);
            return redirect('/admin');
        } else {
            return redirect('/login');
        }

    }
}
