<?php
	
	/*本页面的作用是锁定ip将ip 加入数据库
	*/
	//后台的配置文件
	include '../tpl/tpl_func_admin.php';
	include '../common/admin.php';

	$title="锁定ip-后台管理-10-分钟学院";


	//搜索数据库获取全部的ip信息
	$resIp=select($conn,'bbs_closeip','*');




	//判断表单提交按钮是否操作
	if(!empty($_POST)){
		//ip数组
		$ip=isset($_POST['num'])?$_POST['num']:0;
		//ip值的有效期
		$days=isset($_POST['yxq'])?$_POST['yxq']:0;

		//将ip数组变为地址格式
		$ip=implode('.',$ip);
		var_dump($ip);
		//字符串转化为long
		$ip=ip2long($ip);
		//开始的时间
		$time=time();

		//结束时间
		$overtime=time()+$days*24*60*60;

		//ip的有效时间

		$data=[
				'ip'=>$ip,
				'addtime'=>$time,
				'overtime'=>$overtime

		];
		$resIp=insert($conn,'bbs_closeip',$data);
		//判断插入数据库数据是否成功
		if($resIp){
			
		}

		echo '<meta http-equiv="Refresh" content="0;admin_lock_ip.php">';

	}

	display('admin_lock_ip.html',compact('title','resIp'));