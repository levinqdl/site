<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
</head>
<body>
	<?PHP
		if($_POST['submit'] == "确定"){
			
			$con = mysql_connect('localhost', 'root', '');
			if (!$con) {
				die ('连接数据库出错: ' . mysql_error());
			}
			mysql_select_db("yuemei",$con);
			$sqlInsert="insert into resume (name) values ( '{$_POST['name']}')";
			if (mysql_query($sqlInsert,$con))
			{
				echo "恭喜你，数据向resume数据表插入成功了!";
			}
			else
			{
				echo "创建resume数据表出错，错误号：".mysql_errno()." 错误原因：".mysql_error();
			} 

			 echo "<script>alert('保存成功！');javascript:location.href='./insert.php'</script>";
		}


	?>
	<form method="post" action="insert.php">
		姓名：<input type="text" size=16 name="name"><br>
		<input type="submit" name="submit" value="确定">
	</body>

</html>
