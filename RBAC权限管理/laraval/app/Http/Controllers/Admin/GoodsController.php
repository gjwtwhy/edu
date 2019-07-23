<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;

class GoodsController extends Controller
{
    //
    public function index(){
        return 'this is goods index';
    }

    public function ajaxlist(Request $request){
        $name = $request->name;
        if ($name){
            $list = Goods::where('name','like','%'.$name.'%')->orderBy('id','desc')->paginate(5)->toArray();
        } else {
            $list = Goods::orderBy('id','desc')->paginate(5)->toArray();
        }

        return response()->json($list);
    }

    /**
     * 批量删除
     * @param Request $request
     */
    public function ajaxdelete(Request $request){
        $id = $request->post('id');
        Goods::destroy($id);
        return response()->json(['code'=>200]);
    }

    /**
     * 保存
     */
    public function save(Request $request){
        //参数验证
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'pic'=>'required',
        ],[
            'name.required'=>'商品名称不能为空',
            'price.required'=>'价格不能为空',
            'pic.required'=>'图片必须上传',
        ]);

        //图片存储
        $path = $request->file('pic')->store('public');
        $img = substr($path,7);

        //入库
        $objGoods = new Goods();
        $objGoods->name = $request->post('name');
        $objGoods->price = $request->post('price');
        $objGoods->pic = $img;
        $objGoods->status = 1;
        $objGoods->save();

        return redirect('/admin/goods');
    }
}
