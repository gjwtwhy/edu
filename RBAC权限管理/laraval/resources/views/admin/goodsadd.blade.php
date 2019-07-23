<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/7/18
 * Time: 17:01
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
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="/admin/goods/save" method="post" enctype="multipart/form-data">
    @csrf
<table class="table">
    <tr>
       <td>商品名称</td>
        <td><input type="text" name="name"></td>
    </tr>
    <tr>
        <td>商品价格</td>
        <td><input type="text" name="price"></td>
    </tr>
    <tr>
        <td>商品图片</td>
        <td><input type="file" name="pic"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="提交"></td>
    </tr>
</table>
</form>
</body>
</html>
