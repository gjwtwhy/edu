<?php

/**
 * 脚本：修改商品状态
 */
namespace app\three\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;
use app\three\model\Goods as Mgoods;

class Goods extends Command
{
    protected function configure()
    {
        // 指令配置
        $this->setName('goods');
        // 设置参数
        
    }

    protected function execute(Input $input, Output $output)
    {
    	//先从消息队列读取要下架的商品信息

        //2拿到商品ID，对商品状态进行修改
        $good_id = [1,2,3];
        Mgoods::where([['id','in',$good_id]])->update(['status'=>2]);

    	$output->writeln('修改成功');
    }
}
