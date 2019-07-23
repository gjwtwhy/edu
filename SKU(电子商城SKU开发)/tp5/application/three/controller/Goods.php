<?php
namespace app\three\controller;

use think\Controller;
use app\three\model\GoodsCategory;
use app\three\validate\Goods as GoodsValidate;
use app\three\model\Goods as GoodsModel;

class Goods extends Controller
{

    public function index(){
        //
        $cate_id = input('cat_id',0);
        $name = input('name','');
        $low_price = input('low_price')?input('low_price'):0;
        $high_price = input('high_price')?input('high_price'):100000;

//        $where = [];
//        if ($cate_id){
//            $where[] = ['cat_id','=',$cate_id];
//        }
//        if ($name){
//            $where[] = ['name','like','%'.$name.'%'];
//        }
//        $where[] = ['price','>=',$low_price];
//        $where[] = ['price','<=',$high_price];
        //var_dump($where);

        $list = GoodsModel::withSearch(['name','price','cat_id'], [
            'name'			=>	$name,
            'price'	=>	[$low_price,$high_price],
            'cat_id'		=>	$cate_id
        ])->order('id','desc')->paginate(6,false,[
            'query'=>[
                'cat_id'=>$cate_id,
                'name'=>$name,
                'low_price'=>$low_price,
                'high_price'=>$high_price
            ]
        ]);
        //echo GoodsModel::getLastSql();


        $gc = GoodsCategory::all();
        return view('index',['list'=>$list,'gc'=>$gc]);
    }

    public function create(){
        //
        $list = GoodsCategory::all();
        return view('create',['list'=>$list]);
    }

    public function save(){
        $data = input();
        $objGv= new GoodsValidate();
        if (!$objGv->check($data)){
            $this->error($objGv->getError());
        }

        //图片上传
        $file = request()->file('img');
        $info = $file->move(__DIR__.'/../../../public/upload');
        $img = '';
        if ($info){
            $img = $info->getSaveName();
            $img = str_replace('\\','\/',$img);
        }

        $goodsModel= new GoodsModel();
        $goodsModel->name=$data['name'];
        $goodsModel->cat_id = $data['cate_id'];
        $goodsModel->price = $data['price'];
        $goodsModel->img = $img;
        $goodsModel->save();
        $this->redirect('goods/index');
    }
}