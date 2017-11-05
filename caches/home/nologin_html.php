<html>
	<head>
		<title>首页-10分钟学院</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="public/css/main.css"/>
		<link rel="stylesheet" type="text/css" href="public/css/base.css"/>
	</head>	
	<body>


		<?php include '/home/wwwroot/default/bbs/caches/home/header_html.php';?>
		<!--主体部分main 的布局包括 -->
		<div class="main_login_attention">
				<div class="attention">
						<div class="alterinfo">
							<div class ="logo fl clearFix ">
								<h1><img src="../../public/images/info.gif" /></h1>
							</div>
							<div class="title">
								<p>抱歉，您尚未登录，没有权限在该版块发帖</p>
							</div>
						</div>
						<h1>用户登陆</h1>
						<form class="attention_form" action="check_nologin.php" method="post" enctype="multipart/form-data">
							<ul class="form_ul">
								<li class="user"><font>用户名:</font>
									<input type="text" value="" name="username" /><a href="../../register.php">立即注册</a>
								</li>

								<li class="pass"><font>密码:</font>
									<input type="password" value="" name="password" /><a href="../../findmima.php">找回密码</a>
								</li>
								<li class="aq"><font>安全提问:</font>
									<select name="problem">
											<option >安全提问(未设置请忽略)</option>
											<option value="">母亲的名字</option>
											<option value="">爷爷的名字</option>
											<option value="">父亲出生的城市</option>
											<option value="">你其中一位老师的名字</option>
											<option value="">你个人计算机的型号</option>
											<option value="">你最喜欢的餐馆名称</option>
											<option value="">驾驶执照最后四位数字</option>
									</select>
								</li>

								<li class="result">

									<font>答案:</font><input type="text" name="reply"/>
								</li>
								<li class="auto_login">
									<input type="checkbox" name="">自动登陆
								</li>
								<li class="dl">
									<input type="submit" value="登陆"/>
								</li>
							</ul>
						</form>
				</div>

		</div>

		<!--超链接结束-->
		<hr class="fgx"/>
		 <!--底部布局开始-->
		 <?php include '/home/wwwroot/default/bbs/caches/home/footer_html.php';?>
	</body>
</html>