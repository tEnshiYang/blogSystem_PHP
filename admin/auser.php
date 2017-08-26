<?php
include('check.php');
echo $input->get('id');
if($input->get('do')=='del'){
	
	$id = $input->get('aid');
	if($id==$session_aid) die("不能删除当前用户");
	$sql = "delete from admin where id='{$id}'";
	$is = $db->query($sql);
	if($is){
		header("location:auser.php");
		
	}else{
		echo "删除失败";
	}

}

$sql = "select * from admin";
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
	<title>管理员首页</title>
</head>
<body>
	<?php include('nav.php'); ?>

	<div class="container">
	<h1>管理员管理<small class="pull-right"><a href="auser_add.php" class="btn btn-default">添加管理员</a></small></h1>
		<div class="row">
			
				<table class="table">
			        <thead>
			          <tr>
			            <th>ID</th>
			            <th>用户名</th>
			            <th>管理</th>
			         
			          </tr>
			        </thead>
			        <tbody>
			        <?php foreach ($rows as $row) :?>
			          <tr>
			            <th scope="row"><?php echo $row['id'] ?></th>
			            <td><?php echo $row['auser'] ?></td>
			         	<td>
			            <a href="auser.php?do=del&aid=<?php echo $row['id'] ?>">删除</a>
			            </td>
			           
			          </tr>
			      <?php endforeach; ?>
			        
			        </tbody>
			      </table>
			
				</div>

	</div>
</body>
</html>