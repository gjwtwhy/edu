<?php

namespace App\Http\Controllers\Three;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index(Request $request){
        $list = Admin::orderBy('id','desc')->paginate(3);
        return view('three.admin',['list'=>$list]);
    }


}
