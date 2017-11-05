<?php

include  '../common/admin.php';

//接收用户是否锁定id 的值
	if(isset($_GET['lock'])){
	
		//获取用户uid
		$uid=$_GET['id'];
			
		//锁定用户
		if($_GET['lock']==1){
			
			$allowlogin=0;
			}else{
				$allowlogin=1;
			}
		$data=[
			'allowlogin'=>$allowlogin
		];
		$resUpdate= update($conn,'bbs_user',$data,"uid=$uid");
		
		if($resUpdate){
					//刷新当前页面
			echo '<meta http-equiv="Refresh" content="0;admin_member.php" />';
		}

	}
