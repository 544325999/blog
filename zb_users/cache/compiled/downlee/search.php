<?php  /* Template Name:搜索页模板 * Template Type:search */  ?><?php  include $this->GetTemplate('header');  ?>
<div class="category-term">
	<div class="term-top">
		<div class="term-box">
			<div class="term-bar-bg" style="background-image: url(<?php  echo $zbp->Config('downlee')->categorybg;  ?>);"></div>
		</div>
		<div class="container term-text">
			<h2><?php  echo $title;  ?></h2>
			<h4 class="term-btns"><i class="mdi mdi-diamond-stone"></i><?php  echo $zbp->Config('downlee')->Description;  ?></h4>
		</div>
	</div>
	<div class="moveing-warp">
		<div class="bolang1 move"></div>
		<div class="bolang2 move"></div>
		<div class="bolang3 move"></div>
	</div>
</div>
<main class="main-content search-content container clearfix">
	<nav class="navcates place">
		当前位置：<i class="icon font-home"></i><a href="<?php  echo $host;  ?>">首页</a><i class="icon font-angle-right"></i><?php  echo $title;  ?>
	</nav>
	<div class="catalist-main search-main auto-side">
		<?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->catezjadoff=="1" && strlen ( $zbp->Config('downlee')->catezjadyd ) > 8) { ?><div id="catamedia" class="mediad catamedia}"><?php  echo $zbp->Config('downlee')->catezjadyd;  ?></div><?php } ?>
		<?php }else{  ?><?php if ($zbp->Config('downlee')->catezjadoff=="1" && strlen ( $zbp->Config('downlee')->catezjad ) > 8) { ?><div id="catamedia" class="mediad catamedia"><?php  echo $zbp->Config('downlee')->catezjad;  ?></div><?php } ?><?php } ?>
		<?php if (count((array)$articles)) { ?><div class="catesell-item auto-main">
            <?php  foreach ( $articles as $n=>$article) { ?><?php $i = $n+1; ?>
				<?php if ($zbp->Config('downlee')->sycmsadoff=="1") { ?><?php if ($i==4) { ?><?php  include $this->GetTemplate('post-ads');  ?><?php } ?><?php $i++; ?><?php } ?>
				<?php  include $this->GetTemplate('post-search');  ?>
            <?php }   ?>
			</div>
			<?php if ($pagebar) { ?><?php if ($zbp->Config('downlee')->footpage=="1") { ?><footer class="pagination onepage<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown<?php } ?>">
				<ul><?php  include $this->GetTemplate('pagebar');  ?></ul>
			</footer>
			<?php }elseif($zbp->Config('downlee')->footpage=="2") {  ?><footer class="pagination autoload<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown<?php } ?>">
				<?php  foreach ( $pagebar->buttons as $k=>$v) { ?><?php if ($k=='›') { ?><div id="loadmore" class="load-more-wrap loadmore"><a class="load-more" href="<?php  echo $v;  ?>" id="post_over">点击查看更多</a></div><?php } ?><?php }   ?>
			</footer>
			<?php }else{  ?><footer class="pagination catpage<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown<?php } ?>">
				<ul><?php  include $this->GetTemplate('pagebar');  ?></ul>
				<?php  foreach ( $pagebar->buttons as $k=>$v) { ?><?php if ($k=='›') { ?><div id="loadmore" class="load-more-wrap loadmore"><a class="load-more" href="<?php  echo $v;  ?>" id="post_over">点击查看更多</a></div><?php } ?><?php }   ?>
			</footer><?php } ?><?php } ?>
		</div>
		<?php }else{  ?><div class="search-null">
			<i class="icon font-icon_shiyongwendang"></i>没有搜到相关内容，要不换个关键词试试？
		</div><?php } ?>
	</div>
	<aside class="sidebar fr<?php if ($zbp->Config('downlee')->msideoff=='1') { ?> mside<?php } ?>">
		<?php  include $this->GetTemplate('sidebar4');  ?>
	</aside>
</main>
<?php  include $this->GetTemplate('footer');  ?>