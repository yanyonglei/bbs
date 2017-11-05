<?php
	//后台的配置文件
	
	include '../tpl/tpl_func_admin.php';
	include '../common/admin.php';
	$title="10分钟学院 - 管理中心 - 用户管理 - 帖子管理";


		//获取最后发表的时间
			//从bbs_tie表下获取
	$total=totalMore($conn,'bbs_tie,bbs_category,bbs_user','id','first=1 and isdel=0  and bbs_user.uid=bbs_tie.authorid and bbs_tie.classid=bbs_category.cid');
		//三表联合查询获取数据信息发帖的信息 搜索没有放入回收站的全部信息
	  $sql="select id, username,classname,classid,title,addtime,reply,hits FROM bbs_category, bbs_user ,bbs_tie where first=1 and isdel=0 and bbs_user.uid=bbs_tie.authorid and bbs_tie.classid=bbs_category.cid group by addtime order by addtime desc";
		//var_dump($sql);
		//数据信息赋值给数组
		$resInfo=mysqli_query($conn,$sql);
		$info=[];
		if($resInfo && mysqli_affected_rows($conn)){
			while($rows=mysqli_fetch_assoc($resInfo)){
				$info[]=$rows;
			}
		}
	  //根据表单将信息放入回收站
	 
	 $ids=(isset($_POST['id']))?$_POST['id']:'';
	 if($ids!=''){
		//获取表单传过来的数据 是一个数组


		$id=join(',',$ids);
		//修改数据库的字段值 isdel=1; 
		$res=update($conn,'bbs_tie',['isdel'=>1],"id in($id)");
		if($res){
			//如果操作成功刷新界面
		echo '<meta http-equiv="Refresh" content="0;admin_detail.php"/>';
		}

		

	}
	
	//var_dump($info);
	display('admin_detail.html',compact('title','info','total'));

