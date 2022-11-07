<?php  /* Template Name:分类资讯模板 * Template Type:catainfo */  ?><?php  include $this->GetTemplate('header');  ?>
<div class="category-term">
	<div class="term-top">
		<div class="term-box">
			<div class="term-bar-bg" style="background-image: url(<?php if ($type=='category' && strlen ($category->Metas->catalog_bgimg) > 8) { ?><?php  echo $category->Metas->catalog_bgimg;  ?><?php }else{  ?><?php  echo $zbp->Config('downlee')->categorybg;  ?><?php } ?>);"></div>
		</div>
		<div class="container term-text">
			<h2><?php if ($type=='category') { ?><?php if (strlen ( $category->Metas->Categorytitle ) > 2) { ?><?php  echo $category->Metas->Categorytitle;  ?><?php }else{  ?><?php  echo $category->Name;  ?><?php } ?><?php }elseif($type=='tag') {  ?><?php if (strlen ( $category->Metas->Tagstitle ) > 2) { ?><?php  echo $category->Metas->Tagstitle;  ?><?php }else{  ?><?php  echo $tag->Name;  ?><?php } ?><?php }elseif($type=='author') {  ?><?php  echo $author->StaticName;  ?><?php }else{  ?><?php  echo $title;  ?><?php } ?></h2>
			<h4 class="term-btns"><i class="mdi mdi-diamond-stone"></i><?php if ($type=='category' && $category->Intro>'0') { ?><?php  echo $category->Intro;  ?><?php }elseif( $type=='tag' && $tag->Intro>'0') {  ?><?php  echo $tag->Intro;  ?><?php }elseif($type=='author' && $author->Intro>'0') {  ?><?php  echo $author->Intro;  ?><?php }else{  ?><?php  echo $zbp->Config('downlee')->Description;  ?><?php } ?></h4>
		</div>
	</div>
	<div class="moveing-warp">
		<div class="bolang1 move"></div>
		<div class="bolang2 move"></div>
		<div class="bolang3 move"></div>
	</div>
