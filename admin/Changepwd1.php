<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>完成修改密码操作</title>
</head>

<body>
<?php
session_start();
if(! isset($_SESSION["username"])){
	header("Location:index.php");
	exit();
	}else if($_SESSION["role"]<>"admin"){
	header("Location:student.php");
	exit();
		}
include("../conn/db_conn.php");
include("../conn/db_func.php");
$Pwd=$_POST['Pwd'];
$Pwd=trim($Pwd);
$UpdateAdmin_SQL="Update admin set Pwd='$Pwd' where 1";
$UpdateAdmin_Result=db_query($conn,$UpdateAdmin_SQL); 
if($UpdateAdmin_Result){
	echo"<script>";
	echo"alert(\"修改密码成功\");";
	echo"location. href=\"ShowCourse.php\"";
	echo"</script>";
	}else{
	echo"<script>";
	echo"alert(\"修改密码失败，请重新修改\");";
	echo"location. href=\"Changepwd.php\"";
	echo"</script>";
		}
 
 
?>
</body>
</html>