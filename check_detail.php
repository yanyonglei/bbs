<?php
	/*
	功能：将回帖数据写入数据库
	内容包括 帖子的id 回复人的用户的uid  content addtime addip  
*/
	include './common/home.php';

	//开启session
	session_start();
	$resUser=isset($_SESSION['resUser'])?$_SESSION['resUser']:'';

	//判断用户是否在线
	if(empty($resUser)){

		//exit("<script>alert('用户离线'');window.location.href='nologin.php'</script");
		echo '<meta http-equiv="Refresh" content="0;nologin.php">';
		exit();
	}
	//获取表单的数据
	$content=$_POST['content'];
	//帖子的id
	$id=$_POST['id'];
	//var_dump($id);

	//板块的id
	$classid=$_POST['classid'];
	//var_dump($classid);
	//回帖的的时间
	$time=time();
	//发帖的地址
	if($_SERVER['REMOTE_ADDR']=='::1'){
			$addip='127.0.0.1';
	}else{
			$addip=$_SERVER['REMOTE_ADDR'];
	}
	//回帖人的ip
	$addip=ip2long($addip);

	//回帖标识
	$first=0;
	//function big($link,$table,$fields)
	//var_dump($max);
	//回帖人的用户编号uid
	//
	$uid='';
	if(!empty($resUser)){
		$uid=$resUser['uid'];
	}
	
	

	$data=[
			'tid'=>$id,
			'authorid'=>$uid,
			'addtime'=>$time,
			'addip'=>$addip,
			'first'=>$first,
			'classid'=>$classid,
			'content'=>$content,
			'reply'=>0,
			'isdel'=>0

	];
	//将回帖的内容加入数据库获取反馈结果
	$res=insert($conn,'bbs_tie',$data);
	
	if($res &&mysqli_insert_id($conn)){
		//查询当前回帖的数量reply
		$resList=select($conn,'bbs_tie','reply',"classid=$classid and id=$id and first=1")[0];
		//回帖数量+1
		$set=[
				'reply'=>$resList['reply']+1
		];	
		//奖励积分
		$grade=[
				'grade'=>$resUser['grade']+10
		];

		//更新数据表信息
		$res=update($conn,'bbs_tie',$set,"classid=$classid and id=$id and first=1");
		//更新用户表
		$resUser=update($conn,'bbs_user',$grade,"uid=$uid");

		
		if($res && $resUser){
			//更新session的值
			$_SESSION['resUser']['grade']=$_SESSION['resUser']['grade']+10;

		  exit("<script>alert('回帖成功..奖励积分10分');window.location.href='detail.php?id=$id'</script>");
		 // exit ("<script>alert('发帖成功..奖励积分10分!');window.location.href='detail.php?id=$tid'</script>");
			//echo "<script>alert('回帖成功.奖励积分10分..正在跳转');</script>";
			echo "<meta http-equiv='Refresh' Content='0;detail.php?id=$id'/>";
		}else{
			exit("<script>alert('回帖失败');window.location.href='detail.php?id=$id'</script");
		}
		
	}






