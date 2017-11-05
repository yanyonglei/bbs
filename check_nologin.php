<?php
//获取表单的数据
include './common/home.php';
//include './helper/jump.php';
//开启session
session_start();

//获取用户名
$username=$_POST['username'];
//密码
$password=$_POST['password'];
//问题
$problem =$_POST['problem'];
//回答
$reply=$_POST['reply'];

///登陆错误次数统计
	$_SESSION['loginErrorCount']=0;
	//var_dump($_POST);
	$username=trim($_POST['username']);
	$password=trim($_POST['password']);
	
	//判断用户名或者密码是否为空
	if(empty($username) || empty($_POST['password'])){
		exit ("<script>alert('密码不能为空或者用户名不能为空....');window.location.href='nologin.php'</script>");
		/*echo '<script>alert(密码不能为空或者用户名不能为空);</script>';
		echo '<meta http-equiv="Refresh" content="3;nologin.php" />';*/

	}

	$password=MD5($password);
	//从数据库内查询相应的信息是否一致
	$res=select($conn,'bbs_user','*',"username='$username'");
	//判断查询结果有值，获取该组的去去
	
	if($res){
		//将结果集付给val
		$val=$res[0];
		//判断密码是是否
		$startTime=time();
		if(strcasecmp($val['password'], $password)==0){
			
		 
			//判断用户名是否是管理员
			if($username=='admin'){
				  $_SESSION['resUser']=$val;
				exit ("<script>alert('该用户允许登陆登陆成功,跳转中........获得积分10分.....');window.location.href='index.php'</script>");
				//echo '<meta http-equiv="Refresh" content="0;" />';
			}else if($val['allowlogin']==1){
				$_SESSION['resUser']=$val;
				if($val['errorcount']==5){

					$set=[
						'errorcount'=>0
					];
					update($conn,'bbs_user',$set,"username='$username'");
				}

			
				//插入登陆的最后时间
				$lasttime=time();
				//更新积分字段值		
				$val['grade']=$val['grade']+10;
				$data=[
					'lasttime'=>$lasttime,
					'grade'=>$val['grade']
				];
				//更新列表
				update($conn,'bbs_user',$data,"username='$username'");
				$_SESSION['resUser']['grade']=$_SESSION['resUser']['grade']+10;
				exit ("<script>alert('该用户允许登陆登陆成功,跳转中........获得积分10分.....');window.location.href='index.php'</script>");
				}else if($val['allowlogin']==0){
					
					exit ("<script>alert('不允许登陆');window.location.href='index.php'</script>");
		
				}
			
		}else{
			$endtime=time();
			//登陆密码错误次数统计次数
			$val['errorcount']=$val['errorcount']+1;
			$set=[
						'errorcount'=>$val['errorcount']
				];
			update($conn,'bbs_user',$set,"username='$username'");
			//错误登陆的时间在2分钟内
			if($startTime-$endtime <2*60){
				//更新错误次数
				if($val['errorcount']>6){
					//更新字段值
					$data=[
						'allowlogin'=>0
					];
					//更新列表
					update($conn,'bbs_user',$data,"username='$username'");
				}
			}else{
				$val['errorcount']=$val['errorcount']+1;
				$set=[
						'errorcount'=>0
				];
				update($conn,'bbs_user',$set,"username='$username'");
			}
			exit ("<script>alert('密码错误.....');window.location.href='index.php'</script>");
		}
		
	}else{
		exit ("<script>alert('用户名不存在....');window.location.href='index.php'</script>");
	}


