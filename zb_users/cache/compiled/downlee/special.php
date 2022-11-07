<?php  /* Template Name:专题目录 * Template Type:page,special */  ?><?php  include $this->GetTemplate('header');  ?>
<div class="article-term">
	<div class="term-top">
		<div class="term-box">
			<div class="term-bar-bg" style="background-image: url(<?php if (($article->Metas->specialbg != '')) { ?><?php  echo $article->Metas->specialbg;  ?><?php }else{  ?><?php  echo downlee_firstimg($article);  ?><?php } ?>);"></div>
		</div>
		<div class="container term-text">
			<h1 class="article-title"><a href="<?php  echo $article->Url;  ?>" title="正在阅读：<?php  echo $article->Title;  ?>"><?php  echo $article->Title;  ?></a></h1>
		</div>
	</div>
	<div class="moveing-warp">
		<div class="bolang1 move"></div>
		<div class="bolang2 move"></div>
		<div class="bolang3 move"></div>
	</div>
</div>
<main class="top-column container clearfix">
	<nav class="navcates place"><i class="icon font-home"></i><a href="<?php  echo $host;  ?>">首页</a><i class="icon font-angle-right"></i><a href="<?php  echo $article->Url;  ?>" rel="bookmark" title="正在阅读 <?php  echo $article->Title;  ?>"><?php  echo $name;  ?> 专题栏目</a></nav>
	<?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->selladoff=="1" && strlen ( $zbp->Config('downlee')->selltopadyd ) > 8) { ?><div id="catamedia" class="mediad catamedia"><?php  echo $zbp->Config('downlee')->selltopadyd;  ?></div><?php } ?>
	<?php }else{  ?><?php if ($zbp->Config('downlee')->selladoff=="1" && strlen ( $zbp->Config('downlee')->selltopad ) > 8) { ?><div id="catamedia" class="mediad catamedia"><?php  echo $zbp->Config('downlee')->selltopad;  ?></div><?php } ?><?php } ?>
	<div class="special-wrap clearfix"><?php $sid = explode(',',$article->Metas->specialid); ?><?php  /*按顺序填入tagID*/  ?>
		<?php  foreach ( $sid as $key => $tid) { ?><div class="special-item"><?php  $array=Getlist(6,null,null,null,array($zbp->GetTagByID($tid)));;  ?>
			<figure class="special-item-thumb">
				<a href="<?php  echo $zbp->GetTagByID($tid)->Url;  ?>" target="_blank"><img class="lazy loaded" src="<?php  echo $host;  ?>zb_users/upload/special/<?php  echo $zbp->GetTagByID($tid)->ID;  ?>.jpg"></a>
				<div class="special-number"><h2>专题：<?php  echo $zbp->GetTagByID($tid)->Name;  ?></h2></div>
			</figure>
			<div class="special-title">
				<div class="special-item-info">
					<span class="special-count"><?php if (strlen ( $zbp->GetTagByID($tid)->Intro ) > 2) { ?><?php  echo $zbp->GetTagByID($tid)->Intro;  ?><?php }else{  ?>这是关于<?php  echo $zbp->GetTagByID($tid)->Name;  ?> 文章的专题栏目，更多更详细的内容请点击查看详情<?php } ?> · <?php  echo $zbp->GetTagByID($tid)->Count;  ?>篇文章</span>
				</div>
				<ul class="special-posts"><?php  foreach ( $array as $article) { ?>
					<li><span><a href="<?php  echo $article->Category->Url;  ?>" target="_blank"><?php  echo $article->Category->Name;  ?></a></span><a href="<?php  echo $article->Url;  ?>" class="post-link" target="_blank"><?php  echo $article->Title;  ?></a></li>
				<?php }   ?></ul>
			</div>
		</div><?php }   ?>
	</div>
</main>
<?php  include $this->GetTemplate('footer');  ?>