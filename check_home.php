<?php


include './tpl/tpl_func.php';
include './common/home.php';

//开启session
 session_start();
include './helper/jump.php';
//var_dump($_POST);

//获取信息
$real=$_POST['real'];
$sex=$_POST['sex'];
if($_POST['sex']=='保密'){
	$sex=2;
}else if($_POST['sex']=='男'){
	$sex=1;
}else {
	$sex=0;
}

$year=trim($_POST['year']);
$month=trim($_POST['month']);
$day=trim($_POST['day']);

$birthday=$year.'-'.$month.'-'.$day;

$city=trim($_POST['city']);

$qq=trim($_POST['QQ']);


//获取当前用户在数据库中放入id
$uid=$_SESSION['resUser']['uid'];


$qQPattern='/[1-9][0-9]{5,14}/';
//qq号正则的验证
if(!preg_match($qQPattern, $qq,$matches)){
		//exit( 'QQ号格式错误');
		exit("<script>alert('QQ号格式错误..正在跳转');window.location.href='home.php'</script>");
}

$data=[
	'realname'=>$real,
	'sex'=>$sex,
	'birthday'=>$birthday,
	'place'=>$city,
	'qq'=>$qq
];

//更新数据库信息
$result=update($conn,'bbs_user',$data,"uid=$uid");

if($result){

	exit("<script>alert('修改成功');window.location.href='home.php'</script>");

}


