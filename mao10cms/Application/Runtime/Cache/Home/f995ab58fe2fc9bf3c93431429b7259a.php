<?php if (!defined('THINK_PATH')) exit(); mc_template_part('header'); ?>
<?php ?>
	<div class="container">
		<div class="row mb-20 hidden-xs" id="home-top">
			<div class="col-md-12 col">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active">
						</li>
						<?php if(mc_option('homehdimg2')) : ?>
						<li data-target="#carousel-example-generic" data-slide-to="1">
						</li>
						<?php endif; ?>
						<?php if(mc_option('homehdimg3')) : ?>
						<li data-target="#carousel-example-generic" data-slide-to="2">
						</li>
						<?php endif; ?>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<a class="img-div" href="<?php echo mc_option('homehdlnk1'); ?>"><img src="<?php echo mc_option('homehdimg1'); ?>"></a>
						</div>
						<div class="item">
							<a class="img-div" href="<?php echo mc_option('homehdlnk2'); ?>"><img src="<?php echo mc_option('homehdimg2'); ?>"></a>
						</div>
						<?php if(mc_option('homehdimg3')) : ?>
						<div class="item">
							<a class="img-div" href="<?php echo mc_option('homehdlnk3'); ?>"><img src="<?php echo mc_option('homehdimg3'); ?>"></a>
						</div>
						<?php endif; ?>
					</div>
					<?php if(mc_option('homehdimg2')) : ?>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left">
						</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right">
						</span>
					</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php if(mc_option('pro_close')!=1) : ?>
		<h4>
			最新商品
			<a class="btn btn-xs btn-info pull-right" href="<?php echo U('pro/index/index'); ?>">查看全部</a>
		</h4>
		<?php $newpro = M('page')->where('type="pro"')->order('id desc')->page(1,4)->select(); if($newpro) : ?>
		<div class="row mb-20" id="pro-list">
		<?php foreach($newpro as $val) : ?>
		<?php $num_newproa++; ?>
			<div class="col-sm-6 col-md-4 col-lg-3 col <?php if($num_newproa==4) echo 'hidden-md'; ?>">
				<div class="thumbnail">
					<?php $fmimg_args = mc_get_meta($val['id'],'fmimg',false); ?>
					<a class="img-div" href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><img src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo mc_get_page_field($val['id'],'title'); ?>"></a>
					<div class="caption">
						<h4>
							<a href="<?php echo U('pro/index/single?id='.$val['id']); ?>"><?php echo mc_get_page_field($val['id'],'title'); ?></a>
						</h4>
						<p class="price pull-left">
							<span><?php echo mc_get_meta($val['id'],'price'); ?></span> <small>元</small>
						</p>
						<a href="<?php echo U('home/perform/add_cart','id='.$val['id'].'&number=1'); ?>" class="btn btn-warning btn-xs pull-right">
							<i class="glyphicon glyphicon-plus"></i> 加入购物车
						</a>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
		<?php else : ?>
		<div id="nothing">
			暂时没有任何商品，去<a href="<?php echo U('pro/index/index'); ?>">添加更多商品</a>吧！
		</div>
		<?php endif; endif; ?>
		<?php if(mc_option('baobei_close')!=1) : ?>
		<h4>
			最新分享
			<a class="btn btn-xs btn-info pull-right" href="<?php echo U('baobei/index/index'); ?>">查看全部</a>
		</h4>
		<?php  $condition['type'] = 'baobei'; $date = strtotime("now"); $args_id1 = M('meta')->where("meta_key='stime' AND meta_value<'$date' AND type='basic'")->getField('page_id',true); $args_id2 = M('meta')->where("meta_key='etime' AND (meta_value>'$date' OR meta_value='') AND type='basic'")->getField('page_id',true); $args_id = array_intersect($args_id1,$args_id2); $condition['id'] = array('in',$args_id); $newbaobei = M('page')->where($condition)->order('id desc')->page(1,4)->select(); if($newbaobei) : ?>
		<div class="row mb-20" id="pro-list">
		<?php foreach($newbaobei as $val) : ?>
		<?php $num_newbaobeia++; ?>
			<div class="col-sm-6 col-md-4 col-lg-3 col <?php if($num_newbaobeia==4) echo 'hidden-md'; ?>">
				<div class="thumbnail">
					<a class="img-div" href="<?php echo U('baobei/index/single?id='.$val['id']); ?>"><img src="<?php echo mc_fmimg($val['id']); ?>" alt="<?php echo mc_get_page_field($val['id'],'title'); ?>"></a>
					<div class="caption">
						<h4>
							<a href="<?php echo U('baobei/index/single?id='.$val['id']); ?>"><?php echo mc_get_page_field($val['id'],'title'); ?></a>
						</h4>
						<p class="price pull-left">
							<span><?php echo mc_get_meta($val['id'],'price'); ?></span> <small>元</small>
						</p>
						<a target="_blank" rel="nofollow" href="<?php echo mc_get_meta($val['id'],'link'); ?>" class="btn btn-warning btn-xs pull-right">
							<i class="glyphicon glyphicon-plus"></i> 立即购买
						</a>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
		<?php else : ?>
		<div id="nothing">
			暂时没有任何分享，去<a href="<?php echo U('baobei/index/index'); ?>">分享更多宝贝</a>吧！
		</div>
		<?php endif; endif; ?>
		<!--
		<h4>热门商品</h4>
		<div class="row mb-20" id="pro-list">
			<?php  $Model = new \Think\Model(); ?>
			<?php foreach($newprob as $val) : ?>
			<?php $num_newprob++; ?>
			<div class="col-sm-6 col-md-4 col-lg-3 col <?php if($num_newprob==4) echo 'hidden-md'; ?>">
				<div class="thumbnail">
					<?php $fmimg_args = mc_get_meta($val['page_id'],'fmimg',false); ?>
					<a class="img-div" href="<?php echo U('pro/index/single?id='.$val['page_id']); ?>"><img src="<?php echo $fmimg_args[0]; ?>" alt="<?php echo mc_get_page_field($val['page_id'],'title'); ?>"></a>
					<div class="caption">
						<h4>
							<a href="<?php echo U('pro/index/single?id='.$val['page_id']); ?>"><?php echo mc_get_page_field($val['page_id'],'title'); ?></a>
						</h4>
						<p class="price pull-left">
							<span><?php echo mc_get_meta($val['page_id'],'price'); ?></span> <small>元</small>
						</p>
						<a href="<?php echo U('home/perform/add_cart','id='.$val['page_id'].'&number=1'); ?>" class="btn btn-warning btn-xs pull-right">
							<i class="glyphicon glyphicon-plus"></i> 加入购物车
						</a>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		-->
		<?php if(mc_option('group_close')!=1) : ?>
		<h4>最新话题</h4>
		<?php if($page) : ?>
		<div class="row">
			<div class="col-sm-12" id="post-list-default">
				<ul class="list-group">
				<?php foreach($page as $val) : ?>
				<li class="list-group-item" id="mc-page-<?php echo $val['id']; ?>">
					<div class="row">
						<div class="col-sm-6 col-md-7 col-lg-9">
							<div class="media">
								<?php $author = mc_get_meta($val['id'],'author',true); ?>
								<a class="pull-left img-div" href="<?php echo U('user/index/index?id='.$author); ?>">
									<img width="40" class="media-object" src="<?php echo mc_user_avatar($author); ?>" alt="<?php echo mc_user_display_name($author); ?>">
								</a>
								<div class="media-body">
									<h4 class="media-heading">
										<a href="<?php echo U('post/index/index?id='.$val['id']); ?>"><?php echo $val['title']; ?></a>
									</h4>
									<p class="post-info hidden-xs">
										<i class="glyphicon glyphicon-user"></i><a href="<?php echo U('user/index/index?id='.$author); ?>"><?php echo mc_user_display_name($author); ?></a>
										<i class="glyphicon glyphicon-home"></i><a href="<?php echo U('post/group/single?id='.mc_get_meta($val['id'],'group')); ?>"><?php echo mc_get_page_field(mc_get_meta($val['id'],'group'),'title'); ?></a>
										<i class="glyphicon glyphicon-time"></i><?php echo date('Y-m-d H:i:s',mc_get_meta($val['id'],'time')); ?>
									</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-5 col-lg-3 text-right hidden-xs">
							<ul class="list-inline">
							<?php if(mc_last_comment_user($val['id'])) : ?>
							<li>最后：<?php echo mc_user_display_name(mc_last_comment_user($val['id'])); ?></li>
							<?php endif; ?>
							<li>点击：<?php echo mc_views_count($val['id']); ?></li>
							</ul>
						</div>
					</div>
				</li>
				<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php else : ?>
		<div id="nothing">
			暂无任何话题，没关系，加油！
		</div>
		<?php endif; ?>
		<h4>
			最新群组
			<a class="btn btn-xs btn-info pull-right" href="<?php echo U('post/group/index'); ?>">查看全部</a>
		</h4>
		<?php $group = M('page')->where('type="group"')->order('date desc')->page(1,4)->select(); if($group) : ?>
		<div class="row mb-20" id="group-list">
			<?php foreach($group as $val) : ?>
			<?php $num_newgroup++; ?>
			<div class="col-md-6 col-md-4 col-lg-3 col <?php if($num_newgroup==4) echo 'hidden-md'; ?>">
				<div class="panel panel-default">
					<a href="<?php echo U('post/group/single?id='.$val['id']); ?>" class="img-div hidden-xs">
						<img src="<?php echo mc_fmimg($val['id']); ?>">
					</a>
					<a href="<?php echo U('post/group/single?id='.$val['id']); ?>" class="panel-heading">
						<?php echo $val['title']; ?>
					</a>
					<div class="panel-body">
						<?php echo strip_tags($val['content']); ?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php else : ?>
		<div id="nothing">
			暂时没有任何群组，去<a href="<?php echo U('publish/index/add_group'); ?>">建立第一个群组</a>吧！
		</div>
		<?php endif; endif; ?>
		<?php if(mc_option('article_close')!=1) : ?>
		<h4>
			最新文章
			<a class="btn btn-xs btn-info pull-right" href="<?php echo U('article/index/index'); ?>">查看全部</a>
		</h4>
		<?php $newarticle = M('page')->where("type='article'")->order('id desc')->page(1,2)->select(); if($newarticle) : ?>
		<div id="article-list">
			<div class="row">
				<?php foreach($newarticle as $val) : ?>
				<div class="col-md-6">
					<div class="thumbnail">
						<a href="<?php echo U('article/index/single?id='.$val['id']); ?>" class="img-div"><img src="<?php echo mc_fmimg($val['id']); ?>" alt="<?php echo $val['title']; ?>"></a>
						<div class="caption">
							<h3>
								<a href="<?php echo U('article/index/single?id='.$val['id']); ?>"><?php echo $val['title']; ?></a>
							</h3>
							<p>
								<?php echo mc_cut_str(strip_tags($val['content']),200); ?>
							</p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php else : ?>
		<div id="nothing">
			暂时没有任何文章，去<a href="<?php echo U('article/index/index'); ?>">写下网站的第一篇文章</a>吧！
		</div>
		<?php endif; endif; ?>
	</div>
<?php mc_template_part('footer'); ?>