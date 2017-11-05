<?php

//引入共享文件
	include './common/home.php';
	include './tpl/tpl_func.php';
	//验证码地址
	$time=date(('Y-m-d H:i:s'),time());
	$title='10分钟-学院-注册界面';
	$yzm=WEB_SITE.'helper/vertify.php';
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
		//用户名
		$username='';
		//用户类型
		$udertype=0;
		//积分
		$grade=0;
	}



	display('register.html',compact('title','className','yzm','time'));



