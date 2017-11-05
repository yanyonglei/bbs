<?php
	
	//引入模板引擎函数
	include './tpl/tpl_func.php';
	$title="后台管理";

	$url="http://www.qq.com";

	display('admin.html',compact('title',"url"));



	