</div>
<main class="main-content container clearfix">
	<nav class="navcates place">
		当前位置：<i class="icon font-home"></i><a href="<?php  echo $host;  ?>">首页</a><?php if ($type=='category') { ?><?php 
		$html='';
		function navcate($id){
		global $html;
		$cate = new Category;
		$cate->LoadInfoByID($id);
		$html ='<i class="icon font-angle-right"></i><a href="' .$cate->Url.'" title="查看 ' .$cate->Name. ' 分类中的全部文章">' .$cate->Name. '</a> '.$html;
		if(($cate->ParentID)>0){navcate($cate->ParentID);}
		}
		navcate($category->ID);
		global $html;
		echo $html; ?><?php }elseif($type=='tag') {  ?><i class="icon font-angle-right"></i>关于 <a href="<?php  echo $tag->Url;  ?>"><?php  echo $tag->Name;  ?></a> 的文章<?php }elseif($type=='author') {  ?><i class="icon font-angle-right"></i>作者 <a href="<?php  echo $author->Url;  ?>"><?php  echo $author->Name;  ?></a> 发布的文章<?php }else{  ?><i class="icon font-angle-right"></i><?php  echo $title;  ?><?php } ?>
	</nav>
	<?php if ($type=='category') { ?><div class="filter-sift">
		<ul class="filter-tag">
			<span class="filter-l"><i class="icon font-fenlan"></i>分类</span>
			<li class="clearfix">
				<?php  $cates = downlee_GetRootCategory();  ?><?php  foreach ( $cates as $cate) { ?>
				<a id="cate-<?php  echo $cate->ID;  ?>" href="<?php  echo $cate->Url;  ?>" class="<?php if ($cate->Url == $category->Url || $category->Level && $category->RootID == $cate->ID) { ?>current<?php } ?>"><?php  echo $cate->Name;  ?></a>
				<?php }   ?>
			</li>
		</ul>
		<?php if ($category->Level == 0) { ?><?php  $subcate = $zbp->GetCategoryList('*',array(array('=','cate_ParentID',$category->ID)),array('cate_Order'=>'ASC'));  ?>
		<?php }elseif($category->Level >= 1) {  ?><?php  $subcate = $zbp->GetCategoryList('*',array(array('=','cate_ParentID',$category->ParentID)),array('cate_Order'=>'ASC'));  ?>
		<?php } ?><?php if (isset($subcate) && $subcate) { ?>
		<ul class="filter-tag">
			<span class="filter-l"><i class="icon font-layers"></i>子类</span>
			<li class="clearfix">
				<?php  foreach ( $subcate as $cate) { ?>
				<a id="cate-<?php  echo $cate->ID;  ?>" href="<?php  echo $cate->Url;  ?>" class="<?php if ($cate->Url == $category->Url) { ?>current<?php } ?>"><?php  echo $cate->Name;  ?></a>
				<?php }   ?>
			</li>
		</ul><?php } ?>
		<?php if (strlen ( $zbp->Config('downlee')->fltagnum ) > 0) { ?><ul class="filter-tag">
			<span class="filter-l"><i class="icon font-youhui"></i>标签</span>
			<li class="clearfix">
				<?php  foreach ( $zbp->GetTagList('*',null,array('tag_Count' => 'DESC'),''.$zbp->Config('downlee')->fltagnum.'') as $k => $tags) { ?>
				<a id="tags-<?php  echo $tags->ID;  ?>" href="<?php  echo $tags->Url;  ?>" class=""><?php  echo $tags->Name;  ?></a>
				<?php }   ?>
			</li>
		</ul><?php } ?>
		<form id="kf-order" class="filter-tag">
			<span class="filter-l"><i class="icon font-paixu"></i>排序</span>
			<li class="filter order">
				<a href="" rel="nofollow" class="<?php if (GetVars('order','GET') == 'newest' || !GetVars('order','GET')) { ?>current<?php } ?>" data-type="newest">最新<i class="icon font-chevron-<?php if (GetVars('sort','GET')) { ?>up<?php }else{  ?>down<?php } ?>"></i></a>
				<a href="" rel="nofollow" class="<?php if (GetVars('order','GET') == 'view') { ?>current<?php } ?>" data-type="view">浏览<i class="icon font-chevron-<?php if (GetVars('sort','GET')) { ?>up<?php }else{  ?>down<?php } ?>"></i></a>
				<?php if (!$option['ZC_COMMENT_TURNOFF']) { ?><a href="" rel="nofollow" class="<?php if (GetVars('order','GET') == 'comment') { ?>current<?php } ?>" data-type="comment">评论<i class="icon font-chevron-<?php if (GetVars('sort','GET')) { ?>up<?php }else{  ?>down<?php } ?>"></i></a><?php } ?>
			</li>
			<?php if ($zbp->Config('system')->ZC_STATIC_MODE != 'REWRITE') { ?><input type="hidden" name="cate" value="<?php  echo $category->ID;  ?>"><?php } ?>
			<input type="hidden" name="order" value="<?php  echo GetVars('order','GET');  ?>">
			<input type="hidden" name="sort" value="<?php echo (int)GetVars('sort','GET') ?>">
		</form>
	</div><?php } ?>
	<div class="auto-wrap">
		<div class="catalist-main auto-side">
			<?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->catezjadoff=="1" && strlen ( $zbp->Config('downlee')->catezjadyd ) > 8) { ?><div id="catamedia" class="mediad catamedia}"><?php  echo $zbp->Config('downlee')->catezjadyd;  ?></div><?php } ?>
			<?php }else{  ?><?php if ($zbp->Config('downlee')->catezjadoff=="1" && strlen ( $zbp->Config('downlee')->catezjad ) > 8) { ?><div id="catamedia" class="mediad catamedia"><?php  echo $zbp->Config('downlee')->catezjad;  ?></div><?php } ?><?php } ?>
			<div class="catalist-item auto-main">
			<?php  foreach ( $articles as $n=>$article) { ?><?php $i = $n+1; ?>
			<?php if ($article->IsTop) { ?>
				<?php  include $this->GetTemplate('post-infotop');  ?>
            <?php }else{  ?>
				<?php if ($zbp->Config('downlee')->sycmsadoff=="1") { ?><?php if ($i==4) { ?><?php  include $this->GetTemplate('post-infoads');  ?><?php } ?><?php $i++; ?><?php } ?>
				<?php  include $this->GetTemplate('post-infotab');  ?>
            <?php } ?><?php }   ?>
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
		<aside class="sidebar fr<?php if ($zbp->Config('downlee')->msideoff=='1') { ?> mside<?php } ?>">
			<?php  include $this->GetTemplate('sidebar');  ?>
		</aside>
	</div>
</main>
<?php  include $this->GetTemplate('footer');  ?>