<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{php}$zero1=strtotime (date('y-m-d')); //当前时间
$zero2=strtotime ($article->Time('y-m-d'));  //过期时间
$isnew=false;
if (ceil(($zero1-$zero2)/86400) < 1){
  $isnew=true;
};
if ($zbp->Config('downlee')->introSource =='1') {
	$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),168)).'...');
}else{
	$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),168)).'...');
}{/php}
<article class="info-list auto-list{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown" data-wow-delay="0.25s{/if}">
	<figure class="sl-img">
		<a href="{$article.Url}" class="is_image"{if $zbp->Config('downlee')->blankoff=='1'} target="_blank"{/if}>{if $zbp->Config('downlee')->lazyoff=='1'}<img class="lazy" src="{$zbp->Config('downlee')->lazyimg}"  data-original="{downlee_firstimg($article)}"  alt="{$article.Title}" title="详细阅读：{$article.Title}">{else}<img class="lazy" src="{downlee_firstimg($article)}"  alt="{$article.Title}" title="详细阅读：{$article.Title}">{/if}</a>
		<p class="sl-title-name">{$article.Category.Name}</p>
	</figure>
	<div class="sl-main">
		<h3><a href="{$article.Url}" title="{$article.Title}"{if $zbp->Config('downlee')->blankoff=='1'} target="_blank"{/if}>{$article.Title}</a></h3>
		<div class="sl-meta">
			<span class="sl-meta-author"><a href="{$article.Author.Url}" rel="external nofollow"><img alt="{$article.Author.StaticName}" src="{$article.Author.Avatar}" class="sl-avatar" height="64" width="64">{$article.Author.StaticName}</a></span>
			<span class="sl-meta-time"><i class="icon font-time"></i>{downlee_TimeAgo($article.Time())}</span>
			<span class="sl-meta-view"><i class="icon font-eye"></i>{downlee_ViewNums($article)}阅读</span>
			{if !$article.IsLock && !$option['ZC_COMMENT_TURNOFF']}<span class="sl-meta-comm"><a href="{$article.Url}#comments"><i class="icon font-comment"></i>{$article.CommNums}评论</a></span>{/if}
		</div>
		<div class="sl-info">{$intro}</div>
	</div>
	<span class="sl-line"></span>
	{if $isnew}<div class="sl-tipss">最新</div>{/if}
</article>