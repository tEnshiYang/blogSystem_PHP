<?php
		include('config.php');
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

		$sql = "select * from page order by pid desc limit $offset,10";
		$res = $db->query($sql);
		$blog = array();
		while($row = $res->fetch_array(MYSQLI_ASSOC)){
			$blog[] = $row;
		}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>博客</title>
	<script type="text/javascript" src="./jquery-3.2.1.js"></script>
	<script href="./bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.css">

</head>
<body>

	<div class="container">
	<?php 
	include('nav.php');
?>
		<div class="row"></div>
			<div class="jumbotron">
				<h1>1111</h1>
				<p></p>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">公告</div>
					<div class="panel-body">
						content
					</div>
				</div>

					<div class="panel panel-default">
					<div class="panel-heading">统计数据</div>
					<div class="panel-body">
						content
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<?php foreach ($blog as $row): ?>
				<div class="panel panel-default">
					<div class="panel-heading">
 						<a href="read.php?pid=<?php echo $row['pid']?>"><?php echo $row['title'] ?></a>
					</div>
					<div class="panel-body">
						<?php echo mb_substr(strip_tags($row['content']),0,80) ?>....
					</div>
				</div>
			<?php endforeach; ?>
			     <nav aria-label="Page navigation">
					  	<ul class="pagination">
					   
					 
				      <?php
				      $hrefTpl ='<li><a href="index.php?page=%d">%s</a></li>';
				      	for ($i=1; $i<=$maxpage ; $i++) { 
				      		echo sprintf($hrefTpl,$i,"第{$i}页");
				      	}
				      ?>
					  </ul>
					</nav>

			</div>
</body>
</html>