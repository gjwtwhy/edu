<?php

namespace app\three\controller;

use think\Controller;
use think\Request;
use PHPExcel_IOFactory;
use PHPExcel;
use app\three\model\User as U;

class User extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $city_id = input('city_id');
        $list = U::withSearch(['city_id'],['city_id'=>$city_id])->order('id','desc')->paginate(2,false,['query'=>['city_id'=>$city_id]]);
        return view('index',['list'=>$list,'city_id'=>$city_id]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
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

    public function inexcel(){
        return view();
    }
    public function outexcel(){
        //从数据库查询数据
        $city_id = input('city_id');
        $list = U::withSearch(['city_id'],['city_id'=>$city_id])->select()->toArray();

        //计算总行数
        $row_num = count($list);
        $col_num = count($list[0]);

        //excel 列的命名ABCDEFGJ
        $cellName = range('A','J');
        $head = ['id','name','sex','age','mobile','city_id','create_time'];

        $objPHPExcel = new PHPExcel();
        for($i=0;$i<$col_num;$i++){//excel表头
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'1', $head[$i]);
        }
        for($i=0;$i<$row_num;$i++){
            for($j=0;$j<$col_num;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+2), $list[$i][$head[$j]]);
            }
        }

        $xlsTitle = '会员详情';
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$xlsTitle.xls");
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    public function saveexcel(){
        $file = \request()->file('image');
        $filePath =__DIR__.'/../../../public/upload/';
        $info = $file->move($filePath);
        if ($info){
            //获取上传到后台的文件名
            $fileName = $info->getSaveName();
            //获取文件路径
            $filePath = $filePath.$fileName;

            //读取excel内容
            $reader = PHPExcel_IOFactory::createReader('Excel2007');
            //载入excel文件
            $excel = $reader->load($filePath,$encode = 'utf-8');
            //读取第一张表
            $sheet = $excel->getSheet(0);
            //获取总行数
            $row_num = $sheet->getHighestRow();
            //获取总列数
            $col_num = $sheet->getHighestColumn();
            $arr = range('A',$col_num);
            $col_num = count($arr);

            //初始化excel列数据对应的key值
            $keys = ['name','sex','age','city_id'];

            //读取行列数据
            $data = [];
            for ($i=1;$i<=$row_num;$i++){
                $row = [];
                for ($j=0;$j<$col_num;$j++){
                    //获取的excel 表格数据值
                    $v =  $sheet->getCellByColumnAndRow($j,$i)->getValue();
                    //对男女列的值做替换
//                    if ($j==1){
//                        if ($v=='男'){
//                            $v = 1;
//                        } else {
//                            $v = 2;
//                        }
//                    }
                    $row[$keys[$j]] =$v;
                }
                $data[] = $row;
            }

            //入库处理
            $objU= new U();
            $objU->saveAll($data);
            $this->redirect('user/index');
        }
    }
}
