<?php
 require_once("sgk.php"); 
 ?>
<html>

<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
    </body>
    <br><br>
    </html>
<?php
 if (!isset($_SESSION['username'])) { header("Location:index.php"); exit; } else $username = $_SESSION['username']; $sql = "select * from user where username='$username'"; $rrss = mysql_query($sql); $row = mysql_fetch_assoc($rrss); echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; 

charset=UTF-8" />
<title>Welcome,' . $row['Username'] . '!</title>
</head>

<body>




<div class="container">
<div class="row-fluid">
'; include_once('html/user.html'); echo '


<!-- Change Pass -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">修改密码</h4>
      </div>
      <div class="modal-body">
<form action="" method="POST">

<div class="input-group">
  <span class="input-group-addon">@</span>
  <input type="text" class="form-control" placeholder="旧密码" name="oldpassword">
  <input type="text" class="form-control" placeholder="新密码" name="password1">
  <input type="text" class="form-control" placeholder="再次输入新密码/" name="password2">
</div>

            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="submit" class="btn btn-primary" name="button">修改</button>
        </form>
      </div>
      <div class="modal-footer"></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.change passoword -->

<!-- Get Gold -->
<div class="modal fade" id="jb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">金币转帐</h4>
      </div>
      <div class="modal-body">
<form action="" method="POST">

<div class="input-group">
  <span class="input-group-addon">@</span>
  <input type="text" class="form-control" placeholder="对方用户名" name="touser">
  <input type="text" class="form-control" placeholder="金币" name="jb">
  <input type="text" class="form-control" placeholder="你的密码" name="password">
</div>

            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="submit" class="btn btn-primary" name="button">转移</button>
        </form>
      </div>
      <div class="modal-footer"></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.gold -->

<!-- 赞助奖励 -->
<div class="modal fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">赞助奖励</h4>
      </div>
      <div class="modal-body">
	  <a href="or.php" >手动更新数据</a><br>
<form action="" method="POST">

<div class="input-group">

 <span class="input-group-addon">@</span>
  <input type="text" class="form-control" placeholder="支付宝交易号" name="card">
</div>

            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="submit" class="btn btn-primary" name="button">确认兑换</button>
        </form>
      </div>
      <div class="modal-footer"></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.赞助奖励 -->

<div class="row row-offcanvas row-offcanvas-left">
<div class="col-xs-12 col-sm-9">
<div class="span9">
<div class="jumbotron">
  <h1>Welcome,' . $username . '</h1>
</div>
<br>

  <table class="table" width="400">
    <tr>
      <th width="40" scope="row">Username</th>
      <td width="84">' . $username . '</td>
    </tr>
    <tr>
      <th scope="row">E-mail</th>
      <td>' . $row["email"] . '</td>
    </tr>
    <tr>
      <th scope="row">IP</th>
      <td>' . $row["ip"] . '</td>
    </tr>
	    <tr>
      <th scope="row">Gold</th>
      <td>' . $row["gold"] . '</td>
    </tr>
  </table>
</div>
</div>
</div>
</div>

'; ?>
<?php
 if (!empty($_POST['oldpassword'])) { $old = jiami($_POST['oldpassword']); $sql = "select password from user where password='$old' and username='$username'"; $rs = mysql_query($sql); if (mysql_num_rows($rs) == 0) { echo "<script>alert('旧密码错误!')

</script>"; } else if ($_POST['password1'] <> $_POST['password2']) echo "对不起,新密码不同!"; else { $pass = jiami($_POST['password1']); $sql = "update user set password='$pass' where username='$username'"; if (mysql_query($sql)) echo "<script>alert('密码修改成功')</script>"; } } ?>
<?php
if (!empty($_POST['touser'])) { $pass = jiami($_POST['password']); $sql = "select password from user where password='$pass' and username='$username'"; $rs = mysql_query($sql); if (mysql_num_rows($rs) == 0) { echo "<script>alert('对不起，旧密码错误')

</script>"; } else { $touser = $_POST['touser']; $jb = $_POST['jb']; $select = "select jb from user where username='$username'"; $row = $mysql_query($select); $rows = mysql_fetch_array($row); $pd = $rows['jb']; if ($jb > $pd) { echo "<script>alert('你没有足够的金币!')</script>"; echo $pd; exit(); } else if ($pd <= 0) { echo "<script>alert('你没有金币了')</script>"; exit; } else $sql = "update user set jb=jb-'$jb' where username='$username'"; $sql1 = "update user set jb=jb+'$jb' where username='$touser'"; mysql_query($sql); mysql_query($sql1); echo "<script>alert('转帐成功')</script>"; } } ?>
<?php
$card = $_POST['card']; if ($_POST['card']) { $sql = "select * from alipay where card='$card'"; $row = mysql_query($sql); $rows = mysql_fetch_array($row); $status = $rows['6']; if (mysql_num_rows($row) == 0) { echo "<script>alert('I'm sorry, didn't find the transaction number!')</script>"; } else { if ($status == "1") { echo "<script>alert('I'm sorry, this transaction number is already in use!')</script>"; exit(); } else { $sql = "update alipay set status=1 where card='$card'"; mysql_query($sql); $JB = $rows['money'] * 10; $sql = "update user set jb=jb+$JB where username='" . $_SESSION['username'] . "'"; mysql_query($sql); echo "<script>alert('Thank you for your support, we will do better!You've got" . $JB . "JB!')</script>"; } } } ?>
