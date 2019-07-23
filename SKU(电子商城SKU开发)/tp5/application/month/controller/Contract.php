<?php
namespace app\month\controller;

use think\Controller;
use app\month\model\ASaler;
use app\month\model\APayment;
use app\month\model\ALogistics;
use app\month\model\AProduct;
use app\month\validate\ContractValidate;
use app\month\model\AContract;

class Contract extends Controller
{
    public function index(){
        $list = AContract::order('id','desc')->all();
        return view('index',['list'=>$list]);
    }

    public function create(){
        //查询数据
        $saler = ASaler::all();
        $product = AProduct::all();
        $logs = ALogistics::all();
        $pays = APayment::all();

        return view('create',['saler'=>$saler,'product'=>$product,'logs'=>$logs,'pays'=>$pays]);
    }

    public function save(){
        //接收参数
        $data = input();

        //验证参数
        $objContract = new ContractValidate();
        if (!$objContract->check($data)){
            $this->error($objContract->getError());
        }

        //入库
        $data['price'] = $data['price']*100;//价格以分为单位
        $data['y'] = date("Y");
        $data['m'] = date('m');
        $data['d'] = date('d');
        $objC = new AContract();
        $objC->save($data);
        $this->redirect('contract/index');
    }

    public function edit(){
        $c_no = input('c_no');
        $info = AContract::where('c_no',$c_no)->find();
        //查询数据
        $saler = ASaler::all();
        $product = AProduct::all();
        $logs = ALogistics::all();
        $pays = APayment::all();

        return view('edit',['info'=>$info,'saler'=>$saler,'product'=>$product,'logs'=>$logs,'pays'=>$pays]);
    }

    public function update(){
        //接收参数
        $data = input();

        //验证参数
        $objContract = new ContractValidate();
        if (!$objContract->check($data)){
            $this->error($objContract->getError());
        }

        //入库
        $data['price'] = $data['price']*100;//价格以分为单位

        $objC = new AContract();
        $objC->save($data,['id'=>$data['id']]);
        $this->redirect('contract/index');
    }
}