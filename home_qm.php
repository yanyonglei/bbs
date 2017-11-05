<?php
include './tpl/tpl_func.php';
include './common/home.php';

$title="10分钟学院-签名";
session_start();
$time=date(('Y-m-d H:i:s'),time());
$className=select($conn,'bbs_category','*','parentid=0');
if(isset($_SESSION['resUser'])){
	$resUser=$_SESSION['resUser'];
	//用户名
	$username=$resUser['username'];
	//用户类型
	$udertype=$resUser['udertype'];
	//积分
	$grade=$resUser['grade'];

	$picture=$resUser['picture'];

}


display('home_qm.html',compact('title','username','picture','className','udertype','grade','time'));	