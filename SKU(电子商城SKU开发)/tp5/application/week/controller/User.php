<?php
namespace app\week\controller;

use app\week\model\WeekUser;
use think\Controller;

class User extends Controller
{

    public function index(){
        return view();
    }

    public function ajaxlist(){
        //当前页
        $page = input('p',1);
        //偏移量
        $pageNum = 2;//每页显示数量
        $offset = ($page-1)*$pageNum;
        //总条数
        $totalNum = WeekUser::count();
        //总页数
        $totalPage = ceil($totalNum/$pageNum);
        //调用模型
        $pageList = WeekUser::order('id','desc')->limit($offset,$pageNum)->select()->toArray();

        //返回给前台数据
        $data = [];
        $data['list'] = $pageList;
        $data['totalPage'] = $totalPage;
        echo json_encode(['code'=>200,'msg'=>'','data'=>$data]);
        exit;
    }

    public function del($id){
        WeekUser::destroy($id);
        echo json_encode(['code'=>200]);
        exit;
    }
}