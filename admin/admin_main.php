<?php


	include '../tpl/tpl_func_admin.php';
	include '../common/admin.php';

	$title="10分钟学院-站点信息-后台管理";


	//搜索数据库得到网站的所有信息
	$info=select($conn,'bbs_net','*')[0];



	// 1是开启状态
	if($info['isclose']==1){
		$data=[
		'allowlogin'=>0
		];

		//把非管理员的状态更新为0
		update($conn,'bbs_user',$data,"udertype=0 and udertype=1");

	}else{
		//允许登陆allowlogin 状态是1
		$data=[
		'allowlogin'=>1
		];
		//把非管理员的状态更新为0
		update($conn,'bbs_user',$data,"udertype=0 and udertype=1");

	}

	

	//var_dump($info);

	//获取表单提交的数据
	//var_dump($_POST);
	if(!empty($_POST)){

		//获取数据表信息
		$name=trim($_POST['name']);
		$netname=trim($_POST['netname']);
		$url=trim($_POST['url']);
		$information=trim($_POST['info']);
		$isclose=$_POST['isclose'];



		$set=[
				'name'=>$name,
				'netname'=>$netname,
				'url'=>$url,
				'info'=>$information,
				'isclose'=>$isclose

		];


		//更新数据信息
		
		update($conn,'bbs_net',$set,'id=1');
		//刷新当前页面
		echo '<meta http-equiv="Refresh" content="1;admin_main.php" >';
	}

	display('admin_main.html',compact('title','info'));



