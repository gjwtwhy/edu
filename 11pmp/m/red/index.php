<?php
/**
 * 模拟用户登录后，红包列表
 * User: guoju
 * Date: 2019/3/7
 * Time: 14:38
 */
$uid =14;
include 'db.php';
$objdb = new db();
$userinfo = $objdb->getUserInfo($uid);

//获取红包表数据
$list = $objdb->getRedList();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
当前用户：<?php echo $userinfo['username'];?> 余额：<?php echo $userinfo['money'];?> <a href="send.php?uid=<?php echo $userinfo['id'];?>">发红包</a>
<table>
    <tr>
        <td>ID</td>
        <td>用户ID</td>
        <td>总金额</td>
        <td>总份数</td>
        <td>剩余份数</td>
        <td>操作</td>
    </tr>
    <?php
    foreach ($list as $k=>$v) {
        ?>
        <tr>
            <td><?php echo $v['id'];?></td>
            <td><?php echo $v['uid'];?></td>
            <td><?php echo $v['money'];?></td>
            <td><?php echo $v['fen'];?></td>
            <td><?php echo $v['left_fen'];?></td>
            <td>
                <?php
                if ($v['left_fen']>0) {
                    ?>
                    <input type="button" value="抢红包" style="color: red" onclick="qiang(<?php echo $uid;?>,<?php echo $v['id'];?>);">
                    <?php
                }else {
                    ?>
                    <input type="button" value="抢红包" style="color: black">
                    <?php
                }
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<script>
function qiang(uid,redid) {
    $.ajax({
        url:"qiang.php",
        type:"post",
        data:{'uid':uid,'redid':redid},
        dataType:'json',
        success:function (e) {
            if (e.status==1){
                alert("恭喜您，抢到:"+e.money+"元");
                location.href='index.php';
            }else if(e.status==0){
                alert(e.message);
                return false;
            }
        }
    })
}
</script>
</body>
</html>
