<?php  /* Template Name:首页模板 * Template Type:index-cms */  ?><?php  include $this->GetTemplate('header');  ?>
<div id="topsearch" class="topsearch" style="background:url(<?php  echo $zbp->Config('downlee')->sstitlebg;  ?>) center;">
	<div id="particles-js"><canvas class="particles-js-canvas-el" width="1349" height="675" style="width: 100%; height: 100%;"></canvas></div>
	<div class="wrapper search-top">
		<div class="search-inner">
			<h2><?php  echo $zbp->Config('downlee')->sstitle;  ?></h2>
			<form method="post" name="search" action="<?php  echo $host;  ?>zb_system/cmd.php?act=search" class="searchform">
				<input type="text" name="q" placeholder="<?php  echo $zbp->Config('downlee')->sstext;  ?>" class="search-top-input">
				<button type="submit" class="search-top-btn" value="搜索"><i class="icon font-search"></i></button>
				<div class="fl right-but"><a rel="nofollow" href="<?php  echo $zbp->Config('downlee')->ssfrurl;  ?>" target="_blank"><?php  echo $zbp->Config('downlee')->ssfrtext;  ?></a></div>
			</form>
			<div class="hot-search"><span>热门搜索：</span>
				<?php  echo downlee_hot_Tags($zbp->Config('downlee')->sstagnum);  ?>
			</div>
		</div>
	</div>
