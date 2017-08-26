<?php
include('check.php');
if ($input->get('do')=="del") {
	# code...
	$pid = $input->get('pid');
	


	
	$sql = "delete from page where pid='{$pid}'";
	$result = $db->query($sql);
	if($result) header("location:blog.php");
	die("添加失败");
}
$pid=$input->get('pid');
$page = array(
			'title' =>'',
			'author'=>'',
			'content'=>''
		);

if ($input->get('do')=="add") {
	# code...
		$title = $input->post('title');
		$author = $input->post('author');
		$content = $input->post('content');
	
	
		if($pid>0){
		$uptime = time();
		$sql = "select * from page where pid='{$pid}'";
		$res = $db->query($sql);
		$page = $res->fetch_array(MYSQLI_ASSOC);
		var_dump($page);
		$upsql = "update page set(title='$title',author='$author',content='$content',uptime='$uptime') where pid='$pid'";
		$db->query($upsql);
	}
	else{
		if(!$title||!$content) die("标题或内容不能为空");
		$intime = time();
		$strtpl = "insert into page(`title`,`content`,`author`,`intime`,`uptime`) values('%s','%s','%s','%d','%d')";

		$sql = sprintf($strtpl,$title,$author,$content,$intime,0);
		echo $sql;
		$result = $db->query($sql);
		if($result) header("location:blog.php");
		die("添加失败");
	}
	
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>博客</title>
</head>
<body>
	<?php include('nav.php'); ?>

	<div class="container">
	<h1 style="margin-left:460px;" class="tie">博客增加<small class="pull-right"><a href="blog.php" class="btn btn-default">返回</a></small></h1>
	<hr>
		<div class="row">
			<form action="blog_add.php?do=add&pid=$pid" method="post" class="form-horizontal">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">标题</label>
							<div class="col-sm-4">
								<input type="text" id="title"  name="title" placeholder="请输入标题" class="form-control" value='<?php echo $page['title'] ?>'>
							</div>
						
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">作者</label>
							<div class="col-sm-4">
								<input type="text" id="author"  name="author" placeholder="请输入作者" value='<?php echo $page['author'] ?>' class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">内容</label>
							<div class="col-sm-4">
								<textarea class="form-control" name="content" id="content" style="height:300px;" placeholder="请输入内容"  ><?php echo $page['content'] ?></textarea>
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
	
</body>
</html>