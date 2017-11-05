<?php
		

	include '../tpl/tpl_func_admin.php';

	$title="头部";

	session_start();

	if(!empty($_SESSION)){
		$username=$_SESSION['admin']['username'];
	}else{
		$username='';
	}


	display('admin_header.html',compact('title','username'));

