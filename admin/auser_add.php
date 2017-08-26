<?php
include('check.php');
if ($input->get('do')=="add") {
	# code...
	$auser = $input->post('auser');
	$apass = $input->post('apass');
	if(!$auser) die("用户名或密码不能为空");

	
	$sql = "insert into admin(auser,apass) values('$auser','$apass')";
	$result = $db->query($sql);
	if($result) header("location:auser_add.php");
	die("添加失败");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员首页</title>
</head>
<body>
	<?php include('nav.php'); ?>

	<div class="container">
	<h1 style="margin-left:460px;">管理员添加<small class="pull-right"><a href="auser.php" class="btn btn-default">返回</a></small></h1>
	<hr>
		<div class="row">
			<form action="auser_add.php?do=add" method="post" class="form-horizontal">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">用户名</label>
							<div class="col-sm-4">
								<input type="text" id="auser"  name="auser" placeholder="请输入用户名" class="form-control">
							</div>
							<p style="color:red;display:none;" class="renameCheck">用户名已被占用</p>
							<p style="color:green;display:none;" class="renameCheck1">恭喜！该用户名可以使用</p>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">密码</label>
							<div class="col-sm-4">
								<input type="password" id="apass"  name="apass" placeholder="请输入密码" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4"></div>
							<div class="col-sm-4">
								<input style="margin-left:50px; margin-top:30px; width:70%;" type="submit" value="提交" class="btn btn-primary">
							</div>
							<div class="col-md-4"></div>
						</div>
					</form>
				
			
		
		</div>

	</div>
	<script type="text/javascript">
	   var http_request = false;  
			function createRequest(url) {  
			    //初始化对象并发出XMLHttpRequest请求  
			    http_request = false;  
			    if (window.XMLHttpRequest) {                                        //Mozilla等其他浏览器  
			        http_request = new XMLHttpRequest();  
			        if (http_request.overrideMimeType) {  
			            http_request.overrideMimeType("text/xml");  
			        }  
			    } else if (window.ActiveXObject) {                              //IE浏览器  
			        try {  
			            http_request = new ActiveXObject("Msxml2.XMLHTTP");  
			        } catch (e) {  
			            try {  
			                http_request = new ActiveXObject("Microsoft.XMLHTTP");  
			           } catch (e) {}  
			        }  
			    }  
			    if (!http_request) {  
			        alert("不能创建XMLHTTP实例!");  
			        return false;  
			    }  
			    http_request.onreadystatechange = alertContents;                     //指定响应方法  
			      
			    http_request.open("GET", url, true);                                 //发出HTTP请求  
			    http_request.send(null);  
			}  
			function alertContents() {                                               //处理服务器返回的信息  
			    if (http_request.readyState == 4) {  
			        if (http_request.status == 200) {  
			            if(http_request.responseText=="0"){
			            	$('.renameCheck1').css({'display':'none'});
			            	$('.renameCheck').css({'display':'block'});
			            }else{
			            	$('.renameCheck').css({'display':'none'});
			            	$('.renameCheck1').css({'display':'block'});
			            }
			        } else {  
			            alert('您请求的页面发现错误');  
			        }  
			    }  
			}  
		     $('#auser').blur(function(){
			  var username = $(this).val();  

			    if(username=="") {  
			        window.alert("请填写用户名!");  
			        $(this).focus();  
			        return false;  
			    }  
			    else {  
			        createRequest('checkname.php?username='+username+'&nocache='+new Date().getTime());  
			    } 
		});
	</script>
</body>
</html>