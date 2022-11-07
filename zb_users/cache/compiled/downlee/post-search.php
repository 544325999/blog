<?php 
$zero1=strtotime (date('y-m-d')); //当前时间
$zero2=strtotime ($article->Time('y-m-d'));  //过期时间
$isnew=false;
if (ceil(($zero1-$zero2)/86400) < 1){
  $isnew=true;
}; ?>
<article class="info-list auto-list<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown" data-wow-delay="0.25s<?php } ?>">
	<figure class="sl-img">
		<a href="<?php  echo $article->Url;  ?>" class="is_image" target="_blank"><?php if ($zbp->Config('downlee')->lazyoff=='1') { ?><img class="lazy" src="<?php  echo $zbp->Config('downlee')->lazyimg;  ?>"  data-original="<?php  echo downlee_firstimg($article);  ?>"  alt="<?php  echo $article->Title;  ?>" title="详细阅读：<?php  echo $article->Title;  ?>"><?php }else{  ?><img class="lazy" src="<?php  echo downlee_firstimg($article);  ?>"  alt="<?php  echo $article->Title;  ?>" title="详细阅读：<?php  echo $article->Title;  ?>"><?php } ?></a>
		<p class="sl-title-name"><?php  echo $article->Category->Name;  ?></p>
	</figure>
	<div class="sl-main">
		<h3><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" target="_blank"><?php echo str_replace($search,'<span style="color:red">'.$search.'</span>',$article->Title) ?></a></h3>
		<div class="sl-meta">
			<span class="sl-meta-author"><a href="<?php  echo $article->Author->Url;  ?>" rel="external nofollow"><img alt="<?php  echo $article->Author->StaticName;  ?>" src="<?php  echo $article->Author->Avatar;  ?>" class="sl-avatar" height="64" width="64"><?php  echo $article->Author->StaticName;  ?></a></span>
			<span class="sl-meta-time"><i class="icon font-time"></i><?php  echo downlee_TimeAgo($article->Time());  ?></span>
			<span class="sl-meta-view"><i class="icon font-eye"></i><?php  echo downlee_ViewNums($article);  ?>阅读</span>
			<?php if (!$article->IsLock && !$option['ZC_COMMENT_TURNOFF']) { ?><span class="sl-meta-comm"><a href="<?php  echo $article->Url;  ?>#comments"><i class="icon font-comment"></i><?php  echo $article->CommNums;  ?>评论</a></span><?php } ?>
		</div>
		<div class="sl-info"><?php $description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),168)).'...');echo str_replace($search,'<span style="color:red">'.$search.'</span>',$description) ?></div>
	</div>
	<span class="sl-line"></span>
	<?php if ($isnew) { ?><div class="sl-tipss">最新</div><?php } ?>
</article>