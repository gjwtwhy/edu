<?php

namespace app\three\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;
use app\three\model\AContract as ContractModel;

class Contract extends Command
{
    protected function configure()
    {
        // 指令配置
        $this->setName('contract');
        // 设置参数
        
    }

    protected function execute(Input $input, Output $output)
    {
    	// 指令输出
        //得到一年的每一天日期
        $dateArr = [];
        $start_time = strtotime('2019-01-01');
        $end_time = strtotime('2019-01-01');
        while ($start_time<=$end_time){
            $dateArr[] = date("Y-m-d",$start_time);
            $start_time += 24*60*60;
        }

        //获取销售人员列表
        $sale_ids = [1,2,3];
        $list = [];
        foreach ($dateArr as $kk=>$date) {
            $y = date("Y",strtotime($date));
            $m = date("m",strtotime($date));
            $d = date("d",strtotime($date));
            foreach ($sale_ids as $k => $v) {
                $data = [];
                $data['c_no'] = $v.'_'.$this->str_rand(6);
                $data['price'] = rand(100,100000);
                $data['saler_id'] = $v;
                $data['product_id'] = rand(1,3);
                $data['pay_id'] = rand(1,3);
                $data['log_id'] = rand(1,3);
                $data['y'] = $y;
                $data['m'] = $m;
                $data['d'] = $d;
                $data['create_time'] = mktime(0,0,0,$m,$d,$y);
                $list[] = $data;
            }
        }

        $objc = new ContractModel();
        $objc->saveAll($list);

    	$output->writeln('contract');
    }

    /**
     * 随机字符串生成
     * @param $len
     * @return string
     */
    private function str_rand($len){
        $char='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for($i=0;$i<$len;$i++){
            $string.=$char[mt_rand(0,strlen($char)-1)];
        }
        return $string;
    }
}
