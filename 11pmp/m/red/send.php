<?php
/**
 * 发红包页面
 * User: guoju
 * Date: 2019/3/7
 * Time: 15:06
 */
$uid = $_GET['uid'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="sendsave.php" method="post">
    <input type="hidden" name="uid" value="<?php echo $uid;?>">
<table>
    <tr>
        <td>用户ID</td>
        <td><?php echo $uid;?></td>
    </tr>
    <tr>
        <td>发送总金额</td>
        <td><input type="text" name="money"></td>
    </tr>
    <tr>
        <td>总份数</td>
        <td><input type="text" name="fen"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="发送"></td>
    </tr>
</table>
</form>
</body>
</html>
