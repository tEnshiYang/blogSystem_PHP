<?php 
	include('check.php');

	$countsql = "select count(*) as total from page";

	$total = $db->query($countsql)->fetch_array(MYSQLI_ASSOC)['total'];
	//计算总共几页
	$maxpage = ceil($total/10);
	//每页显示数据数量
	$pagenum=10;
	$page = $input->get('page');
	$page = $page<1 ?1:$page;
	//当前从第几条数据开始查询
	$offset = ($page-1)*10;
	$sql = "select * from page limit $offset,10";
	$result = $db->query($sql);
	$rows = array();

	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
	$rows[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>博客管理</title>
</head>
<body>
	<?php include('nav.php'); ?>

	<div class="container">
	<h1>管理员管理<small class="pull-right"><a href="blog_add.php" class="btn btn-default">增加博客</a></small></h1>
		<div class="row">
			
				<table class="table">
			        <thead>
			          <tr>
			            <th>PID</th>
			            <th>标题</th>
			            <th>作者</th>
			            <th>插入时间</th>
			            <th>修改时间</th>
			            <th>管理</th>
			         
			          </tr>
			        </thead>
			        <tbody>
			        <?php foreach ($rows as $row) :?>
			          <tr>
			            <td><?php echo $row['pid'] ?></td>
			            <td><?php echo $row['title'] ?></td>
			            <td><?php echo $row['author'] ?></td>
			            <td><?php echo date("Y-m-d H:i:s",$row['intime'])  ?></td>
			            <td><?php echo date("Y-m-d H:i:s",$row['uptime']) ?></td>
			           
			         	<td>
			         	<a href="blog_add.php?do=add&pid=<?php echo $row['pid'] ?>">修改</a>
			            <a href="blog_add.php?do=del&pid=<?php echo $row['pid'] ?>">删除</a>
			            </td>
			           
			          </tr>

			       
					
				      <?php endforeach; ?>
				        
				        </tbody>
				      </table>
				       <nav aria-label="Page navigation">
					  	<ul class="pagination">
					   
					 
				      <?php
				      $hrefTpl ='<li><a href="blog.php?page=%d">%s</a></li>';
				      	for ($i=1; $i<=$maxpage ; $i++) { 
				      		echo sprintf($hrefTpl,$i,"第{$i}页");
				      	}
				      ?>
					  </ul>
					</nav>
				</div>

	</div>
</body>
</html>