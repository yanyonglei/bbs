<?php

include './helper/jump.php';
include './common/home.php';

//开启session()
session_start();

//通过post 获取表单里的数据信息
$title=trim($_POST['title']);

//帖子的内容
$content=trim($_POST['content']);
//板块的id classid

$classid=$_POST['classid'];

//帖子的金钱数
$money=trim($_POST['money']);

//判断积分
if ($money>30) {
	exit ("<script>alert('金钱的数量不能超过30!');window.location.href='addc.php?classid=$classid'</script>");
}else if($money>=0 && $money<=30){
	//售价积分
	$rate=$money;
}else {
	echo '<meta http-equiv="Refresh" content="1;index.php/>';
}


//发帖的时间
$time=time();
//发帖的地址
if($_SERVER['REMOTE_ADDR']=='::1'){
		$addip='127.0.0.1';
}else{
		$addip=$_SERVER['REMOTE_ADDR'];
}

$addip=ip2long($addip);

//第一次发帖first设计为1
$first=1;
//一个板块的用户id
$uid=$_SESSION['resUser']['uid'];

//function big($link,$table,$fields)

$max=big($conn,'bbs_tie','id');

$tid=$max+1;

$resUser=$_SESSION['resUser'];
//var_dump($max);
//用户编号uid
$uid=$resUser['uid'];

//插入表中的数据
$data=[

	'first'=>$first,
	'tid'=>$tid,
	'authorid'=>$uid,
	'title'=>$title,
	'content'=>$content,
	'addip'=>$addip,
	'rate'=>$rate,
	'classid'=>$classid,
	'addtime'=>$time,
	'reply'=>0,
	'hits'=>0,
	'isdel'=>0,
	'istop'=>0

];


$updateData=[
	'grade'=>$resUser['grade']+10
];

//数据插入数据表内
$res=insert($conn,'bbs_tie',$data);

//var_dump($_SESSION['resUser']['grade']);die;


if($res){
	update($conn,'bbs_user',$updateData,"uid=$uid");
	$_SESSION['resUser']['grade']=$_SESSION['resUser']['grade']+10;

	exit ("<script>alert('发帖成功..奖励积分10分!');window.location.href='detail.php?id=$tid'</script>");

}else{
	//
	exit ("<script>alert('发帖失败重新检查!');window.location.href='addc.php?classid=$classid'</script>");
}
	





