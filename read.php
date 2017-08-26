<?php 
	include('config.php');
	$pid = (int) $input->get('pid');
	if($pid<0){
		die('无效文章');

	}
	$sql ="select * from page where pid='{$pid}'";
	$blog = $db->query($sql)->fetch_array(MYSQLI_ASSOC);
	
	
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
				<h1><?php echo $blog['title']?></h1>
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

				<div class="panel panel-default">
				
					<div class="panel-body">
						<?php echo $blog['content'] ?>
					</div>
				</div>
			

			</div>
</body>
</html>