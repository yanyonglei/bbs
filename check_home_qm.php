<?php

include './config/common.php';
include './common/home.php';
include './helper/jump.php';
session_start();


$uid=$_SESSION['resUser']['uid'];
//表单中的签名字符插入数据库

if(!empty($_POST['qm'])){
	$result=update($conn,'bbs_user',['autograph'=>trim($_POST['qm'])],"uid=$uid");


	if($result){
			exit ("<script>alert('修改成功....');window.location.href='home_qm.php'</script>");
		/*echo '<script>alert(修改成功);</script>';
		echo '<meta http-equiv="Refresh" content="3;home_qm.php">';*/
	}else{
		exit ("<script>alert('修改失败....');window.location.href='home_qm.php'</script>");
	}
}
