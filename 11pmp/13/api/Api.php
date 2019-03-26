<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/26
 * Time: 15:41
 */
class Api{
    private static $_token = '123456';

    //签名验证
    public static function checkSign($params){
        //第一步，先验证参数内是否含有签名
        if (!isset($params['signature'])){
            return false;
        }

        //第二步：
        $sign = $params['signature'];
        //生成sign
        $_timestamp = $params['timestamp'];
        $_nonce = $params['nonce'];
        $a = [$_timestamp,$_nonce,self::$_token];
        //sort($a);
        $b = implode('',$a);
        $_sign = md5($b);

        //第三步
        if ($sign == $_sign){
            return true;
        }
        return false;
    }

    //数据返回
    public static function response($data=[],$status=200,$message=''){
        echo json_encode([
            'status'=>$status,
            'message'=>$message,
            'data'=>$data
        ]);
        exit;
    }
}