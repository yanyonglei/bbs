<?php
	//后台的配置文件
	
	include '../tpl/tpl_func_admin.php';

	$title="后台管理";

  	session_start();

	display('admin_index.html',compact('title'));

