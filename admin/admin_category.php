<?php
	//后台的配置文件
	
	include '../tpl/tpl_func_admin.php';

	include '../common/admin.php';

	$title="10分钟学院 - 后台管理 - 用户管理 - 版块管理";


	//查询大板块classNames panrnetid=0;
	$classNames=select($conn,'bbs_category','*','parentid=0 order by orderby desc');
	
	
	
	//查询 小版块classItemNames panrnetid<>0;
	$classItemNames=select($conn,'bbs_category','*','parentid !=0  order by  orderby desc');

	//var_dump($_POST);

	$save=isset($_POST['save'])?$_POST['save']:'';

	if($save=='提交'){
		//获取表单各个部分的值
		//cid
		$cid=isset($_POST['cid'])?$_POST['cid']:'';
		//排序
		$orderby=isset($_POST['orderby'])?$_POST['orderby']:'';
		//小板块名
		$className=isset($_POST['className'])?$_POST['className']:'';

		//小版块名
		$compere=isset($_POST['compere'])?$_POST['compere']:'';
		for($i=0;$i<count($cid) ;$i++){
			if($className[$i]!=''){
				$data['classname']=$className[$i];
			}
			if(!empty($compere['$i'])){
				$data['compere']=$compere[$i];
			}
			$data['orderby']=$orderby[$i];

			update($conn,'bbs_category',$data,"cid=$cid[$i]");
		}

		echo '<meta http-equiv="Refresh" content="0;admin_category.php"/>';
		
	}

	
	   

		display('admin_category.html',compact('title','classNames','classItemNames'));