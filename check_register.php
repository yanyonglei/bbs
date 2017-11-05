<?php

	//检查注册界面的功能
	include './common/home.php';
	include './helper/jump.php';
	session_start();

	if(empty($_SESSION)){
		exit('session值没有传过来');
	}


	if($_SERVER['REMOTE_ADDR']=='::1'){
		$regip='127.0.0.1';
	}else{
		$regip=$_SERVER['REMOTE_ADDR'];
	}

	//注册用户
	$username=trim($_POST['username']);

	$password=trim($_POST['password']);
	$confirmPass=trim($_POST['confirm']);

	$email=trim($_POST['email']);

	//普通用户设置为0;
	$udertype=0;


	$picture='./public/images/avatar_blank.gif';
	//用户的注册ip;
	$regip=ip2long($regip);

	//用户的注册时间
	$regtime=time();
	//最后登录时间
	$lasttime=0;
	//设置送积分
	$grade=500;
	//设置该用户同意登陆默认值设置 1
	$allowlogin=1;



	//判断用户是否符合
	if (!empty($username)) {

		if(strlen($username)<3 || strlen($username)>11){
			exit ("<script>alert('用户名不在3-11位内....');window.location.href='register.php'</script>");
			/*exit('<script>alter(用户名不在3-11位内);</script>');
			echo '<meta http-equiv="Refresh" content="3;register.php" >';
*/
			//jump('验证码不正确','index.php');
		}
	}else{
		exit ("<script>alert('用户名不能为空....');window.location.href='register.php'</script>");
		/*echo'用户名不能为空';
			echo '<meta http-equiv="Refresh" content="3;register.php" >';
		*/
	}
	//判断用户使用重复
	$res=select($conn,'bbs_user','uid',"username='$username' ");
	if($res){
		exit ("<script>alert('用户名已经存在,请更换用户名...');window.location.href='register.php'</script>");
		/*echo'用户名已经存在,请更换用户名';
		echo '<meta http-equiv="Refresh" content="3;register.php" >';*/
		
	}
	//密码验证正则
	$patternPass='/^\d{6,11}$/';
	//判断两次的密码密码是否相同 
	if(!empty($password) && !empty($confirmPass)){
		
		//判断两次的密码密码是否相同 
		if(strcmp($password,$confirmPass)!=0){
			exit ("<script>alert('两次密码输入不一致....');window.location.href='register.php'</script>");
			/*echo '两次密码输入不一致index.php';
			echo '<meta http-equiv="Refresh" content="3;register.php" >';*/
		
			//exit('两次密码输入不一致');
		}
		//判断密码是否合格
		if(preg_match($patternPass,$password,$matches)){
			exit ("<script>alert('纯数字密码不合格....');window.location.href='register.php'</script>");
			/*echo '纯数字密码不合格index.php';
			echo '<meta http-equiv="Refresh" content="3;register.php" >';*/
		}
		//判断密码是在6-11位
		if(strlen($password)<6 || strlen($password)>11){
			//jump('密码不在6-11位内','index.php');
			exit ("<script>alert('密码不在6-11位内...');window.location.href='register.php'</script>");
			/*echo '密码不在6-11位内';
			echo '<meta http-equiv="Refresh" content="3;register.php" >';*/
			//exit('密码不在6-11位内');
		}

	}else{

	   exit ("<script>alert('密码不能为空....');window.location.href='register.php'</script>");
		/*echo '密码不能为空';
		echo '<meta http-equiv="Refresh" content="3;register.php" >';*/
		//exit('密码不能为空');
	}


	//邮箱匹配 正则
	$pattern='/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/';

	if(!preg_match($pattern, $email,$matches)){
	//	jump('邮箱格式错误','index.php');
	exit ("<script>alert('邮箱格式错误....');window.location.href='register.php'</script>");
		/*echo '密码不能为空';
		echo '<meta http-equiv="Refresh" content="3;register.php" >';*/
		//exit( '密码不能为空');
	}

	//注册数据
	$data=[	
			'username'=>$username,
			'password'=>md5($password),
			'email'=>$email,
			'udertype'=>$udertype,
			'regtime'=>$regtime,
			'lasttime'=>$lasttime,
			'regip'=>$regip,
			'picture'=>$picture,
			'grade'=>$grade,
			'allowlogin'=>$allowlogin
			
	];

	$yzm=$_POST['yzm'];
	//插入数据
	//strcasecmp 两者相等返回零
	if (strcasecmp($_POST['yzm'], $_SESSION['yzm'])==0) {

		$result=insert($conn,'bbs_user',$data);
		if($result){
			exit ("<script>alert('注册成功.奖励积分500分....');window.location.href='index.php'</script>");
		}


		//jump('注册成功.奖励积分500分','index.php');
		//echo '注册成功.奖励积分500分 3秒后跳转';
		//echo '<meta http-equiv="Refresh" Content="3;index.php" />';


	}else{
		//jump('验证码不正确','index.php');
		exit ("<script>alert('验证码不正确....');window.location.href='register.php'</script>");
		/*echo '验证码不正确';
		echo '<meta http-equiv="Refresh" content="3;register.php" >';
		*/
	}
	//关闭数据库

