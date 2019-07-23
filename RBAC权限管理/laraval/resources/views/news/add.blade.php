<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/7/16
 * Time: 15:39
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
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form role="form" action="/news/save" method="post">
      @csrf

      <div class="form-group">
            <label for="name" class="col-sm-2 control-label">标题</label>
             <div class="col-sm-10">
            <input type="text" class="form-control" name="title" placeholder="请输入标题">
            @if(count($errors)>0)
                     @foreach($errors->get('title') as $m)
                         {{$m}}
                     @endforeach
                @endif
             </div>
             </div>
      <div class="form-group">
          <label for="name" class="col-sm-2 control-label">内容</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="content" placeholder="请输入标题">
          </div>
          </div>
      <div class="form-group">
          <label for="name" class="col-sm-2 control-label">作者</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="author" placeholder="请输入作者">
          </div>
      </div>
      <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">添加</button>
              </div>
         </div>
  </form>
</div>
</body>
</html>
