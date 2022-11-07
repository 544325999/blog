<?php 
$zero1=strtotime (date('y-m-d')); //当前时间
$zero2=strtotime ($article->Time('y-m-d'));	//过期时间
$isnew=false;
if (ceil(($zero1-$zero2)/86400) < 1){
	$isnew=true;
}; ?>
<article class="item-body auto-list<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown<?php } ?>" id="post-<?php  echo $i;  ?>">
	<figure class="item-meta">
		<div class="item-figure">
			<a href="<?php  echo $article->Url;  ?>"<?php if ($zbp->Config('downlee')->blankoff=='1') { ?> target="_blank"<?php } ?>><?php if ($zbp->Config('downlee')->lazyoff=='1') { ?><img class="lazy" src="<?php  echo $zbp->Config('downlee')->lazyimg;  ?>"  data-original="<?php  echo downlee_firstimg($article);  ?>"  alt="<?php  echo $article->Title;  ?>" title="详细阅读：<?php  echo $article->Title;  ?>"><?php }else{  ?><img class="lazy" src="<?php  echo downlee_firstimg($article);  ?>"  alt="<?php  echo $article->Title;  ?>" title="详细阅读：<?php  echo $article->Title;  ?>"><?php } ?><div class="cao-cover"><img src="<?php  echo $host;  ?>zb_users/theme/downlee/style/images/rings.svg" alt="<?php  echo $article->Title;  ?>" width="50" height="50px"></div></a>
			<?php if (($article->Metas->recommend)=='1') { ?><span class="item-font-rmb">推荐</span><?php } ?>
		</div>
		<?php if ($isnew) { ?><div class="entry-tipss">最新</div><?php } ?>
	</figure>
	<div class="item-wrapper">
		<div class="item-authort">
			<a href="<?php  echo $article->Author->Url;  ?>" target="_blank"><img src="<?php  echo $article->Author->Avatar;  ?>" alt="<?php  echo $article->Author->StaticName;  ?>"></a>
			<div class="item-tags">
				<span class="meta-tags">
					<?php if (count($article->Tags)>=1) { ?><?php  foreach ( array_slice($article->Tags,0,3) as $tag) { ?><a href="<?php  echo $tag->Url;  ?>" target="_blank"><?php  echo $tag->Name;  ?></a><?php }   ?><?php }else{  ?><a href="/">暂无标签</a><?php } ?>
				</span>
			</div>
		</div>
		<header class="item-header">
			<h2 class="item-title"><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" rel="bookmark"<?php if ($zbp->Config('downlee')->blankoff=='1') { ?> target="_blank"<?php } ?>><?php  echo $article->Title;  ?></a></h2>
		</header>
		<div class="item-footer">
			<a href="<?php  echo $article->Url;  ?>"<?php if ($zbp->Config('downlee')->blankoff=='1') { ?> target="_blank"<?php } ?>>
				<time datetime="<?php  echo $article->Time('Y-m-d H:i:s');  ?>"><i class="icon font-time"></i><?php  echo downlee_TimeAgo($article->Time());  ?></time>
				<span class="item-font-eye"><i class="icon font-eye"></i><?php  echo downlee_ViewNums($article);  ?></span>
				<a class="item-category" href="<?php  echo $article->Category->Url;  ?>"<?php if ($zbp->Config('downlee')->blankoff=='1') { ?> target="_blank"<?php } ?>><?php  echo $article->Category->Name;  ?></a>
			</a>
		</div>
	</div>
</article>