<?php
	include './config/common.php';
	include './common/home.php';
	include './helper/jump.php';

	session_start();

	//var_dump($_POST);

	$uid=$_SESSION['resUser']['uid'];

	//旧密码
	$oldpass=md5(trim($_POST['oldpass']));
	//新密码
	$newpass=trim($_POST['newpass']);
	//确认密码
	$confirmPass=trim($_POST['confirm']);
	
	//邮箱
	$email=trim($_POST['email']);
	//问题
	$problem=$_POST['ask'];
	
	$replay=trim($_POST['replay']);

	//function select ($link,$table,$fields,$where=''){
	//查询旧密码是否正确
	$res=select($conn,'bbs_user','*',"uid=$uid and password='$oldpass' ");

	if($res==""){
		exit ("<script>alert('旧密码不正确....');window.location.href='home_pass.php'</script>");
		/*echo '<script>alert(旧密码不正确);</script>';
		echo '<meta http-equiv="Refresh" content="0;home_pass.php">';*/
		//exit('旧密码不正确');
	}
	//密码验证正则
	$patternPass='/^\d{6,11}$/';
	//判断两次的密码密码是否相同 
	if(!empty($newpass) && !empty($confirmPass)){
		
		//判断两次的密码密码是否相同 
		if(strcmp($newpass,$confirmPass)!=0){
			exit ("<script>alert('两次密码输入不一致....');window.location.href='home_pass.php'</script>");
			/*echo '<script>alert(两次密码输入不一致);</script>';
			echo '<meta http-equiv="Refresh" content="0;home_pass.php">';*/
			//exit('两次密码输入不一致');
		}
		//判断密码是否合格
		if(preg_match($patternPass,$newpass,$matches)){
			exit ("<script>alert('纯数字密码不合格....');window.location.href='home_pass.php'</script>");
			/*echo '<script>alert(纯数字密码不合格);</script>';
			echo '<meta http-equiv="Refresh" content="0;home_pass.php">';*/
			//exit('纯数字密码不合格');
		}
		//判断密码是在6-11位
		if(strlen($newpass)<6 || strlen($newpass)>11){	
				exit ("<script>alert('密码长度6-11位....');window.location.href='home_pass.php'</script>");
			/*echo '<script>alert(密码长度不够);</script>';
			echo '<meta http-equiv="Refresh" content="0;home_pass.php">';*/
		}

	}else{
			exit ("<script>alert('密码不能为空....');window.location.href='home_pass.php'</script>");
		/*echo '<script>alert(密码不能为空);</script>';
		echo '<meta http-equiv="Refresh" content="0;home_pass.php">';*/
		//exit('密码不能为空');
	}


	//邮箱匹配 正则
	$pattern='/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/';

	if(!preg_match($pattern, $email,$matches)){
			exit ("<script>alert('邮箱格式错误....');window.location.href='home_pass.php'</script>");
	/*	echo '<script>alert(邮箱格式错误);</script>';
		echo '<meta http-equiv="Refresh" content="0;home_pass.php">';*/
		//exit( '邮箱格式错误');
	}

	$data=[
		'password'=>md5($newpass),
		'problem'=>$problem,
		'email'=>$email,
		'result'=>$replay
	];

	$result=update($conn,'bbs_user',$data,"uid=$uid");

	if($result){
		exit ("<script>alert('修改成功....');window.location.href='home_pass.php'</script>");
		/*echo '<script>alert(修改成功);</script>';
		echo '<meta http-equiv="Refresh" content="3;home_pass.php">';*/
	}





