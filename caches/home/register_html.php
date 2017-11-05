﻿<html>
	<head>
		<title><?=$title;?></title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="public/css/main.css"/>
		<link rel="stylesheet" type="text/css" href="public/css/base.css"/>

		<script type="text/javascript">
		window.onload=function()
		{
			var oBtn=document.getElementById('btn');

			var oImg=document.getElementById('img');
			oBtn.onclick=function(){

				oImg.src='<?=$yzm;?>?'+Math.random();
			}
		}

		</script>
	</head>	
	<body>

		<?php include '/home/wwwroot/default/bbs/caches/home/header_html.php';?>
		<!--主体部分main 的布局包括 php技术交流 程序人生-->
		<div class="main_register">
			<div class="register_bt">
				<h1>立即注册</h1>
			</div>
			<div class="regis">
				<div class="div_form">
					<!--   注册的form 表单      -->
					<!--    ../../register.php 处理地址                 -->
					<form  action="../../check_register.php" method="post"   class="form_regis" >
						<ul class="regis_ul">
							<li class="name">
								<font class="xing ">*</font><b class="tong">用户名:</b><input type="text" class="user" name="username" value=""/>
							</li>
							<li class="mima">
								<font class="xing">*</font><b class="tong">密码:</b><input type="password" class="pass" name="password" value=""/>
							</li>
							<li class="qr">
								<font class="xing ">*</font><b class="tong">确认密码:</b><input type="password" class="confirm" name="confirm" value=""/>
							</li>
							<li class="em">
								<font class="xing ">*</font><b class="tong">E-mail:</b><input type="text" class="mail" name="email" value=""/>
							</li>
							<!--验证码-->
							<li class="yz">
								<font class="xing">*</font><b class="tong">验证码:</b>
								<input type="text" class="yzm" name="yzm" value=""/>
								<!--  验证码 是一张图片   -->
								<img  src="../../helper/vertify.php"  id="img" onclick="this.src='<?=$yzm;?>?'+Math.random();"/>
								<span><a href="" id="btn">看不清换一张</a></span>
							</li>
							<li class="tj">
								<input type="submit" class="tijiao" name="tijiao" value="提交"/>
							</li>
						</ul>
					</form>
						<!--   注册的form 表单      -->

				</div>
			</div>
		</div>
		
		<!--超链接结束-->
		<hr class="fgx"/>
		 <!--底部布局开始-->
		 <?php include '/home/wwwroot/default/bbs/caches/home/footer_html.php';?>
	</body>
</html>