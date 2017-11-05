<?php
	include './helper/jump.php';
	//开始session
	session_start();

	//把session设置为空
	$_SESSION['resUser']=array();
	//销毁session值
	session_destroy();

	//jump( '退出成功','index.php');
    echo '<meta http-equiv="Refresh" content="0;index.php" >';


