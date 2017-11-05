

		<!--	最上面一行设计-->
		<div class="top_first" >
			<div class="top_first_div">
				<a href=" ">设为首页</a>
				<a href=" " class="">收藏本站</a>
			</div>
		</div>
			<!--最上面一行设计 结束-->
		<div class="top_second">
			<div class="waiceng">
				<!--logo-user  开始-->
				<div class="logo_user">
					<div class="logo clearFix">
					<!-- logo-->
						<img src='public/images/logo.gif'>
					</div>
						<!--用户登陆区域设计-->
					<div class="user clearFix ">
						<!--登陆区域-->
						<div class="login_user">
							<form class="login_form"  action="check_login.php" method="post" enctype="multipart/form-data" >
								<ul class="form_ul_user" >
									<li class="name_li">用户名 &nbsp;&nbsp;&nbsp;<input type="text"  value="" name="username"  placeholder="admin"/></li>
									<li class="auto_li"><input  type="checkbox"  value="" name=""/>自动登陆</li>
								</ul>
								<ul class="form_ul_pass">
									<li class="pass">密码  &nbsp;&nbsp;&nbsp;&nbsp; <input type="password" name="password" value=""  /></li>
									<li class="li_logo"><input  type="submit"  value="     登陆    " name=""  /></li>
								</ul>
							</form>
						</div>
						<!--注册 按钮-->
						<div class="regis">
							<ul class="regis_ul">
								<li class="find"><a  href="findmima.php">找回密码</a></li>
								<li class="zhuce"><a  href="register.php">立即注册</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!--logo-user  结束-->
					<!---导航开始-->
				<div class="nav">
					<ul class="nav_ul">
						<li><a href="index.php">首页</a></li>
							<?php foreach ($className as $key => $val): ?>
							<li><a href="index.php?bigid=<?=$val ['cid'];?>"><?=$val['classname'];?></a></li>
							<?php endforeach; ?>

					</ul>
				</div>
				<!---导航结束-->
				<!--所搜框区域的设计开始-->
				<div class="search">
					<div class="fl clearFix search_logo"> 
						<h1><img src="public/images/search.jpg" /></h1>
					</div>
					<div class="fl div_form ">
						<form class="form_search" action="">
							<input class='inter' type="text" class=""  placeholder="请输入搜索的内容" /><input  type="submit" class="sousuo" value="搜索"/>
						</form>
					</div>
					<div class="hot_search">
						<ul class="hot_ul">
							<li class="hot" >热搜:</li>
							<li class="acti"><a href="">活动</a></li>
							<li class="mf"><a href="" >交友</a></li>
							<li class="jc"><a href="">教程</a></li>
						</ul>
					</div>
				</div>
				<!--搜索框设计结束-->
			</div>
		</div>