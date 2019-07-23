<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/7/22
 * Time: 16:32
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
<nav class="navbar navbar-default" role="navigation">
     <div class="navbar-header">
      <a class="navbar-brand" href="#">后台管理</a>
        </div>
</nav>

<div class="col-sm-3">
<ul>
    @foreach($menu as $k=>$v)
        <li>
            {{$v['name']}}
            @if($v['child'])
                <ul>
                    @foreach($v['child'] as $kk=>$vv)
                        <li><a href="{{$vv['url']}}" target="center">{{$vv['name']}}</a> </li>
                        @endforeach
                </ul>
                @endif
        </li>
        @endforeach
</ul>
</div>
<div class="col-sm-9">
<iframe src="" name="center" width="100%" height="800px" frameborder="0"></iframe>
</div>
</body>
</html>
