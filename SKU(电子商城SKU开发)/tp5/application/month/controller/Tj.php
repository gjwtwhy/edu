<?php
namespace app\month\controller;

use think\Controller;
use app\month\model\AContract;

class Tj extends Controller
{
    /**
     * 根据选择月份统计销售业绩最好的业务人员前3名排行榜并显示
     */
    public function one(){
        $list = AContract::where(['y'=>2019,'m'=>5])
            ->alias('c')
            ->field('c.saler_id,s.name,sum(c.price) as price')
            ->join('a_saler s','s.id = c.saler_id')
            ->group('saler_id')
            ->select()->toArray();

        return view('one',['list'=>$list]);
    }

    public function two(){
        $y = input('y');
        if (!$y) $y='2019';
        $list = AContract::where(['y'=>$y])
            ->field('m,sum(price) as price')
            ->group('y,m')
            ->select()->toArray();

        return view('two',['list'=>$list]);
    }

    public function three(){
        $y = date("Y");
        $m = date("m");
        if ($m-1==0){
            $y = $y-1;
            $m = 12;
        } else {
            $m = $m-1;
        }

        $price= AContract::where(['pay_id'=>1,'y'=>$y,'m'=>$m])->sum('price');

        return view('three',['price'=>$price]);
    }

    public function four(){
        //上周的日期
        $s= mktime(0, 0 , 0,date("m"),date("d")-date("w")-6,date("Y"));
        $e = mktime(23,59,59,date("m"),date("d")-date("w"),date("Y"));

        $list = AContract::where([['create_time','between',[$s,$e]]])
            ->alias('c')
            ->field('c.product_id,p.name,sum(c.price) as price')
            ->join('a_product p','p.id = c.product_id')
            ->group('product_id')
            ->select()->toArray();
        //echo AContract::getLastSql();exit;

        return view('four',['list'=>$list]);

    }

    public function five(){
        $m = input('m');
        if (!$m) $m = date("m");
        $list = AContract::where(['y'=>2019,'m'=>$m])
            ->alias('c')
            ->field('c.y,c.m,c.d,c.saler_id,s.name,sum(c.price) as price')
            ->join('a_saler s','s.id = c.saler_id')
            ->group('c.y,c.m,c.d,c.saler_id')
            ->order('price desc')
            ->select()->toArray();

        $date_arr = [];
        $saler_arr = [];
        $price_arr = [];

        foreach ($list as $k=>$v){
            $date = $v['y'].'-'.$v['m'].'-'.$v['d'];
            if (!in_array($date,$date_arr)){
                $date_arr[] = $date;
            }

            if (!in_array($v['name'],$saler_arr)){
                $saler_arr[] = $v['name'];
            }

            $price_arr[$date][$v['name']] = $v['price'];
        }
        return view('five',['date_arr'=>$date_arr,'saler_arr'=>$saler_arr,'price_arr'=>$price_arr]);
    }

}