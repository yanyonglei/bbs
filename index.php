<?php

include './tpl/tpl_func.php';
include './common/home.php';
/**
 * @auther yanyl
 * 主页面index.php
 */
session_start();
$title='10分钟-学院';
$time=date(('Y-m-d H:i:s'),time());
//var_dump($_SESSION);

if(isset($_SESSION['resUser'])){

	$resUser=$_SESSION['resUser'];
	//用户名
	$username=$resUser['username'];
	//用户类型
	$udertype=$resUser['udertype'];
	//积分
	$grade=$resUser['grade'];

	$picture=$resUser['picture'];
	
}else{

	$username="";
	//用户类型
	$udertype="";
	//积分
	$grade="";
	$picture="./public/images/avatar_blank.gif";
}	

	//搜索会员的总数
	$count=total($conn,'bbs_user','uid');
	//var_dump($count);
	//查询最新注册的用户uid 最大
	$max=big($conn,'bbs_user','uid');
	//var_dump($max);
	$res=select($conn,'bbs_user','username',"uid=$max");
	$newestUser=$res[0]['username'];



	//以displayorder 搜索数据库将其显示在界面上
	$linkInfo=select($conn,'bbs_link','*');
	//var_dump($linkInfo);
	//查询出来帖子的总数
	$sum=sum($conn,'bbs_category','motifcount');
	


	//查询板块名称 根据parentid 来查询 parentid=0 说明 是 大板块 php技术交流 程序人生
	//根据className[]['cid'] 来传递其id号实现跳转
	$className=select($conn,'bbs_category','*','parentid=0');	
	

	//var_dump($className);
	//var_dump($className);
	//接收传递的大板块id
	//判断接收的cid是否为空 若为从数据库内取出去全部的内容
	$bigid=isset($_GET['bigid'])?$_GET['bigid']:'';
   
    if(empty($_GET['bigid'])){


         $class=select($conn,'bbs_category','*','parentid=0');	

		//查询出来 查询出来  各个模块的内容 parentid 不是零的版块名称小版块内容
		//$className=select($conn,'bbs_category','cid,classname,parentid','parentid=0');
		$className1=select($conn,'bbs_category','*','parentid != 0');
		//量表联合查询查出来 最后发帖的信息		
		$sql='select cid,classid ,title ,addtime,username from bbs_tie,bbs_category,bbs_user where bbs_category.cid=bbs_tie.classid and bbs_user.uid = bbs_tie.authorid and first=1 group by classname';
		
		$res=mysqli_query($conn,$sql);
		//$data=[];
		if ($res && mysqli_affected_rows($conn)) {

			while($rows=mysqli_fetch_assoc($res)){
				$data[]=$rows;
			}
			
		}

	//板块的id=1
	}else{

		//接收穿过来的参数bigid
		$bigid=$_GET['bigid'];
		//在bbs_category数据表中查询出来大板块的parentid=bigid=1;
		//($conn,'bbs_category','*','parentid=0');
		$class=select($conn,'bbs_category','*',"parentid=0 and $bigid = cid");

		$className1=select($conn,'bbs_category','*',"parentid=$bigid");

		//var_dump($className1);

		//在bbs_detail 表中查询纤细信息
		
		$sql='select cid,classid ,title ,addtime,username from bbs_tie,bbs_category,bbs_user where bbs_category.cid=bbs_tie.classid and bbs_user.uid=bbs_tie.authorid and first=1 group by classname';	
		$res=mysqli_query($conn,$sql);
		//$data=[];
		if ($res && mysqli_affected_rows($conn)) {

			while($rows=mysqli_fetch_assoc($res)){
				$data[]=$rows;
			}
			
		}	
	}

		/*var_dump($className1);
		var_dump($data);*/
	

		display('index.html',compact('title','username','linkInfo','count','udertype','grade','time',

		'newestUser','picture','className','class','className1','sum','setData','bigid','data'));

	
