<?php

include './helper/jump.php';
include './common/home.php';
include './tpl/tpl_func.php';
session_start();
$time=date(('Y-m-d H:i:s'),time());

if(isset($_SESSION['resUser'])){
	$resUser=$_SESSION['resUser'];
	//用户名
	$username=$resUser['username'];
	//用户类型
	$udertype=$resUser['udertype'];
	//积分
	$grade=$resUser['grade'];
}else{
	//用户名
	$username='';
	//用户类型
	$udertype=0;
	//积分
	$grade=0;
}
//查询板块名称 根据parentid 来查询 parentid=0 说明 是 大板块 php技术交流 程序人生
	//根据className[]['cid'] 来传递其id号实现跳转
	$className=select($conn,'bbs_category','*','parentid=0');	
	display('nologin.html',compact('title','username','className','udertype','grade','time'));	
