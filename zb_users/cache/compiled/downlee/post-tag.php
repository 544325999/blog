<?php  include $this->GetTemplate('header');  ?>
<div class="category-term">
	<div class="term-top">
		<div class="term-box">
			<div class="term-bar-bg" style="background-image: url(<?php  echo $zbp->Config('downlee')->categorybg;  ?>);"></div>
		</div>
		<div class="container term-text">
			<h2><?php if ($type=='tag') { ?><?php  echo $tag->Name;  ?><?php }elseif($type=='author') {  ?><?php  echo $author->StaticName;  ?><?php }else{  ?><?php  echo $title;  ?><?php } ?></h2>
			<h4 class="term-btns"><i class="mdi mdi-diamond-stone"></i><?php if ($type=='tag' && $tag->Intro>'0') { ?><?php  echo $tag->Intro;  ?><?php }elseif($type=='author' && $author->Intro>'0') {  ?><?php  echo $author->Intro;  ?><?php }else{  ?><?php  echo $zbp->Config('downlee')->Description;  ?><?php } ?></h4>
		</div>
	</div>
	<div class="moveing-warp">
		<div class="bolang1 move"></div>
		<div class="bolang2 move"></div>
		<div class="bolang3 move"></div>
	</div>
</div>
<div class="top-column container clearfix">
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
		echo $html; ?><?php }elseif($type=='tag') {  ?><i class="icon font-angle-right"></i>关于 <a href="<?php  echo $tag->Url;  ?>"><?php  echo $tag->Name;  ?></a> 的文章<?php }elseif($type=='author') {  ?><i class="icon font-angle-right"></i>作者 <a href="<?php  echo $author->Url;  ?>"><?php  echo $author->StaticName;  ?></a> 发布的文章<?php }else{  ?><i class="icon font-angle-right"></i><?php  echo $title;  ?><?php } ?>
	</nav>
	<div class="filter-sift">
		<ul class="filter-tag">
			<span class="filter-l"><i class="icon font-youhui"></i>标签</span>
			<li class="clearfix">
				<?php  foreach ( $zbp->GetTagList('*',null,array('tag_Count' => 'DESC'),'12') as $k => $tags) { ?>
				<a id="tags-<?php  echo $tags->ID;  ?>" href="<?php  echo $tags->Url;  ?>" class="<?php if ($tag->Name == $tags->Name) { ?>current<?php } ?>"><?php  echo $tags->Name;  ?></a>
				<?php }   ?>
			</li>
		</ul>
	</div>
</div>
<main class="main-content container clearfix">
	<div class="category-main auto-side<?php if ($zbp->Config('downlee')->sideberon=="1") { ?> sidebaron fl<?php } ?>">
		<?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->catezjadoff=="1" && strlen ( $zbp->Config('downlee')->catezjadyd ) > 8) { ?><div id="catamedia" class="mediad catamedia}"><?php  echo $zbp->Config('downlee')->catezjadyd;  ?></div><?php } ?>
		<?php }else{  ?><?php if ($zbp->Config('downlee')->catezjadoff=="1" && strlen ( $zbp->Config('downlee')->catezjad ) > 8) { ?><div id="catamedia" class="mediad catamedia"><?php  echo $zbp->Config('downlee')->catezjad;  ?></div><?php } ?><?php } ?>
		<div class="category-item auto-main">
			<?php  foreach ( $articles as $n=>$article) { ?><?php $i = $n+1; ?><?php if ($article->IsTop) { ?>
				<?php  include $this->GetTemplate('post-istop');  ?>
            <?php }else{  ?>
				<?php if ($zbp->Config('downlee')->sycmsadoff=="1") { ?><?php if ($i==4) { ?><?php  include $this->GetTemplate('post-ads');  ?><?php } ?><?php $i++; ?><?php } ?>
				<?php  include $this->GetTemplate('post-multi');  ?>
            <?php } ?><?php }   ?>
		</div>
		<?php if ($pagebar) { ?><footer class="pagination<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown<?php } ?>">
			<?php  foreach ( $pagebar->buttons as $k=>$v) { ?><?php if ($k=='›') { ?><div id="loadmore" class="load-more-wrap loadmore"><a class="load-more" href="<?php  echo $v;  ?>" id="post_over">点击查看更多</a></div><?php } ?><?php }   ?>
		</footer><?php } ?>
	</div>
	<?php if ($zbp->Config('downlee')->sideberon=="1") { ?><aside class="sidebar fr<?php if ($zbp->Config('downlee')->msideoff=='1') { ?> mside<?php } ?>">
		<?php if ($zbp->Config('downlee')->authoroff=='1') { ?><section class="widget abautor">
			<div class="widget-list">
				<div class="widget_avatar" style="background-image: url(<?php  echo $zbp->Config('downlee')->authorimg;  ?>);"><a href="<?php  echo $article->Author->Url;  ?>"><img class="widget-about-image" src="<?php  echo $article->Author->Avatar;  ?>" alt="<?php  echo $article->Author->StaticName;  ?>" height="70" width="70"><div class="widget-cover<?php if ($zbp->CheckPlugin('LayCenter') && ($article->Author->VipType >= 3)) { ?> layvip<?php  echo $article->Author->VipType;  ?> vip<?php  echo $article->Author->Level;  ?><?php }else{  ?> vip<?php  echo $article->Author->Level;  ?><?php } ?>"></div><i title="<?php  echo $article->Author->LevelName;  ?>" class="author-ident author<?php  echo $article->Author->Level;  ?>"></i></a></div>
				<div class="widget-about-intro">
					<div class="name"><h3><?php  echo $article->Author->StaticName;  ?></h3>
					<?php if ($zbp->CheckPlugin('LayCenter') && ($article->Author->VipType >= 3)) { ?><span class="autlv lay-<?php  echo $article->Author->VipType;  ?> aut-<?php  echo $article->Author->Level;  ?> vs">V</span><span class="autlv lay-<?php  echo $article->Author->VipType;  ?> aut-<?php  echo $article->Author->Level;  ?>"><?php  echo $article->Author->VipName;  ?></span><?php }else{  ?><span class="autlv aut-<?php  echo $article->Author->Level;  ?>  vs">V</span>
					<span class="autlv aut-<?php  echo $article->Author->Level;  ?>"><?php  echo $article->Author->LevelName;  ?></span><?php } ?></div>
					<div class="widget-about-desc">文章 <?php  echo $article->Author->Articles;  ?> 篇 <i>|</i> 评论 <?php  echo $article->Author->Comments;  ?> 次</div><?php  $list = GetList(3,null,$article->Author->ID);  ?>
					<?php if ($list) { ?><div class="widget-article-newest"><span>最新文章</span></div>
					<ul class="widget-about-posts">
						<?php  foreach ( $list as $post) { ?>
						<li><span class="posts-date"><?php  echo $post->Time('m/d');  ?></span><a class="widget-posts-title" href="<?php  echo $post->Url;  ?>" title="<?php  echo $post->Title;  ?>"><?php  echo $post->Title;  ?></a></li><?php }   ?>
					</ul><?php } ?>
				</div>
			</div>
        </section><?php } ?>
		<?php  include $this->GetTemplate('sidebar3');  ?>
	</aside><?php } ?>
</main>
<?php  include $this->GetTemplate('footer');  ?>