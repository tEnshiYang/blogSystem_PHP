<?php
	session_start();
	include('../config.php');

	// $sql = "select * from admin";
	//$mysqli_result = $mysqli->query($sql);
	// $row = $mysqli_result->fetch_array(MYSQLI_ASSOC);
	// var_dump($row);
	if($input->get('do')=='check'){
		echo "cheking";
		$auser = $input->post('auser');
		$apass = $input->post('apass');
		// var_dump($auser,$apass);
		$sql = "select * from admin where auser='{$auser}' and apass='{$apass}'";
		$mysqli_result = $db->query($sql);
		$row = $mysqli_result->fetch_array(MYSQLI_ASSOC);

		if(is_array($row)){
			$_SESSION['id']=$row['id'];
			var_dump($row);
			header("location:home.php");
		}else{
			die("账号或密码错误");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员登录</title>
	<?php include(PATH.'/header.php');?>
</head>
<body>
 <div class="container">
 	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6" style="margin-top:200px;">
			<div class="panel panel-primary">
				<div class="panel-heading">管理员登录</div>
				<div class="panel-body">
					<form action="login.php?do=check" method="post" class="form-horizontal">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
							<div class="col-sm-10">
								<input type="text" id="auser"  name="auser" placeholder="请输入用户名" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">密码</label>
							<div class="col-sm-10">
								<input type="password" id="apass"  name="apass" placeholder="请输入密码" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4"></div>
							<div class="col-sm-4">
								<input style="width:100%;" type="submit" value="登录" class="btn btn-primary">
							</div>
							<div class="col-md-4"></div>
						</div>
					</form>
				</div>
				<div class="panel-footer"></div>
			</div>
		</div>
		<div class="col-md-3"></div>
 	</div>

 </div>
  <ul class="nav navbar-nav navbar-right">
	       
	      <div class="dropdown">
	  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	    Dropdown
	    <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
	    <li><a href="#">Action</a></li>
	    <li><a href="#">Another action</a></li>
	    <li><a href="#">Something else here</a></li>
	    <li role="separator" class="divider"></li>
	    <li><a href="#">Separated link</a></li>
	  </ul>
</body>
</html>