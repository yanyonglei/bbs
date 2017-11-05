<?php

include './tpl/tpl_func.php';
session_start();
$resUser=$_SESSION['resUser'];

//用户名
$username=$resUser['username'];
//用户类型
$udertype=$resUser['udertype'];
//积分
$grade=$resUser['grade'];


display('header2.html',compact('username','udertype','grade'));
