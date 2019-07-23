<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/7/17
 * Time: 15:03
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
<div class="col-sm-5">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/login/login" method="post">
        @csrf
    <div class="form-group">
        <label>用户名</label>
        <input type="text" class="form-control" name="username" placeholder="请输入名称">
    </div>
    <div class="form-group">
        <label>密码</label>
        <input type="password" class="form-control" name="passwd" placeholder="请输入名称">
    </div>
    <button type="submit" class="btn btn-default">登陆</button>
</form>
</div>
</body>
</html>
