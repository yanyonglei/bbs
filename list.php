<?php
	include './tpl/tpl_func.php';
	include './common/home.php';
		/**
	 * @auther yanyl
	 * 帖子表页面list.php 
	 */
	session_start();
	
	$time=date(('Y-m-d H:i:s'),time());
	if(isset($_SESSION['resUser'])){
		//
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
		$picture='./public/images/avatar_blank.gif';
	}	

	//接收从url传过来的参数classid 值
	$classId=isset($_GET['classid'])?$_GET['classid']:'';
	
	//查询板块名称 根据parentid 来查询 parentid=0 说明 是 大板块 php技术交流 程序人生
	//根据className[]['cid'] 来传递其id号实现跳转
	$className=select($conn,'bbs_category','*','parentid=0');
	$title='帖子列表-10分钟学院';

	//parentid 非零的查询
	$className1=select($conn,'bbs_category','*','parentid<>0');

	//var_dump($className1);
	//var_dump($_GET);
	//根据classid 去查询全部信息category信息
	$resList=select($conn,'bbs_category','*',"cid=$classId")[0];
	//获取板块的名字
	$nameTitle=$resList['classname'];
	//界面的title
	$title=$resList['classname'].'-10分钟学院';
	//一下部分开始遍历贴子列表

	

	//搜索的classid 下的发帖数
	$totalFirst=totalMore($conn,'bbs_tie','tid',"classid=$classId and first=1");
	//每天凌晨的时间戳
  	$startTime=strtotime(date('Y-m-d'),time());
  	//当期的时间戳
  	$end=time();
  	//查询今日发表的帖子数
	$totalEvery=totalMore($conn,'bbs_tie','tid',"classid=$classId and first=1 and addtime between $startTime and $end");

	
	//接收传过来的page参数
	
	$page=isset($_GET['page'])?$_GET['page']:1;
	//判断page 是否 大于零
	if($page<=1){
		$page=1;
	}
	$prev=$page-1;
	
	if($prev<1){
		$prev=1;
	}


	//搜索搜索出在 classid 在帖子的总数
	$sql="select count(tid) as total from bbs_tie where first=1 and classid=$classId";
	$total=0;
	$res=mysqli_query($conn,$sql);
	if($res && mysqli_affected_rows($conn)){
		$rows=mysqli_fetch_assoc($res);
		$total=$rows['total'];
	}
	//每页的帖子个数偏移量个
	$offSet=3;
	//总页数 进一法取整
	$pages=ceil($total/$offSet);
	//var_dump($pages);
 	//每页开始的位置
 	$start=($page-1)*$offSet;
	//接收是否精华帖数据
	$elit=isset($_Get['elit'])?$_GET['elit']:'';
 	//接收是否精华帖参数
 	$elite=isset($_GET['elite'])?1:'';
 	//判断是否是精华帖
 	if($elite==''){
 		$sql="select *,username from bbs_tie ,bbs_user where classid=$classId and first=1 and bbs_tie.authorid=bbs_user.uid order by istop desc limit  $start ,$offSet ";
 	}else if($elite==1 ){
 		$sql="select *,username from bbs_tie,bbs_user where classid=$classId and elite=1 and  first=1  and bbs_tie.authorid=bbs_user.uid order by istop  limit $start ,$offSet ";
 		
 	}
 	//执行sql语句
 	$resCurrent=mysqli_query($conn,$sql);
 	//上一页
	
	//下一页
	$next=$page+1;
	if($next>=$pages){
		$next=$pages;
	}
 	//获取分页的结合数组
 	$currentList=[];
 	if($resCurrent && mysqli_affected_rows($conn)){
 		while($rows=mysqli_fetch_assoc($resCurrent)){
 				$currentList[]=$rows;
 		}
 	}
 //	var_dump($currentList);
  
 	//分页传递的参数
 	$page = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
	
	if ($page < 1) {
		$page  = 1;
	}

	//修改时间格式
	for ($i=0; $i < count($currentList); $i++) { 
		$currentList[$i]['addtime']=date("Y-m-d",$currentList[$i]['addtime']);
	}

  	
  	//从bbs_tie查询出classid下 下的 回帖 更新 bbs_category表
  	$replycount=totalMore($conn,'bbs_tie','reply',"classid=$classId and first=0");
  	//var_dump($replycount);
  	//查询在classid下的帖子总数
  

  	$motifcount=totalMore($conn,'bbs_tie','tid',"classid=$classId");
	//var_dump($motifcount);
  	//更新bbs_category数据表
  	update($conn,'bbs_category',['replycount'=>$replycount,'motifcount'=>$motifcount],"cid=$classId");


  	
	

	//使用模板引擎
	display('list.html',compact('title','username','picture','grade','time','udertype','className','className1','classId','nameTitle','resList','currentList','pages','page','next','prev','offSet','total','elite','totalFirst','totalEvery'));






