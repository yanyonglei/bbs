<?php
	//后台的配置文件
	
	/*
	 该界面的功能是:对连接的增删修改
	 */

	include '../tpl/tpl_func_admin.php';
	include  '../common/admin.php';



	$title="友情链接-后台管理-10分钟学院";

	//获取表单信息
	//添加友情链接的信息
	//var_dump($_GET);
	if(!empty($_GET)){
		
		$displayorder=$_GET['shunxu'];
		//站点为名称
		$name=$_GET['mingcheng'];
		//url
		$url=$_GET['path'];
		//站点描述
		$description=$_GET['miaoshu'];
		//logo
		$logo=$_GET['biaozhi'];
		//链接的添加时间
		$time=time();

		if(!empty($displayorder) && !empty($name) && !empty($url)){
		
			$data=[
					'displayorder'=>$displayorder,
					'name'=>$name,
					'url'=>$url,
					'description'=>$description,
					'logo'=>$logo,
					'addtime'=>$time
			];

			//插入数据操作
			$resIink=insert($conn,'bbs_link',$data);

		}
	}

	//以displayorder 搜索数据库将其显示在界面上
	$sql="select * from bbs_link order by displayorder desc ";

	$resLink=mysqli_query($conn,$sql);
//	$linkInfo=[];
	if($resLink && mysqli_affected_rows($conn)){
		while($rows=mysqli_fetch_assoc($resLink)){
				$linkInfo[]=$rows;
		}
	}
	//删除网址的操
	//var_dump($linkInfo);
	//$ids=$_POST['id'];
	if(!empty($_POST)){
		$del=isset($_POST['del'])?$_POST['del']:'';
		//判断是否进行删除操作
		if($del=='删除'){
			//字符串
			$ids=isset($_POST['id'])?$_POST['id']:'';
			//var_dump($ids);
			if($ids!=''){
				$id=implode(',',$ids);
				$res=delMore($conn,'bbs_link',"lid in($id)");
				if($res){
				//刷新当亲界面
				echo '<meta http-equiv="Refresh" content="0;admin_link.php" />';
				}
			}
			
		} 

	}
	  //修改链接信息
	
		//获取删除的标志
		$modify=isset($_POST['modify'])?$_POST['modify']:'';
		$id=isset($_POST['id'])?$_POST['id']:'';
		if($modify=="修改" && $id!=''){

			//切割字符串
			//获取提取表单的各组数据
			$lid=$_POST['lid'];
			//顺序
			$displayorder=$_POST['displayorder'];
			$url=$_POST['url'];
			$description=$_POST['description'];
			$logo=$_POST['logo'];
			$name=$_POST['name'];
			//拼接sql语句
			$sqlUpdate='';
			for ($i=0; $i < count($lid); $i++) { 
				$sqlUpdate ="update bbs_link set displayorder=$displayorder[$i] ,url='$url[$i]',logo='$logo[$i]',name='$name[$i]' where lid=$lid[$i];";
				mysqli_query($conn,$sqlUpdate);
				
			}	
			echo '<meta http-equiv="Refresh" content="0;admin_link.php" />';
		}
		display('admin_link.html',compact('title','linkInfo'));