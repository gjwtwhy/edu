<?php

namespace app\three\controller;

use think\Controller;
use think\Request;
use app\three\validate\Cate as CateValidate;
use app\three\model\GoodsCategory;

class Cate extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $list = GoodsCategory::all();

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
        $list = GoodsCategory::where('pid',0)->select();
        return view('create',['list'=>$list]);
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
        $data = input();
        //
        $objCate = new CateValidate();
        if (!$objCate->check($data)){
            $this->error($objCate->getError());
        }
        //
        $cate = new GoodsCategory();
        $cate->pid = $data['pid'];
        $cate->name=$data['name'];
        $cate->save();
        $this->redirect('cate/index');
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
