<?php
namespace app\admin\controller;

class Index
{
    public function index()
    {
        return view('index');
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function welcome(){
        return "welcome everyone";
    }
}
