<?php
	//后台的配置文件
	
	//对用户的
	include '../tpl/tpl_func_admin.php';
	include  '../common/admin.php';

	$title="编辑用户-用户管理-后台管理-10分学院";
	//
	//搜索用户的总数
	$total=total($conn,'bbs_user','uid')[0];
	//搜索数据库获得所有用户新
	//获取护表单提交的数据用户uid集合
	$uids=[];
	if(!empty($_POST['uid'])){

			$uids=$_POST['uid'];
				//var_dump($uid);
			//将数组元素变成字符串
			$uid=implode(',', $uids);
			//var_dump($sql);
			//删操作数据库
			$res=delMore($conn,'bbs_user',"uid in($uid)");
			if($res){
				//刷新当亲界面
				echo '<meta http-equiv="Refresh" content="0;admin_member.php" />';
		}
	}
	
	$userInfo=select($conn,'bbs_user','*');
	//修改时间格式
	for($i=0;$i<count($userInfo);$i++){
		$userInfo[$i]['regtime']=date('Y-m-d H:i:s',$userInfo[$i]['regtime']);
	}
	//
	display('admin_member.html',compact('title','total','userInfo'));