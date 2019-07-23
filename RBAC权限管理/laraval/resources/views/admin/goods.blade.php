<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/7/18
 * Time: 10:43
 */
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
     <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
     <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<body>
<a href="/admin/goods/add">商品添加</a>
<table class="table  table-striped" id="tlist">
    <thead>
    <tr>
        <td colspan="5">
            商品名称：<input type="text" id="name">
            <input type="button" value="搜索" onclick="ajaxList(1)">
        </td>
    </tr>
    <tr>
        <th><input type="checkbox" onclick="checkall()" id="call"></th>
        <th>ID</th>
        <th>商品名称</th>
        <th>商品价格</th>
        <th>图片</th>
        <th>状态</th>
        <th>创建时间</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
</table>
<input type="submit" value="批量删除" onclick="deleteall()">
</body>
</html>
<script>
    $(function () {
        ajaxList(1);
    })

    /***
     * 全选 全不选
     */
    function checkall() {
        //1，知道全局框是选中的还是没选中
        if($("#call").prop('checked')){
            //遍历下面所有复选框
            $(".clist").each(function (i,v) {
                $(this).prop('checked',true);
            })
        } else {
            $(".clist").each(function (i,v) {
                $(this).prop('checked',false);
            })
        }
    }

    //批量删除
    function deleteall() {
        var token = "{{csrf_token()}}";
        //1，循环获取选中复选框的值
        var ids = [];
        $(".clist").each(function (i,v) {
            if($(this).prop('checked')) {
                ids.push($(this).val());
            }
        });
        //2.ajax发送数据给后台处理
        $.ajax({
            url:'/admin/goods/delete',
            type:'post',
            data:{id:ids,_token:token},
            dataType:'json',
            success:function (e) {
                if(e.code=='200'){
                    ajaxList(1);
                }
            }
        })
    }

    /**
     * 分页
     * @param p
     */
    function ajaxList(p) {
        var name = $("#name").val();
        $.ajax({
            url:'/admin/goods/ajaxlist',
            data:{page:p,name:name},
            type:'get',
            dataType:'json',
            success:function (e) {
                $("#tlist tbody").empty();
                var tr = '';
                $.each(e.data,function(i,v){
                   tr += '<tr>';
                   tr += '<td><input type="checkbox" value="'+v.id+'" class="clist"></td>';
                   tr += '<td>'+v.id+'</td>';
                    tr += '<td>'+v.name+'</td>';
                    tr += '<td>'+v.price+'</td>';
                    tr += '<td><img src="/storage/'+v.pic+'" width="50px"/></td>';
                    tr += '<td>'+v.status+'</td>';
                    tr += '<td>'+v.created_at+'</td>';
                   tr += '</tr>';
                });

                $("#tlist tbody").append(tr);
                //页码设置
                var ptr = '<tr><td colspan="6">';
                for(var i=1;i<=e.last_page;i++){
                    ptr += "<a href='#' onclick='ajaxList("+i+")'>"+i+'</a>   ';
                }
                ptr += '</td></tr>';
                $("#tlist tbody").append(ptr);
            }
        })
    }
</script>
