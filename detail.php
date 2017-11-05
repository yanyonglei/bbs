<?php

//帖子回帖列表
include './tpl/tpl_func.php';
include './common/home.php';

$title="帖子详情--10分钟学院";
session_start();
$time=date(('Y-m-d H:i:s'),time());
//查询大板块的所有内容
$className=select($conn,'bbs_category','*','parentid=0');	
$uid="";
$resUser='';
if(isset($_SESSION['resUser'])){
	;
	$resUser=$_SESSION['resUser'];
	//用户名
	$username=$resUser['username'];
	$uid=$resUser['uid'];
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
	$picture='./public/images/avatar_blank.gif';
}
	


	//根据 id 从数据库内查询 id = 1 的所有数据   id 查询出来tid=id 的所有数据
	$id=$_GET['id'];
	
	
	//结果集合
	//根据 id 查出来classid  板块的名称
	$classId =select($conn,'bbs_tie','classid',"id=$id")[0]['classid'];
	
	//从数据得到 当tid=id 是帖子的数
	$sql="select count(tid) as total from bbs_tie where tid=$id  and classid =$classId";

	$res=mysqli_query($conn,$sql);
	//帖子总数总数是帖子的数
	$total='';
	if($res &&mysqli_affected_rows($conn)){
		$total=mysqli_fetch_assoc($res)['total'];
	}
	//详细界面包括 发帖和对帖子的评论部分结 first=0;表示回复的帖子 1表示发表的帖子 
	//回复帖是的 tid 与 发帖的 tid 相同 多表联合查询
	$resList=select($conn ,"bbs_tie,bbs_user",'*,username,picture,grade,udertype',"tid=$id and classid =$classId and bbs_tie.authorid=bbs_user.uid");



	


	//精华帖设置
	$elite=isset($_GET['elite'])?1:'';
	//当elite==1时更数据库字段信息
	//var_dump($elite);
	if($elite==1){
		// update($link,$table ,$data,$where)
		update($conn,'bbs_tie',['elite'=>1],"id=$id and first=1");
		//刷新当亲页面
	//echo "<meta http-equiv='Refresh' content='0;detail.php?id=$id'/>";

	}


	//根据帖子id 和 class id  fisrt 查询前帖子的浏览次数
	$hits=select($conn ,"bbs_tie",'hits',"tid=$id and classid =$classId  and first=1")[0];
	//var_dump($hits);
	//将浏览帖子的次数+1更新数据库
	//var_dump($id);
	$hits=$hits['hits']+1;
	$set=[
		'hits'=>$hits
	];

	//更新的数据表信息
	update($conn,'bbs_tie',$set,"tid=$id and classid =$classId  and first=1");

	//分页的设计 在classid 下 查询发帖的总数
	$sql="select count(tid) as total from bbs_tie where  tid=$id and classid =$classId";

	//var_dump($sql);

	//总页数
	$total=0;
	$res=mysqli_query($conn,$sql);
	if($res && mysqli_affected_rows($conn)){
		$rows=mysqli_fetch_assoc($res);
		$total=$rows['total'];
	}

	$page=isset($_GET['page'])?$_GET['page']:1;
	//判断page 是否 大于零
	if($page<1){
		$page=1;
	}
	$prev=$page-1;
	
	if($prev<1){
		$prev=1;
	}

	//每页的帖子个数偏移量个
	$offSet=1;
	//总页数 进一法取整
	$pages=ceil($total/$offSet);

	if($page>$pages){
		$page=$pages;
	}
	//var_dump($pages);
	
	
 	//每页开始的位置
 	$start=($page-1)*$offSet;

 	//限制查询查询 classid 下的全部内容 tid classid 下的所有内容
 	$sqlLimt="select * ,username,grade,udertype ,picture from bbs_tie ,bbs_user where tid=$id and classid=$classId and bbs_user.uid=bbs_tie.authorid limit $start ,$offSet ";
 //	var_dump($sqlLimt);
 	
 	//var_dump($sqlLimt);
 	//var_dump($id);
 	$resCurrent=mysqli_query($conn,$sqlLimt);

 	//获取分页的集合数组
 	$currentList=[];
 	if($resCurrent && mysqli_affected_rows($conn)){
 		while($rows=mysqli_fetch_assoc($resCurrent)){
 				$limitList[]=$rows;
 		}
 	}

 	//下一页
	$next=$page+1;
	if($next>=$pages){
		$next=$pages;
	}


	//集合数据信息的设置
	
	$lastList=[];
	if(isset($_GET['page'])){
		$lastList=$limitList;
	}else{
		$lastList=$resList;
	}
	//var_dump($page,$pages);

	//删除帖的功效del 标志
	
	$del=isset($_GET['del'])?$_GET['del']:'';
	
	if($del==1){
		//判断登陆的用户是否管理员 或者是否是发帖人
		if($resUser['udertype']==1 || $resUser['uid']==$resList[0][uid] ){
			//删除数据库
			$resDel=del($conn,'bbs_tie',"id=$id");
		
			if($resDel){
				echo '<meta http-equiv="Refresh" content="0;index.php">';
			}
		}
	}
	//置顶帖设置
	$istop=isset($_GET['istop'])?$_GET['istop']:'';
	//修改帖是否置顶
	if($istop==1){
		$res=update($conn,'bbs_tie',['istop'=>1],"tid=$id and first=1");

		if($res){
			echo '<meta http-equiv="Refresh" content="0;index.php"';
		}
		
	}
	

	//高量处理
	//高亮功能
	$style=isset($_GET['style'])?$_GET['style']:'';
	if(isset($_GET['style'])){
		
		$res=update($conn,'bbs_tie',['style'=>1],"tid=$id and first=1");
		if($res){
			echo '<meta http-equiv="Refresh" content="0;index.php"';
		}
  		
    }


	//一下代码处理购买帖子的代码
	$ispay=isset($_GET['ispay'])?$_GET['ispay']:'';
	//同意购买
	if($ispay==1){
		//判断用户是否登陆
		if($resUser==''){
			exit ("<script>alert('没有登录跳转登录界面！');window.location.href='nologin.php'</script>");
		}

		//根据帖id查询帖的售价
		$rate=select($conn,"bbs_tie",'rate',"tid=$id and classid =$classId  and first=1")[0];
		//判断用户是否可以购买积分
		//用户当前的积分
		$CurrentGrade=$resUser['grade'];
		//两者之间的差值
		$intersect=$CurrentGrade -$rate['rate'];
		//var_dump($intersect);
		if( $intersect < 0 ){
			exit ("<script>alert('积分过低不能购买');window.location.href='index.php'</script>");
		}else{
			//购买帖
			//购买信息加入数据库
			$data=[
				'uid'=>$resUser['uid'],
				'tid'=>$id,
				'rate'=>$rate['rate'],
				'ispay'=>1,
				'addtime'=>time()

			];

			$set=[
				'grade'=>$resUser['grade']-$rate['rate']
			];
			
			//订单信息加入bbs_order表
			insert($conn,'bbs_order',$data);	
			update($conn,'bbs_user',$set,"uid=$uid");
			$_SESSION['resUser']['grade']=$_SESSION['resUser']['grade']-$rate['rate'];
		}
	}
	//搜索加积分帖购买的状态
	
	$ispayed=select($conn,'bbs_order','ispay',"uid=$uid and tid=$id");
	//var_dump($ispayed);

	display('detail.html',compact('title','username','udertype','resList','total','page','currentList','pages','picture','udertype','className','grade','time','classId','ispayed','id','elite','prev','next','offSet','lastList','ispayed','style'));		