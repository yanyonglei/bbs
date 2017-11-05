<?php
	/*@功能：后台界面管理登陆账号密码的检测

	*/
	include './common/home.php';

	session_start();
	//获取用户名
	$username=$_POST['username'];
	//密码
	$password=$_POST['password'];
	//问题
	$problem =$_POST['problem'];
	//回答
	$reply=$_POST['reply'];

	//判断用户名或者密码是否为空
	if(empty($username) || empty($_POST['password'])){

		exit ("<script>alert('用户名或者密码不能为空!');window.location.href='admin.php'</script>");
	}
	//管理员账号的检测
	if($username!="admin"){
		
		exit ("<script>alert('您不是管理员账户!');window.location.href='admin.php'</script>");
	}
	$password=MD5($password);
	//从数据库内查询相应的信息是否一致
	$res=select($conn,'bbs_user','*',"username='$username'");
	//判断查询结果有值，获取该组的去去
	if($res){	
		$val=$res[0];
		//判断密码是否正确
		if(strcasecmp($val['password'], $password)==0){
			$_SESSION['admin']=$val;
				//插入登陆的最后时间
			$lasttime=time();
				
			$data=[
					'lasttime'=>$lasttime
			];
			//更新列表
			update($conn,'bbs_user',$data,"username='$username'");
			exit ("<script>alert('登陆成功');window.location.href='./admin/admin_index.php'</script>");
			//echo '<meta http-equiv="Refresh" content="3;./admin/admin_index.php" />';
		}else{
			//echo '密码错误';
			exit ("<script>alert('密码错误');window.location.href='admin.php'</script>");
		}	
	}else{

	 exit ("<script>alert('用户不存在');window.location.href='admin.php'</script>");
		
	}