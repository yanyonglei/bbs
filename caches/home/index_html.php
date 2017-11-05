		<title><?=$title;?></title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="public/css/main.css"/>
		<link rel="stylesheet" type="text/css" href="public/css/base.css"/>
		
		<?php if ($username==""): ?>
		<?php include '/home/wwwroot/default/bbs/caches/home/header_html.php';?>
		<?php else: ?>
		<?php include '/home/wwwroot/default/bbs/caches/home/header2_html.php';?>
		<?php endif; ?>
		<div class="ml" >
			<div class="ml_first">
				<i><img src="public/images/mine_icn.png"/>
					<img  src="public/images/pt_item.png" /></i><b><a href="index.html">论坛</a></b>
			</div>
		</div>
		<!--提示-->
		<div class="info">
			<div class="info_div  ">
				<ul class="info_ul fr"  >
					<li><i><img src="public/images/chart.png" /></i></li>
					<li class="first"><b class="tiezi">帖子:</b><font><?=$sum;?></font></li>
					<li class="second"><b class="vip">会员:</b><font><?=$count;?></font></li>
					<li class="third"><b class="welcome">欢迎新会�?</b><font><?=$newestUser;?></font></li>
				</ul>
			</div>
		</div>
		<!--主体部分main 的布局包括 php技术交�?程序人生-->
		<div class="main">
			<?php if ($class!=''): ?>
			<?php foreach ($class as $key=> $values): ?>	

			    <div class="php_bt">
					<h1 class="common">
						<a href="index.php?bigid=<?=$values['cid'];?>"><?=$values['classname'];?></a>
					</h1>
				</div>
				<?php if ($className1!=""): ?>
				<?php foreach ( $className1 as $key=>$value ): ?>
					<div class="php">		 
						<div class="php_first">

						<?php if ($value['parentid']==$values['cid']): ?>
							<div class="item">
									<div class="first_left fl clearFix">
										<div class="left_logo" >
											<h1>
												 <img src="public/images/forum.gif" />
											</h1>
										</div>
										<div class="left_info">
											<ul class="left_info_ul">
												<li><a href="list.php?classid=<?=$value['cid'];?>"><?=$value['classname'];?></a></li>
												<li>版主:<font></font></li>
											</ul>
										</div>
									</div>
									<div class="first_right  fr clearFix">
										<div class="right_num">
											<ul class="num_ul">
												<li class="look_info"><font><?=$value['replycount'];?></font>/<?=$value['motifcount'];?></li>
												<li> &nbsp; </li>
											</ul>
										</div>

										<div class="right_info">
											<ul class="right_info_ul">
													<?php if (!empty($data)): ?>
													<?php foreach ($data as $key=>$v): ?>
														<?php if ($v['classid']==$value['cid']): ?>
													<li class="title"><a href=""><?=$v['title'];?></a></li>
													<li  class="time"><?php echo date('Y-m-d:H:i:s',$v['addtime']);;?><?=$v['username'];?></li>
													   <?php endif; ?>	

													<?php endforeach; ?>	
													<?php else: ?>

											  		<li class="title">暂无</li>
											  		<?php endif; ?>
													
									
											</ul>
										</div>
									</div>
							</div>
						<?php endif; ?>

						</div>
					</div>
				
					<?php endforeach; ?>

				<?php endif; ?>
			<?php endforeach; ?>
			<?php endif; ?>
	
		</div>
				
		<div class="clj"> 
			<?php if ($linkInfo!=''): ?>
			<?php foreach ($linkInfo as $key =>$val): ?>
					<?php if ($val['description']!=''): ?>
			<div class="waiwang">
				
				<span class="net"><?=$val['name'];?></span>
				<span class="net_span">
					<ul class="net_ul">
						<li class="net_li"><a href="<?=$val['url'];?>"><?=$val['name'];?></a></li>
						<li class="company"><?=$val['description'];?></li>
					</ul>
				</span>
				
			</div>
			<?php endif; ?>
			<?php endforeach; ?>
			<?php endif; ?>
			<!-- <div class="school">
				<span class="net">千锋</span>
				<span class="net_span">
					<ul class="net_ul">
						<li class="net_li"><a href="">千锋</a></li>
						<li class="company">php学院</li>
					</ul>
				</span>
			</div> -->
			<div class="huizong">
				<?php if (!empty($linkInfo)): ?>
				<?php foreach ($linkInfo as $key =>$val): ?>
				<span><a href="<?=$val['url'];?>" target="_blank"><?=$val['name'];?></a></span>
				<?php endforeach; ?>
				<?php endif; ?>
				<!-- <span><a href="">百度</a></span>
				<span><a href="">漫游平台</a></span>
				<span><a href="">Yeswan</a></span>
				<span><a href="">我的领地</a></span>
				<span><a href="">千锋</a></span> -->
			</div>
		</div>
		 <hr class="fgx"/>
		
		 <?php include '/home/wwwroot/default/bbs/caches/home/footer_html.php';?>