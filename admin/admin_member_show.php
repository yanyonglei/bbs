<?php
	//后台的配置文件
	
	include '../tpl/tpl_func_admin.php';
	include  '../common/admin.php';

	$title="10分钟学院 - 管理中心 - 用户管理 - 编辑用户";

	//获取url 穿过来的参数 用户的编号
	$uid=isset($_GET['id'])?$_GET['id']:'';
	if($uid!=''){
		
		$userInfo=select($conn,'bbs_user','*',"uid=$uid")[0];
	}
	//var_dump($userInfo);
		 //查询用户的总数
	display('admin_member_show.html',compact('title','userInfo'));