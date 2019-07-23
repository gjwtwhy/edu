<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    /**
     * 登陆的处理流程
     * @param Request $request
     */
    public function login(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'passwd'=>'required|min:6'
        ],[
            'username.required'=>'用户名不能为空',
            'passwd.required'=>'密码不能为空',
            'passwd.min'=>'密码至少6位'
        ]);

        //1接值
        $username = $request->post('username');
        $passwd = $request->post('passwd');

        //2实例化
        $p = md5($passwd);
        //3查询用户名，密码
        $list = User::where(['username'=>$username,'passwd'=>$p])->first();
        if ($list){
            $data = [];
            $data['id'] = $list->userid;
            $data['username']=$list->username;

            //获取当前用户对应的权限信息
            $objUser = new User();
            $power = $objUser->getRolePower($list->userid);

            //写session
            session(['user'=>$data]);
            session(['power'=>$power]);
            //跳转后台
            return redirect('/admin');
        } else {
            return redirect('/login');
        }
    }
}
