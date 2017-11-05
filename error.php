<?php
	include './tpl/tpl_func.php';
	include './common/home.php';
	
	session_start();
	$time=date(('Y-m-d H:i:s'),time());
	$title="出现错误";
	$msg="出现错误";

	//查询板块名称 根据parentid 来查询 parentid=0 说明 是 大板块 php技术交流 程序人生
	$className=select($conn,'bbs_category','*','parentid=0');
	
	if(isset($_SESSION['resUser'])){
		$resUser=$_SESSION['resUser'];
		//用户名
		$username=$resUser['username'];
		//用户类型
		$udertype=$resUser['udertype'];
		//积分
		$grade=$resUser['grade'];	


	}else{

		$username="";
		//用户类型
		$udertype="";
		//积分
		$grade="";
			

	}
	display('error.html',compact('title','username','msg','className','grade','time'));

