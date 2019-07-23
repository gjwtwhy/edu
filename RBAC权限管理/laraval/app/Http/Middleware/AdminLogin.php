<?php

namespace App\Http\Middleware;

use Closure;
class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $loginInfo = session('user');
        if (!$loginInfo){
            return redirect('/login');
        }

        //获取session内权限信息
        $power = session('power');
        $power_url = $power['power_url'];

        //获取当前的路由地址
        $uri=$request->path();
        //判断当前uri 在不在 power_url内
        if (!in_array($uri,$power_url) && $uri!='admin'){
            echo "您没有此功能权限";
            exit;
        }

        return $next($request);
    }
}
