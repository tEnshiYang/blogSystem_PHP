<?php
	
 	$db=new mysqli('101.201.235.217','root','mysqlpasswd','blog');
    $username=$_GET['username'];  
    $result=$db->query("select * from admin where auser='".$username."'");  
   // $result=$db->query("select * from admin where auser='admin'");
    $info=$result->fetch_array(MYSQLI_ASSOC);  
    if ($info){  
        echo "0";
       
    }else{  
        echo "祝贺您!用户名[".$username."]没有被注册!";  
    }  