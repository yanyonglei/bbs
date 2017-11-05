<?php


include './helper/upload.php';
include './helper/sf.php';
include './config/common.php';
include './common/home.php';
include './helper/jump.php';
session_start();
//上传图片函数
$data=upload(
		'file',
		'./upload',
		pow(1024,2)*2,
		[
			'image/png',
			'image/jpeg',
			'image/gif',
			'image/bmp',
			'image/wbmp'
		],
		[
			'png','gif','jpeg','wbmp','bmp','jpg'
		],
		false
	);
//var_dump($data);

//调用缩放函数缩小图片的比例
$info=suofang($data[1] , 50 , 50, './upload');
//删除原先上传的图片保留缩放后的图片
//var_dump($info);
//删除原先的文件
unlink($data[1]);


//图片信息更新数据库
$uid=$_SESSION['resUser']['uid'];
//上传的图片路径存入数据库
$result=update($conn,'bbs_user',['picture'=>$info],"uid=$uid");
//上传的文件达导入数据库

if($result){
	//更新sessin的值
	$_SESSION['resUser']['picture']=$info;
	exit ("<script>alert('修改成功....');window.location.href='home_tx.php'</script>");
	/*echo '<script>alert(修改成功);</script>';
	echo '<meta http-equiv="Refresh" content="1;home_tx.php">';
*/

}

