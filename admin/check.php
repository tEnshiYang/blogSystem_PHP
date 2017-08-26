<?php
	session_start();
include('../config.php');
$session_aid = $input->session('id');
// 检查是否登录成功
	if($session_aid===false){
		header("location:login.php");
		
	}

$sql = "select * from admin where id='{$session_aid}'";
$session_asuer_result = $db->query($sql);
$session_auser = $session_asuer_result->fetch_array(MYSQLI_ASSOC);

