<?php

namespace app\month\controller;

use think\Controller;
use think\Request;
use think\facade\Cache;
use app\month\model\BGoods;
use app\month\model\BGoodsSku;
use app\month\model\BAttrV;
use app\month\model\BAttr;

class Goods extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $list = BGoods::all();
        //
        return view('index',['list'=>$list]);
    }

    //商品详情页信息-redis
    public function detail(){
        //1接参数
        $id = input('id');//商品ID

        //2:缓存查询
        $key = 'detail_'.$id;
        if ($list = Cache::get($key)){
            $list = unserialize($list);
        } else {
            $info = BGoods::get($id);//获取1个商品信息
            //获取商品属性信息
            $attr = $this->getAttr($id);
            $list=['info'=>$info, 'attr'=>$attr];

            //写缓存
            Cache::set($key,serialize($list));
        }

        return view('detail',$list);
    }

    /**
     * 获取商品对应的属性和属性值
     * @param $id
     * @return array
     */
    private function getAttr($id){
        //1，到sku表获取该商品ID对应的所有的规格数据
        $list = BGoodsSku::where('goods_id',$id)->select()->toArray();

        //6---该商品默认显示的组合属性
        $default = [];
        $default_price = 0;
        $default_stock = 0;

        //2：获取属性值ID
        $v_ids = [];
        foreach ($list as $k => $v) {
            $vv = explode(',',$v['v_ids']);
            $v_ids = array_merge($v_ids,$vv);
            //6---个商品只有一个默认组合
            if ($v['is_default']){
                $default = $vv;
                $default_price = $v['price'];
                $default_stock = $v['stock'];
            }
        }
        $v_ids = array_unique($v_ids);

        //获取属性+属性值信息
        $v_list = BAttrV::where([['v.id','in',$v_ids]])
            ->field('v.id as v_id, v.v as v_name, a.id as a_id, a.name as a_name')
            ->alias('v')
            ->join('b_attr a','a.id = v.attr_id')
            ->select()
            ->toArray();
        //echo BAttrV::getLastSql();exit;
        //var_dump($v_list);exit;

        //处理数据成二维数组[
        //['id'=>1,'name'=>'颜色','v‘=>[
        //    ['id'=>1,'name'=>'白色'],
        //    ['id'=>2,'name'=>'红色'],
        //   ]]
        //['id'=>1,'name'=>'尺码','v‘=>[
        //    ['id'=>1,'name'=>'xl'],
        //    ['id'=>2,'name'=>'l'],
        //   ]]
        //]
        $list = [];
        foreach ($v_list as $k => $v) {
            //当前的数据规格信息
            $g = ['id'=>$v['a_id'],'name'=>$v['a_name']];
            //当前数据的属性信息
            $s = ['id'=>$v['v_id'],'name'=>$v['v_name'],'is_default'=>0];

            //6----默认数据处理
            if (in_array($v['v_id'],$default)){
                $s['is_default'] = 1;
            }

            //判断list里面是否已经存了规格，不存在情况下赋值
            if (!isset($list[$v['a_id']])){
                $list[$v['a_id']] = $g;
            }

            //属性值信息
            $list[$v['a_id']]['v'][] = $s;
        }

        return ['list'=>$list,'default_price'=>$default_price,'default_stock'=>$default_stock];
    }

    /**
     * 获取SKU价格库存接口
     */
    public function getprice(){
        //参数
        $id = input('id');//商品ID
        $v_ids = input('v_ids');//属性组合ID
        //查询数据库
        $row = BGoodsSku::where(['goods_id'=>$id,'v_ids'=>$v_ids])->find()->toArray();

        //返回数据
        echo json_encode(['code'=>200,'message'=>'','data'=>$row]);
    }

}
