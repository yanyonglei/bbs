<?php

/*功能:搜索界面的实现
		

 */
include './tpl/tpl_func.php';
include './common/home.php';

session_start();
$title='搜索-10分钟学院';
if(isset($_SESSION['resUser'])){

	$resUser=$_SESSION['resUser'];
	//用户名
	$username=$resUser['username'];
}

//获取搜索框里的内容关键字查询
$key=isset($_POST['key'])?$_POST['key']:'';
//判断关键字是否为空
$resInfo=[];
if($key!=''){
	$sql="select * from bbs_tie where content like '%$key%' or title like '%$key%' ";
	//var_dump($sql);
	$res=mysqli_query($conn,$sql);

	if($res && mysqli_affected_rows($conn)){
		while($rows=mysqli_fetch_assoc($res)){
			$resInfo[]=$rows;
		}
	}
}


display('search.html',compact('title','resInfo'));














