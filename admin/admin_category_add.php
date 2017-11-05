<?php
	//后台的配置文件
	
	include '../tpl/tpl_func_admin.php';
	include  '../common/admin.php';

	$title="10分钟学院 - 管理中心 - 用户管理 - 添加版块";

	if(!empty($_POST)){
		//获取大板块的名称
		$classname=isset($_POST['classname'])?trim($_POST['classname']):'';
		//获取每一个classitem
		$classItem=$_POST['classitem'];
		//此时添加大板块数据
		if(!empty($classname) && $classItem=='-不选择-'){
			$data=[
					'classname'=>$classname,
					'parentid'=>0,
					'orderby'=>1
			];
			//将数据信息加入数据
			$resClass=insert($conn,'bbs_category',$data);
			//判断插入成功刷新当前界面
			if($resClass){
				//
				echo '<meta http-equiv="Refresh" content="1;admin_category_add.php" >';
			}

			//在大板块下面下面添加子板块
		}else if(!empty($classname) && $classItem!='-不选择-'){

			//查询classItem的cid
			$cids=select($conn,'bbs_category','cid',"classname='$classItem'")[0];
			//获取板块id cid
			$cid=$cids['cid'];

			$data=[
					'classname'=>$classname,
					'parentid'=>$cid,
					'orderby'=>1
			];
			//将数据信息加入数据
			$resClass=insert($conn,'bbs_category',$data);
			//判断插入成功刷新当前界面
			if($resClass){
				echo '<meta http-equiv="Refresh" content="1;admin_category_add.php" >';
			}

		}	

	}


		//搜索所有数据parentid==0数据
		$resParent=select($conn,"bbs_category",'*','parentid=0');
		//var_dump($resParent);

	display('admin_category_add.html',compact('title','resParent'));

