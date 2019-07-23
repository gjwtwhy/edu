<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/7/16
 * Time: 15:05
 */
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
     <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<body>
<div class="container">
    <a href="/news/add"> 添加</a>
<table class="table">
    <tr>
        <td colspan="4">
            <div class="col-sm-3">
               <form class="form-inline" role="form" action="/news" method="get">
                <div class="form-group">
                 <label class="sr-only" for="name">标题</label>
                <input type="text" class="form-control" name="title" placeholder="请输入标题">
            </div>
                   <div class="form-group">
                       <label class="sr-only" for="name">作者</label>
                       <input type="text" class="form-control" name="author" placeholder="请输入作者">
                   </div>
                   <button type="submit" class="btn btn-default">搜索</button>
               </form>
            </div>
        </td>
    </tr>
    <tr>
        <td>ID</td>
        <td>标题</td>
        <td>内容</td>
        <td>操作</td>
    </tr>
    @foreach ($list as $k=>$v)
    <tr>
        <td>{{$v->id}}</td>
        <td>
            <span id="span_{{$v->id}}" onclick="showtext({{$v->id}});">{{$v->title}}</span>
<input type="text" id="text_{{$v->id}}" value="{{$v->title}}" style="display: none" onblur="dotext({{$v->id}});">
        </td>
        <td>{{$v->content}}</td>
        <td><a href="/news/update/{{$v->id}}">编辑</a> <a href="/news/delete/{{$v->id}}">删除</a> </td>
    </tr>
        @endforeach
    <tr>
        <td colspan="4">
            {{ $list->links() }}
        </td>
    </tr>
</table>
</div>
<script>
    function showtext(id) {
        $("#span_"+id).hide();
        $("#text_"+id).show();
    }

    function dotext(id) {
        //获取text的值
        var title = $("#text_"+id).val();
        var token = "{{csrf_token()}}";

        //发送ajax请求修改数据
        $.ajax({
            url:'/news/title',
            type:'post',
            data:{id:id,title:title,_token:token},
            dataType:'json',
            success:function (e) {
                //文本框隐藏，span显示（span内容进行变更）
                $("#text_"+id).hide();
                $("#span_"+id).html(title);
                $("#span_"+id).show();
            }
        })


    }
</script>
</body>
</html>
