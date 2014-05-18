<?php
$con = mysql_connect('localhost', 'root', '');
/************************在数据库中创建表*************************/ 
function createDB()
  {
		global $con;
		if (!$con) {
			die ('连接数据库出错: ' . mysql_error());
		}
		if (mysql_query("CREATE DATABASE yuemei",$con))
		{
			echo "恭喜你，数据库".$database."创建成功了!";
		}
		else
		{
			echo   "创建数据库出错，错误号：".mysql_errno()." 错误原因：".mysql_error();
		}
  }
  createDB();
/******************************end***************************************/
/************************在数据库中创建表 product\*************************/
function create_table()
	{
		global $con;

		mysql_select_db("yuemei",$con);   
		$sqlTable="create   table   product(   
			productid	  int   unsigned   not   null   auto_increment   primary   key,   
			name          varchar(20),   
			path          varchar(30),
			time          int,
			prouctorder   int)";   


		if (mysql_query($sqlTable,$con))
		{
			echo "恭喜你，product数据表创建成功了!";
		}
		else
		{
			echo "创建product数据表出错，错误号：".mysql_errno()." 错误原因：".mysql_error();
		} 

		$sqlTable="create   table   resume(   
			resumeid			int   unsigned   not   null   auto_increment   primary   key,
			position			varchar(20),
			name				varchar(20), 
			salary				varchar(20),
			education			varchar(20),
			party				varchar(20),
			gender				varchar(4),
			borth				varchar(20),
			tel					varchar(20),
			email				varchar(20),
			address				varchar(20),
			introduction		text)";   


		if (mysql_query($sqlTable,$con))
		{
			echo "恭喜你，resume数据表创建成功了!";
		}
		else
		{
			echo "创建resume数据表出错，错误号：".mysql_errno()." 错误原因：".mysql_error();
		} 

	}
create_table();

/******************************end***************************************/
mysql_close();
?>