
			<!--	最上面一行设计-->
		<div class="top_first" >
			<div class="top_first_div">
				<a href=" ">设为首页</a>
				<a href=" " class="">收藏本站</a>
			</div>
		</div>
			<!--	最上面一行设计 结束-->
		<div class="top_second">
			<div class="waiceng">
				<!--logo-user  开始-->
				<div class="logo_user">
					<div class="logo clearFix">
					<!-- logo-->
						<img src='public/images/logo.gif'>
					</div>
						<!---用户登陆区域设计-->
					<div class="usered fr clearFix ">
						<!--登陆后的区域-->
						<div class="logined_user fl clearFix">
							<ul class="logined_name">
								<li class="photo"><i><img src="public/images/user_online.gif"/></i></li><li class="name"><?=$username;?></li>
									<?php if ($udertype==1): ?>
								<li class="setting"><a href="../../admin.php">管理中心</a></li>
									<?php endif; ?>
								<li class="setting"><a href="../../home.php">设置</a></li>

								<li class="out"><a href="../../login_out.php">退出</a></li>

							</ul>
							<ul class="logined_fen">
								<li class="jifen">积分:<?=$grade;?></li>
								<li class="qx">
									<?php if ($udertype==0): ?>
									用户权限:普通用户
									<?php elseif($udertype==1):?>
									用户权限:管理员
									<?php endif; ?>
								</li>
							</ul>
						</div>
						<!--用户图片显示-->
						<div class="logined_tupian fr clearFix">
							<h1><img src="<?=$picture;?>"/></h1>
						</div>
					</div>
				</div>
				<!--logo-user  结束-->
					<!---导航开始-->
				<div class="nav">
					<ul class="nav_ul">
						<li><a href="../../index.php">首页</a></li>
						<?php foreach ($className as $key=>$val): ?>
						<li><a href="../../index.php?bigid=<?=$val['cid'];?>"><?=$val['classname'];?></a></li>
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
						<form class="form_search" action="../../search.php" method="post" >
							<input class='inter' stype="text" placeholder="请输入搜索的内容" name="content" /><input  type="submit" class="sousuo" value="搜索"/>
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