<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/2
 * Time: 8:52
 */
class api{
    private static $_token = 'abcdefg';//秘钥
    private static $_sign = 'sign';//协议参数名
    //验证签名
    public static function check($param){
        return true;
        //1，先验证发过来的所有参数里是否含有 签名
        if (!isset($param[self::$_sign])){
            return false;
        }
        $sign = $param[self::$_sign];//传递过来的加密后的签名字符串

        //2，签名的生成。 规则：（所有的参数按照字典性排序 拼接成字符串后 + 秘钥 并md5加密）
        unset($param[self::$_sign]);//只留具体参数
        $sign_ = self::getSign($param);

        if ($sign_ == $sign){
            return true;
        } else {
            return false;
        }
    }

    /**
     * 获取签名
     * @param $param
     * @return string
     */
    public static function getSign($param){
        //去除空值
        foreach ($param as $k=>$v){
            if (empty($v)){
                unset($param[$k]);
            }
        }
        //字典性排序
        ksort($param);//
        //等号拼接 [0=>"author=果果",1=>"title=中国",]
        $params = [];
        foreach ($param as $k => $v) {
            $params[] = $k.'='.$v;
        }
        //&拼接
        $str = implode('&',$params);
        //md5
        $sign_ = md5($str.self::$_token);
        return $sign_;
    }

    /**
     * json数据返回
     * @param $data
     * @param $status
     * @param $error
     */
    public static function Response($status=1,$error='',$data=[]){
        echo  json_encode(
            [
                'Code'=>$status,
                'Message'=>$error,
                'Data'=>$data
            ]
        );
        exit;
    }
}