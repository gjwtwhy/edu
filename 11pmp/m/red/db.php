<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/7
 * Time: 14:52
 */
class db{
    private $_db;
    public function __construct()
    {
       $this->_db = new PDO("mysql:host=localhost;dbname=07b;charset=utf8","root","");
    }

    /**
     * 获取用户信息
     * @param $uid
     */
    public function getUserInfo($uid){
        $sql = "select * from user where id=".$uid;
        return $this->_db->query($sql)->fetch();
    }

    /**
     * 发红包
     * @param $uid
     * @param $money
     * @param $fen
     */
    public function send($uid,$money,$fen){
        //向红包表添加记录
        $sql = "insert into red(id,uid,money,fen,left_fen) VALUES (null,$uid,$money,$fen,$fen)";
        $this->_db->exec($sql);
        $redid = $this->_db->lastInsertId();
        //计算每一份
        $list = $this->_domoney($money,$fen);
        //向log表添加数据
        foreach ($list as $k=>$m){
            $sql = "insert into log(id,uid,redid,money) VALUES(null,$uid,$redid,$m)";
            $this->_db->exec($sql);
        }
        //减用户余额
        $sql = "update user set money=money-$money where id=".$uid;
        $this->_db->exec($sql);
        return true;
    }

    /**
     * 红包算法
     */
    private function _domoney($m,$n){
        //限制
        if ($m<$n*0.01){
            return false;
        }
        //只有一个红包
        if ($n==1){
            return [$m];
        }

        $list = [];
        $max = ($m/$n)*2;//最大不能超过的金额
        $min = 0.01;
        for ($i=$n;$i>0;$i--){
            if ($i == 1){
                $list[] = $m;
                continue;
            }

            //每一份的最大值
            $_max = $m-($i-1)*0.01;
            if ($_max > $max){
                $_max = $max;
            }

            //每一份的最小值
            $_min = $m-($i-1)*$max;
            if ($_min<$min){
                $_min = $min;
            }

            $money = rand($_min*100,$_max*100);
            $money = round($money/100,2);
            $list[] = $money;

            $m = round($m-$money,2);
        }
        return $list;
//        if ($fen==1){
//            $list[] = $money;
//            return $list;
//        }
//        $min = 0.01;
//        $max = ($money/$fen)*2;
//        $value = rand($min,$max);//一份
//        $list[] = $value;
//        //
//        $left_money = $money-$value;
//        $left_fen = $fen-1;
//        return $this->_domoney($left_money,$left_fen,$list);
    }

    /**
     * 获取红包表数据
     */
    public function getRedList(){
        $sql = "select * from red order by id desc";
        return $this->_db->query($sql)->fetchAll();
    }

    /**
     * log
     * @param $uid
     * @param $redid
     */
    public function checkUserRed($uid,$redid){
        $sql = "select * from log where redid=$redid and getuid=$uid";
        return $this->_db->query($sql)->fetch();
    }

    /**
     * 获取单条红包信息
     * @param $redid
     */
    public function getRedInfo($redid){
        $sql = "select * from red where id=".$redid;
        return $this->_db->query($sql)->fetch();
    }

    /**
     * 抢红包
     * @param $uid 抢的人
     * @param $redid
     */
    public function qiang($uid,$redid){
        //找到一条未抢数据
        $sql = "select * from log where redid=$redid and status=0 limit 1";
        $one = $this->_db->query($sql)->fetch();
        $money = $one['money'];
        //修改该条数据抢购人和状态，抢购时间
        $sql = "update log set status=1,getuid=$uid,gettime=".time()." where id=".$one['id'];
        $this->_db->exec($sql);
        //增加uid的余额
        $sql = "update user set money=money+$money where id=".$uid;
        $this->_db->exec($sql);
        //redid 剩余份数-1
        $sql = "update red set left_fen = left_fen-1 where id=".$redid;
        $this->_db->exec($sql);
        return $money;
    }
}