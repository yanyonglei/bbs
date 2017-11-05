
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="public/css/main.css"/>
		<link rel="stylesheet" type="text/css" href="public/css/base.css"/>


		<?php if ($username==""): ?>
		<?php include '/home/wwwroot/default/bbs/caches/home/header_html.php';?>
		<?php else: ?>
		<?php include '/home/wwwroot/default/bbs/caches/home/header2_html.php';?>
		<?php endif; ?>
		<div class="ml">
			<div class="ml_first">
				<i>
					<img src="public/images/mine_icn.png"/>
					<img  src="public/images/pt_item.png"/>
				</i>
				<b>
					<a href="#">论坛</a>
				</b>
			</div>
		</div>
		<!--提示-->
		<div class="main_list">
			<!--左边导航设计 开始-->
			<div class="left_nav fl clearFix">
				<div class="bk">
					<h1>板块导航</h1>
				</div>
				<ul class="communication">
				    <?php foreach ($className as $key=>$values): ?>
					<li class="tech">
						<font><?=$values['classname'];?></font>
					</li>
						<?php foreach ( $className1 as $key=>$value ): ?>
						  <?php if ($value['parentid']==$values['cid']): ?>
					<li class="ym">
						<a href="list.php?classid=<?=$value['cid'];?>"><?=$value['classname'];?></a>
					</li>
						 <?php endif; ?>
						<?php endforeach; ?>
					<?php endforeach; ?>
				</ul>
			</div>
			<!--左边导航设计 结束-->
			<!--右边帖子管理 设计开始-->
			<div class="tie fr clearFix">
			
				<!--标题板块设计开始-->
				<div class="tie_bt">
					<ul class="bt_first">
						<li class="jl"><a href=""><?=$nameTitle;?></a></li>
						<li class="td">今日:<font><?=$totalEvery;?></font></li>
						<li class="zt">主题:<font><?=$totalFirst;?></font></li>
					</ul>
					<div class="bt_auther">
						<?php foreach ($className1 as $val): ?>
							<?php if ($val['cid']==$classId ): ?>
						<font>版主:<?=$val['compere'];?></font>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>

				<!---标题板块设计结束-->
				<!--发帖 返回按钮就设计 开始-->
				<div class="tie_an">
					<div class="post fl clearFix">
						<a href="addc.php?classid=<?=$classId;?>"> 发帖</a>
					</div>
					<div class="back fr clearFix">
						<a href="index.php"> 返回</a>
					</div>
				</div>
				<!--发帖 返回按钮就设计 结束-->
				<div class="tie_all">
					<div class="all_top">
						<ul class="top_bt">
							<li class="xx">筛选:</li>
							<li class="qb"><a href="list.php?classid=<?=$classId;?>">全部</a></li>
							<li class="jh"><a href="list.php?classid=<?=$classId;?>&elite=1">精华</a></li>
							<li class="zz">作者</li>
							<li class="hc">回复/查看</li>
							<li class="zhfb">最后发表</li>
						</ul>
					</div>
					<div class="tie_content">
						<?php foreach ($currentList as $key => $val): ?>
						<div class="tie_item">
							<div class="item_left fl clearFix">
								<ul>
									<li><h1><img  src="../../public/images/folder_common.gif"/></h1></li>
									<?php if ( $val['elite']==1): ?>
										<li class="biaoti" ><a href="../../detail.php?id=<?=$val['id'];?>"> <?=$val['title'];?></a> <img src="../../public/images/digest_1.gif" /> 
										</li>
									<?php elseif($val['istop']==1):?>
									<li class="biaoti">
										<a  href="../../detail.php?id=<?=$val['id'];?>"><?=$val['title'];?>
										</a><img src="../../public/images/recommend_2.gif" />
									</li>
									<?php elseif($val['style']==1):?>
									<li class="biaoti" >
										<a  color="red"  href="../../detail.php?id=<?=$val['id'];?>"><?=$val['title'];?>
										</a>
									</li>
									<?php else: ?> 
									<li class="biaoti">
										<a   href="../../detail.php?id=<?=$val['id'];?>"><?=$val['title'];?>
										</a>
									</li>


									<?php endif; ?>


								</ul>
							</div>
							<div class="item_right fr clearFix">
								<div class="auther fl clear Fix">
									<ol>
										<li class="addtime"><?=$val['username'];?></li>
									</ol>
								</div>
								<div class="look_info fl crearFix">
									
									<ol >
										<?php if ($val['reply']==''): ?>
										<li>0</li>
										<?php else: ?>
										<li><?=$val['reply'];?></li>
										<?php endif; ?>

										<?php if ($val['hits']==""): ?>
										<li>0</li>
										<?php else: ?>
										<li><?=$val['hits'];?></li>
										<?php endif; ?>
									</ol>

								</div>
								<div class="time  crearFix ">
									<ol >
										<li><?=$val['addtime'];?></li>
									</ol>
								</div>	
							</div>
						</div>
						<?php endforeach; ?>
					</div>

					<div class="tie_an">
						<div class="post fl clearFix">
							<a href="../../addc.php?classid=<?=$classId;?>"> 发帖</a>
						</div>
						<div class="back fr clearFix">
							<a href="../../index.php"> 返回</a>
						</div>
					</div>
					
				</div>
				
			</div>	
		</div>
		<div class="fenye">
				<div class="item fr clearFix">
					<form class="item_form">
						<?php if ($elite!=1): ?>
						<ul class="form_ul" action="list.php" method="get">
							<li><input type="hidden" name="classid" value="<?=$classId;?>"></li>
							<li class="num"><input type="number" min="1" name="page" value="<?=$page;?>" /></li><li class="go"><input type="submit"  value="GO"  /></li>
							<li class="first"><a href="../../list.php?classid=<?=$classId;?>&page=1">首页</a></li>
							<li class="prev"><a href="../../list.php?classid=<?=$classId;?>&page=<?=$prev;?>">上一页</a></li>
							<li class="current"><b><?=$page;?></b></li>
							<li class="next"><a href="../../list.php?classid=<?=$classId;?>&page=<?=$next;?>">下一页</a></li>
							<li class="end"><a href="../../list.php?classid=<?=$classId;?>&page=<?=$pages;?>" >尾页</a></li>
							<li class="sum">共有<b><?=$total;?></b>条记录</li>
							<li class="every">每页显示<b><?=$offSet;?></b>条，本页<b><?=$page;?>-<?=$offSet;?></b>条</li>
							<li class="dis"><b><?=$page;?>/<?=$pages;?></b>页</li>
						</ul>
						<?php else: ?>
							<ul class="form_ul" action="list.php" method="get">
								<li><input type="hidden" name="classid" value="<?=$classId;?>"></li>
								<li class="num"><input type="number" min="1" name="page" value="<?=$page;?>" /></li><li class="go"><input type="submit"  value="GO"  /></li>
								<li class="first"><a href="list.php?classid=<?=$classId;?>&elite=1&page=1">首页</a></li>
								<li class="prev"><a href="list.php?classid=<?=$classId;?>&elite=1&page=<?=$prev;?>">上一页</a></li>
								<li class="current"><b><?=$page;?></b></li>
								<li class="next"><a href="list.php?classid=<?=$classId;?>&elite=1&page=<?=$next;?>">下一页</a></li>
								<li class="end"><a href="list.php?classid=<?=$classId;?>&elite=1&page=<?=$pages;?>" >尾页</a></li>
								<li class="sum">共有<b><?=$total;?></b>条记录</li>
								<li class="every">每页显示<b><?=$offSet;?></b>条，本页<b><?=$page;?>-<?=$offSet;?></b>条</li>
								<li class="dis"><b><?=$page;?>/<?=$pages;?></b>页</li>
							</ul>
						<?php endif; ?>
					</form>
				</div>
		</div>
			
		<hr class="fgx"/>
		<?php include '/home/wwwroot/default/bbs/caches/home/footer_html.php';?>
	