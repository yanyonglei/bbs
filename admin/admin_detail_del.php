<?php
	//后台的配置文件
	
	include '../tpl/tpl_func_admin.php';
	include '../common/admin.php';
	$title="10分钟学院 - 管理中心 - 用户管理 - 帖子管理";

	//获取发帖信息并且回是收站里
	$total=totalMore($conn,'bbs_tie,bbs_category, bbs_user','id','first=1 and isdel=1 and bbs_user.uid=bbs_tie.authorid and bbs_tie.classid=bbs_category.cid');

	$sql="select id, username,classname,classid,title,addtime,reply,hits from bbs_category, bbs_user ,bbs_tie where first=1 and isdel=1 and bbs_user.uid=bbs_tie.authorid and bbs_tie.classid=bbs_category.cid  group by addtime order by addtime desc";
	//var_dump($sql);
	//数据信息赋值给数组
	$resInfo=mysqli_query($conn,$sql);
	$info=[];
	if($resInfo && mysqli_affected_rows($conn)){
		while($rows=mysqli_fetch_assoc($resInfo)){
			$info[]=$rows;
		}
	}
	//获取帖子的id
	$ids=isset($_POST['id'])?$_POST['id']:'';
	$del=isset($_POST['del'])?$_POST['del']:'';
	$recover=isset($_POST['recover'])?$_POST['recover']:'';


	//var_dump($_POST);
	//获取表单数据信息
	if($del=='删除主题' && $ids!=''){

			$id=implode(',', $ids);
			$res=del($conn,'bbs_tie',"id  in($id)");
			if($res){
				echo '<meta http-equiv="Refresh" content="0;admin_detail_del.php" />';
			}

	}else 
		
	if($recover=='恢复主题' && $ids!=''){
			$id=implode(',', $ids);
			//更细数据信息
			$res=update($conn,'bbs_tie',['isdel'=>0],"id  in($id)");
			if($res){
				echo '<meta http-equiv="Refresh" content="0;admin_detail_del.php" />';
			}
	}

	display('admin_detail_del.html',compact('title','info','total'));

