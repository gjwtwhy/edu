<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/27
 * Time: 15:48
 */
class Api{
    private static $_token = "abcd";
    public static function checkSign($params){
        //1,先验证参数
        if (!isset($params['sign'])){
            return false;
        }
        $sign = $params['sign'];
        //2,所有参数
        unset($params['sign']);
        //3,去空值
        foreach ($params as $k => $v) {
            if (empty($v)){
                unset($params[$k]);
            }
        }
        //4,字典性排序
        ksort($params);
        //5.转换成字符串格式 a=456&b=123
        $str = http_build_query($params);
//        $a = [];
//        foreach ($params as $kk => $vv) {
//            $a[] = $kk.'='.$vv;
//        }
//        $str = implode('&',$a);
        //6,拼接token
        $str = $str.self::$_token;
        //7,md5
        $_sign = md5($str);
        //8,比对
        if ($sign==$_sign){
            return true;
        }
        return false;
    }

    public static function response($data=[],$status=200,$message=''){
        echo json_encode([
            'status'=>$status,
            'message'=>$message,
            'data'=>$data,
        ]);
        exit;
    }
}