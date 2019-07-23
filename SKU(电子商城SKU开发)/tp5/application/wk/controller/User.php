<?php
namespace app\wk\controller;

use think\Controller;
use app\wk\model\WeekUser;

class User extends Controller
{
    public function index(){
        return view();
    }

    //获取分页数据
    public function ajaxlist(){
        //1,接页码
        $page = input('p',1);
        //2,定义每页显示的条数
        $pageNum = 2;
        //3,计算偏移量
        $offset = ($page-1)*$pageNum;
        //4,计算总页数
        $totalNum = WeekUser::count();
        $totalPage = ceil($totalNum/$pageNum);
        //5,查询对应页码数据
        $list = WeekUser::limit($offset,$pageNum)->order('id','desc')->select()->toArray();
        //6,返回
        $data = [];
        $data['list'] = $list;
        $data['totalPage'] = $totalPage;
        echo json_encode(['code'=>200,'msg'=>'','data'=>$data]);
        exit;
    }

    public function del($id){
        WeekUser::destroy($id);
        echo json_encode(['code'=>200,'msg'=>'']);
        exit;
    }
}