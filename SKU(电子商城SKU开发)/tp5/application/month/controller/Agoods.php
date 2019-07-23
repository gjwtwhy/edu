<?php

namespace app\month\controller;

use think\Controller;
use think\Request;
use app\month\model\BGoods; //商品表模型
use app\month\model\BCate; //类目表模型
use app\month\model\BAttr; //属性表模型

class Agoods extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $list = BGoods::order('id','desc')->all();
        return view('index',['list'=>$list]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        $menu = BCate::all();
        return view('create',['menu'=>$menu]);
    }

    /**
     * 获取属性信息
     */
    public function attr(Request $request){
        //接收cate_id
        $cate_id = $request->post('cate_id');
        $list = BAttr::where('cate_id',$cate_id)->select()->toJson();
        return $list;
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
