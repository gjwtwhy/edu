<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\controller\Common;
use app\admin\model\Book;

class News extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //接参数
        $name = input('book_name');
        $auther = input('auther');

        $list = Book::withSearch(
            ['book_name','auther'],
            ['book_name'=>$name,'auther'=>$auther])
            ->order('book_id','desc')
            ->paginate(10,false,[
            'type'     => 'bootstrap',
            'var_page' => 'page',
            'query'=>[
                'book_name'=>$name,
                'auther'=>$auther
            ]
        ]);
        //echo Book::getlastsql();exit;
        return view('index',['list'=>$list]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        if (!Request()->isPost()){
            $this->error('错误请求');
        }

        //1，接参数
        $book_name = input('book_name');
        $auther = input('auther');
        $desc = input('desc');
        //2，参数验证
        if (empty($book_name)){
            $this->error('参数错误');
        }
        //3, 入库
        $objbook = new Book();
        $objbook->book_name = $book_name;
        $objbook->auther = $auther;
        $objbook->desc = $desc;
        $flag = $objbook->save();

        //4, 跳转返回
        if ($flag){
            $this->success('添加成功','news/index');
        } else {
            $this->error('添加失败');
        }
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
    public function edit($book_id)
    {
        if (!$book_id){
            $this->error('参数错误');
        }

        $info = Book::where('book_id',$book_id)->find();
        //$info = Book::get($book_id);
        return view('edit',['info'=>$info]);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $book_id)
    {
        //1，接参数
        $book_name = $request->book_name;
        $auther = $request->auther;
        $desc = $request->desc;
        //2，参数验证
        if (empty($book_name)){
            $this->error('参数错误');
        }

        //3，入库
        $book = Book::where('book_id',$book_id)->find();
        $book->book_name = $book_name;
        $book->auther = $auther;
        $book->desc = $desc;
        $book->save();

        $this->success('更新成功','news/index');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($book_id)
    {
        //
        if (!$book_id){
            $this->error('参数错误');
        }

        Book::where('book_id','=',$book_id)->delete();
        $this->success('删除成功','news/index');
    }


    /**
     * 修改用户名
     * @param $book_id
     * @param $book_name
     */
    public function editname($book_id,$book_name){
        $book = Book::where('book_id',$book_id)->find();
        $book->book_name = $book_name;
        $book->save();

        echo json_encode(['code'=>200]);exit;
    }

    /**
     * 批量删除
     */
    public function deleteall(){
        $ids = input('ids');
        Book::where('book_id','in',$ids)->delete();
        echo json_encode(['code'=>200]);exit;
    }
}