</div>
<main class="main-content">
	<?php if ($zbp->Config('downlee')->suggesttoff=='1') { ?><div class="main-box home-firstitems">
		<div class="container">
			<ul>
				<li><a href="<?php  echo $zbp->Config('downlee')->suggestu;  ?>"><i class="icon font-icon_yingyongguanli"></i><strong><?php  echo $zbp->Config('downlee')->suggestt;  ?></strong><p><?php  echo $zbp->Config('downlee')->suggesti;  ?></p><span class="btn btn-primary">立即查看</span></a></li>
				<li><a href="<?php  echo $zbp->Config('downlee')->suggestu2;  ?>"><i class="icon font-jiaocheng"></i><strong><?php  echo $zbp->Config('downlee')->suggestt2;  ?></strong><p><?php  echo $zbp->Config('downlee')->suggesti2;  ?></p><span class="btn btn-primary">立即查看</span></a></li>
				<li><a href="<?php  echo $zbp->Config('downlee')->suggestu3;  ?>" target="_blank"><i class="icon font-credits"></i><strong><?php  echo $zbp->Config('downlee')->suggestt3;  ?></strong><p><?php  echo $zbp->Config('downlee')->suggesti3;  ?></p><span class="btn btn-primary">立即查看</span></a></li>
				<li><a href="<?php  echo $zbp->Config('downlee')->suggestu4;  ?>" target="_blank"><i class="icon font-ruanjiankaifabao"></i><strong><?php  echo $zbp->Config('downlee')->suggestt4;  ?></strong><p><?php  echo $zbp->Config('downlee')->suggesti4;  ?></p><span class="btn btn-primary">立即查看</span></a></li>
			</ul>
		</div>
	</div><?php } ?>
	<?php if ($zbp->Config('downlee')->slideoff=='1' && $type=='index'&&$page=='1') { ?><div class="main-box top-slider">
		<div class="top-slider container clearfix">
			<?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->homeadoff=='1' && strlen ( $zbp->Config('downlee')->homeadyd ) > 8) { ?><div id="homedia" class="mediad homedia}"><?php  echo $zbp->Config('downlee')->homeadyd;  ?></div><?php } ?>
			<?php }else{  ?><?php if ($zbp->Config('downlee')->homeadoff=='1' && strlen ( $zbp->Config('downlee')->homead ) > 8) { ?><div id="homedia" class="mediad homedia"><?php  echo $zbp->Config('downlee')->homead;  ?></div><?php } ?><?php } ?>
			<div class="wrapper-ban">
				<div class="swiper-container swiper-main">
					<div class="swiper-wrapper">
					<?php  if(isset($modules['slide'])){echo $modules['slide']->Content;}  ?>
					</div><!-- Add Pagination -->
					<div class="swiper-pagination"></div><div class="swiper-button-next"></div><div class="swiper-button-prev"></div>
				</div>
			</div>
			<div class="wrapper-push">
				<div class="push-box"><?php $arrays = explode(',',$zbp->Config('downlee')->toptextid); ?><?php  foreach ( $arrays as $ikeys=>$topcms) { ?><?php  $article=GetPost((int)$topcms);  ?>
					<div class="push-box-inner">
						<a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>"<?php if ($zbp->Config('downlee')->blankoff=='1') { ?> target="_blank"<?php } ?>>
							<figure class="gr-thumbnail"><img src="<?php  echo downlee_firstimg($article);  ?>" alt="<?php  echo $article->Title;  ?>"></figure>
							<div class="push-b-title">
								<h3 class="push-b-h3"><?php  echo $article->Title;  ?></h2>
								<p class="push-b-footer"><span><?php  echo $article->ViewNums;  ?> 阅读 ，</span><time><?php  echo $article->Time('m-d');  ?></time></p>
							</div>
						</a>
					</div><?php }   ?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?><?php if ($zbp->Config('downlee')->latesoff=='1') { ?><div class="index-main auto-side container clearfix">
		<section class="section-info">
			<h2 class="postmode-title"><?php  echo $zbp->Config('downlee')->latestitle;  ?></h2>
			<p class="postmode-description"><?php  echo $zbp->Config('downlee')->latestext;  ?></p>
		</section>
		<div class="newest-main auto-main">
			<?php  foreach ( $articles as $n=>$article) { ?><?php $i = $n+1; ?>
			<?php if ($article->IsTop) { ?>
			<?php  include $this->GetTemplate('post-istop');  ?>
			<?php }else{  ?>
			<?php if ($zbp->Config('downlee')->sycmsadoff=='1') { ?><?php if ($i==4) { ?><?php  include $this->GetTemplate('post-ads');  ?><?php } ?><?php $i++; ?><?php } ?>
			<?php  include $this->GetTemplate('post-multi');  ?>
			<?php } ?>
			<?php }   ?>
		</div>
		<?php if ($pagebar) { ?><footer class="pagination<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown<?php } ?>">
			<?php  foreach ( $pagebar->buttons as $k=>$v) { ?><?php if ($k=='›') { ?><div id="loadmore" class="load-more-wrap loadmore"><a class="load-more" href="<?php  echo $v;  ?>" id="post_over">点击查看更多</a></div><?php } ?><?php }   ?>
		</footer><?php } ?>
	</div>
	<?php } ?><?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->syimgadoff=='1' && strlen ( $zbp->Config('downlee')->syimgadm ) > 8) { ?><div id="icmstwo" class="mediad icmstwo}"><?php  echo $zbp->Config('downlee')->syimgadm;  ?></div><?php } ?>
	<?php }else{  ?><?php if ($zbp->Config('downlee')->syimgadoff=='1' && strlen ( $zbp->Config('downlee')->syimgad ) > 8) { ?><div id="icmstwo" class="mediad icmstwo"><?php  echo $zbp->Config('downlee')->syimgad;  ?></div><?php } ?><?php } ?>
	<?php if ($zbp->Config('downlee')->sytextidoff=='1') { ?><?php $flids = explode(',',$zbp->Config('downlee')->syshowid); ?><?php  foreach ( $flids as $flid) { ?><div class="home-list-main">
		<div class="container clearfix">
			<?php if (isset($categorys[$flid])) { ?><section class="section-info">
				<h2 class="postmode-title"><?php  echo $categorys[$flid]->Name;  ?></h2>
				<p class="postmode-description"><?php if ($categorys[$flid]->Intro>'0') { ?><?php  echo $categorys[$flid]->Intro;  ?><?php }else{  ?><?php  echo $zbp->Config('downlee')->Description;  ?><?php } ?></p>
			</section><?php } ?>			
			<div class="cat-site clearfix">
				<?php  foreach ( GetList($zbp->Config('downlee')->syshownum,$flid,null,null,null,null,array('has_subcate'=>true)) as $key=>$article) { ?><?php  $i=$key;  ?>
					<?php  include $this->GetTemplate('post-multis');  ?>
				<?php }   ?>
			</div>
			<?php if (isset($categorys[$flid])) { ?><div class="item-pagination"><a href="<?php  echo $categorys[$flid]->Url;  ?>" target="_blank" class="btn-pagination">查看更多</a></div><?php } ?>
		</div>
	</div><?php }   ?><?php } ?>
	<?php if ($zbp->Config('downlee')->vipmoduleoff=='1') { ?><div class="home-custom<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown" data-wow-delay="0.25s<?php } ?>" style="background-image: url(/zb_users/theme/downlee/style/images/custom_bg.jpg);">
		<div class="container clearfix">
			<div class="custom_desc"><span><?php  echo $zbp->Config('downlee')->vipmodule;  ?></span></div>
			<div class="custom_btn">
				<a href="<?php  echo $zbp->Config('downlee')->vipurl1;  ?>" class="custom_button_l" title=""><span><?php  echo $zbp->Config('downlee')->viptext1;  ?></span></a>
				<a href="<?php  echo $zbp->Config('downlee')->vipurl2;  ?>" class="custom_button_r" title=""><span><?php  echo $zbp->Config('downlee')->viptext2;  ?></span></a>
			</div>
		</div>
	</div>
	<?php } ?><?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->sybigadoff=='1' && strlen ( $zbp->Config('downlee')->sybigadm ) > 8) { ?><div id="icmsone" class="mediad icmsone}"><?php  echo $zbp->Config('downlee')->sybigadm;  ?></div><?php } ?>
	<?php }else{  ?><?php if ($zbp->Config('downlee')->sybigadoff=='1' && strlen ( $zbp->Config('downlee')->sybigad ) > 8) { ?><div id="icmsone" class="mediad icmsone"><?php  echo $zbp->Config('downlee')->sybigad;  ?></div><?php } ?><?php } ?>
	<?php if ($zbp->Config('downlee')->sygoodsoff=='1') { ?><div class="home-primary"><?php $flids = explode(',',"{$zbp->Config('downlee')->sygoods}"); ?><?php  foreach ( $flids as $flid) { ?><?php if (isset($categorys[$flid])) { ?>
		<section class="section-info">
			<h2 class="postmode-title"><?php  echo $categorys[$flid]->Name;  ?></h2>
			<p class="postmode-description"><?php if ($categorys[$flid]->Intro>'0') { ?><?php  echo $categorys[$flid]->Intro;  ?><?php }else{  ?><?php  echo $zbp->Config('downlee')->Description;  ?><?php } ?></p>
		</section><?php } ?>
		<div class="syimgid-main container clearfix">
			<?php  foreach ( GetList($zbp->Config('downlee')->sygoodsnum,$flid,null,null,null,null,array('has_subcate'=>true)) as $key=>$article) { ?>
				<div class="syimgid-box<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown" data-wow-delay="0.25s<?php } ?>">
					<div class="syimgid-item-l">
						<a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>"><img src="<?php  echo downlee_firstimg($article);  ?>" alt="<?php  echo $article->Title;  ?>"></a>
					</div>
					<div class="syimgid-item-r">
						<h3><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>"><?php  echo $article->Title;  ?></a></h3>
						<?php if ($zbp->CheckPlugin('LayCenter')) { ?><?php  $pay = $article->Pay;  ?><?php if ($pay->onsale) { ?><p class="syimgid-item-price">促销特价：￥<span><?php  echo $pay->price;  ?></span><?php  echo $lcp->config->currency_alias;  ?></p>
						<?php }else{  ?><p class="syimgid-item-price">商品售价：￥<span><?php  echo $pay->price;  ?></span><?php  echo $lcp->config->currency_alias;  ?></p><?php } ?>
						<?php }elseif(strlen ( $article->Metas->price ) > 0) {  ?><p class="syimgid-item-price">售价：￥<span><?php  echo $article->Metas->price;  ?></span>积分</p>
						<?php }else{  ?><p class="syimgid-item-price wujia">暂无标价</p><?php } ?>
						<div class="syimgid-item-other">
							<?php if ($zbp->Config('downlee')->introSource =='1') {$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),50)).'...');}else{$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),50)).'...');} ?><?php  echo $intro;  ?>
						</div>
						<div class="syimgid-item-b">
							<a href="<?php if (strlen ( $article->Metas->showhow ) > 8) { ?><?php  echo $host;  ?>zb_system/cmd.php?act=ajax&hk_url=<?php  echo base64_encode($article->Metas->showhow);  ?><?php } ?>" title="查看演示" rel="nofollow" class="syimgid-item-demo" target="_blank"><?php if (strlen ( $article->Metas->showhow ) > 8) { ?>查看演示<?php }else{  ?>查看详情<?php } ?></a>
							<a href="<?php  echo $article->Url;  ?>" class="syimgid-item-btn" title="<?php  echo $article->Url;  ?>"><i class="iconfont icon-wenhao mr5"></i>下载资源</a>
						</div>
					</div>
				</div><?php }   ?>
			</div><?php if (isset($categorys[$flid])) { ?><div class="item-pagination"><a href="<?php  echo $categorys[$flid]->Url;  ?>" target="_blank" class="btn-pagination">查看更多</a></div><?php } ?>
		</div><?php }   ?>		
	</div><?php } ?>
	<?php if ($zbp->Config('downlee')->syspecialon=='1') { ?><div class="home-text-list">
		<div class="container clearfix"><?php $flids = explode(',',$zbp->Config('downlee')->syspecial); ?><?php  foreach ( $flids as $flid) { ?>
			<div class="home-text-box<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown" data-wow-delay="0.25s<?php } ?>">
				<?php  foreach ( GetList($zbp->Config('downlee')->syspecialnum,$flid,null,null,null,null,array('has_subcate'=>true)) as $key=>$article) { ?><?php  $ids=$key;  ?><?php if ($ids==0) { ?>
				<div class="home-text-item">
					<div class="home-item-category"><?php  echo $categorys[$flid]->Name;  ?></div>
					<h2 class="text-item-title"><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" target="_blank"><?php  echo $article->Title;  ?></a></h2>
					<p class="text-item-info"><?php if ($zbp->Config('downlee')->introSource =='1') {$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),108)).'...');}else{$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),108)).'...');} ?><?php  echo $intro;  ?></p>
					<ul class="text-item-ul"><?php }else{  ?>
						<li><span class="list-date"><?php  echo $article->Time('y/m/d');  ?></span><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" target="_blank"><?php  echo $article->Title;  ?></a></li><?php } ?><?php }   ?>
					</ul>
				</div>
			</div><?php }   ?>
		</div>
	</div><?php } ?>
	<?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->sytextadoff=='1' && strlen ( $zbp->Config('downlee')->sytextadm ) > 8) { ?><div id="icmsthree" class="mediad icmsthree}"><?php  echo $zbp->Config('downlee')->sytextadm;  ?></div><?php } ?>
	<?php }else{  ?><?php if ($zbp->Config('downlee')->sytextadoff=='1' && strlen ( $zbp->Config('downlee')->sytextad ) > 8) { ?><div id="icmsthree" class="mediad icmsthree"><?php  echo $zbp->Config('downlee')->sytextad;  ?></div><?php } ?><?php } ?>
	<?php if ($zbp->Config('downlee')->linkoff=='1') { ?>
	<div class="home-links container clearfix<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown<?php } ?>"><!--友情链接-->
		<div class="link-box">
		<section class="links-title">
			<h3><?php  echo $modules['link']->Name;  ?></h3>
			<span class="linksub"><?php  echo $zbp->Config('downlee')->linksub;  ?></span>
			<span class="suburl"><a href="<?php  echo $zbp->Config('downlee')->linkurl;  ?>" target="_blank">更多<i class="icon font-add-circle"></i></a></span>
		</section>
		<ul id="links-home">
			<?php  if(isset($modules['link'])){echo $modules['link']->Content;}  ?>
		</ul>
		</div>
	</div><?php } ?>
</main>
<?php if ($zbp->Config('downlee')->smoduleoff=='1') { ?><div class="rno-cert">
	<div class="rno-panel">
		<div class="rno-panel-bg" style="background-image: url(//main.qcloudimg.com/raw/119a10c00081b7a999e2b264c289930a/bg2.jpg);"></div>
		<div class="rno-panel-inner">
			<h3 class="rno-panel-title"><?php  echo $zbp->Config('downlee')->svipmodule;  ?></h3>
			<p class="rno-panel-desc"><?php  echo $zbp->Config('downlee')->svipsub;  ?></p>
			<a href="<?php  echo $zbp->Config('downlee')->svipurl;  ?>" class="rno-btn"><span class="rno-btn-text"><?php  echo $zbp->Config('downlee')->sviptext;  ?></span></a>
		</div>
	</div>
</div>
<?php } ?><?php  include $this->GetTemplate('footer');  ?>