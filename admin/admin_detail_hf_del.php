<?php
	//后台的配置文件
	
	include '../tpl/tpl_func_admin.php';
	include '../common/admin.php';
	$title="10分钟学院 - 管理中心 - 用户管理 - 回帖管理";

	$total=totalMore($conn,'bbs_tie, bbs_category, bbs_user','id','first=0 and isdel=1 and bbs_user.uid=bbs_tie.authorid and bbs_tie.classid=bbs_category.cid and isdel=1');
	

	//查出来放入回收站的回帖内容
	$sql="select content,id,username,classname,classid,title,addtime,reply,hits from bbs_category, bbs_user ,bbs_tie where first=0 and isdel=1 and bbs_user.uid=bbs_tie.authorid and bbs_tie.classid=bbs_category.cid and isdel=1 group by addtime order by addtime desc";
	//var_dump($sql);
	

	//数据信息赋值给数组
	$resInfo=mysqli_query($conn,$sql);
	$info=[];
	if($resInfo && mysqli_affected_rows($conn)){
		while($rows=mysqli_fetch_assoc($resInfo)){
			$info[]=$rows;
		}
	}


	//提交的表单中获取数据信息
	$ids=isset($_POST['id'])?$_POST['id']:'';
	$del=isset($_POST['del'])?$_POST['del']:'';
	$recover=isset($_POST['recover'])?$_POST['recover']:'';


	//获取表单数据信息
	if($del=='删除主题' && $ids!=''){
			echo '删除';
			$id=implode(',', $ids);
			$res=del($conn,'bbs_tie',"id  in($id)");
			if($res){
				echo '<meta http-equiv="Refresh" content="0;admin_detail_hf_del.php" />';
			}

	}else 
		
	if($recover=='恢复主题' && $ids!=''){
		 //  echo '回复操作';
			$id=implode(',', $ids);
			//更细数据信息
			$res=update($conn,'bbs_tie',['isdel'=>0],"id  in($id)");
			if($res){
				echo '<meta http-equiv="Refresh" content="0;admin_detail_hf_del.php" />';
			}
	}

	display('admin_detail_hf_del.html',compact('title','info','total'));

