<?php
include './common/home.php';
include './tpl/tpl_func.php';
session_start();
$title='发帖界面--10分钟学院';
$time=date(('Y-m-d H:i:s'),time());
//var_dump($_SESSION);

//在发帖界面显示之前判断该用户是否已经登录
//结束传过来的参数classid 值
$classid=$_GET['classid'];


//查询板块名称 根据parentid 来查询 parentid=0 说明 是 大板块 php技术交流 程序人生
//根据className[]['cid'] 来传递其id号实现跳转
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

	//搜索会员的总数
	$count=total($conn,'bbs_user','uid');
	//var_dump($count);
	//查询最新注册的用户uid 最大
	$max=big($conn,'bbs_user','uid');
	//var_dump($max);
	$res=select($conn,'bbs_user','username',"uid=$max");
	$newestUser=$res[0]['username'];
	//查询出来帖子的总数
	
	$sum=sum($conn,'bbs_category','motifcount');
	//根据classid 去查询全部信息category信息
	$resList=select($conn,'bbs_category','*',"cid=$classid")[0];
	//获取板块的名字
	$nameTitle=$resList['classname'];
	//界面的title
	


	$title=$resList['classname'].'-10分钟学院-发帖';
	//调用模板引擎函数
	display('addc.html',compact('title','picture','username','udertype','grade','time','className','classid'));
	
}else{

		$username="";
		//用户类型
		$udertype="";
		//积分
		$grade="";
		$picture='/public/images/avatar_blank.gif';

	//如果没有登录跳转登录界面
	exit ("<script>alert('没有登录跳转登录界面！');window.location.href='nologin.php'</script>");
	//echo '<meta http-equiv="REFRESH" Content="0;nologin.php">';	
	//exit();
	
}	


	



