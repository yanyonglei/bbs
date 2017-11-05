<?php
	//后台的配置文件
	
	include '../tpl/tpl_func_admin.php';
	include '../common/admin.php';

	$title="后台管理";

	//查询回帖的总数
	$total=totalMore($conn,'bbs_tie,bbs_category, bbs_user','id','first=0 and isdel=0  and bbs_user.uid=bbs_tie.authorid and bbs_tie.classid=bbs_category.cid');
		
	//三表联合查询获取数据信息发帖的信息
	  $sql="select id,username,classname,classid,title,addtime,reply,content from bbs_category, bbs_user ,bbs_tie where first=0 and isdel=0 and bbs_user.uid=bbs_tie.authorid and bbs_tie.classid=bbs_category.cid order by addtime desc";
		//数据信息赋值给数组
		$resInfo=mysqli_query($conn,$sql);
		$info=[];
		if($resInfo && mysqli_affected_rows($conn)){
			while($rows=mysqli_fetch_assoc($resInfo)){
				$info[]=$rows;
			}
	   }

	  //操作表单提交的数据 删除回帖信息
	  $ids=(isset($_POST['id']))?$_POST['id']:'';
	 // var_dump($ids);
	  if ($ids!='') {
	  $id=implode(',',$ids);
	 
	  	//修改信息，进行伪删除操作
	  	$resupdate=update($conn,'bbs_tie',['isdel'=>1],"id in($id)");
	  	//判断函数的返回值刷新当前的页面
	  	if($resupdate){
	  		echo '<meta http-equiv="Refresh" content="0;admin_detail_hf.php" />';
	  	}
	  }


	 display('admin_detail_hf.html',compact('title','info','total','total'));

