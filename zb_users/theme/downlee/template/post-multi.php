<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{php}
$zero1=strtotime (date('y-m-d')); //当前时间
$zero2=strtotime ($article->Time('y-m-d'));	//过期时间
$isnew=false;
if (ceil(($zero1-$zero2)/86400) < 1){
	$isnew=true;
};{/php}
<article class="item-body auto-list{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown{/if}" id="post-{$i}">
	<figure class="item-meta">
		<div class="item-figure">
			<a href="{$article.Url}"{if $zbp->Config('downlee')->blankoff=='1'} target="_blank"{/if}>{if $zbp->Config('downlee')->lazyoff=='1'}<img class="lazy" src="{$zbp->Config('downlee')->lazyimg}"  data-original="{downlee_firstimg($article)}"  alt="{$article.Title}" title="详细阅读：{$article.Title}">{else}<img class="lazy" src="{downlee_firstimg($article)}"  alt="{$article.Title}" title="详细阅读：{$article.Title}">{/if}<div class="cao-cover"><img src="{$host}zb_users/theme/downlee/style/images/rings.svg" alt="{$article.Title}" width="50" height="50px"></div></a>
			{if ($article->Metas->recommend)=='1'}<span class="item-font-rmb">推荐</span>{/if}
		</div>
		{if $isnew}<div class="entry-tipss">最新</div>{/if}
	</figure>
	<div class="item-wrapper">
		<div class="item-authort">
			<a href="{$article.Author.Url}" target="_blank"><img src="{$article.Author.Avatar}" alt="{$article.Author.StaticName}"></a>
			<div class="item-tags">
				<span class="meta-tags">
					{if count($article.Tags)>=1}{foreach array_slice($article.Tags,0,3) as $tag}<a href="{$tag.Url}" target="_blank">{$tag.Name}</a>{/foreach}{else}<a href="/">暂无标签</a>{/if}
				</span>
			</div>
		</div>
		<header class="item-header">
			<h2 class="item-title"><a href="{$article.Url}" title="{$article.Title}" rel="bookmark"{if $zbp->Config('downlee')->blankoff=='1'} target="_blank"{/if}>{$article.Title}</a></h2>
		</header>
		<div class="item-footer">
			<a href="{$article.Url}"{if $zbp->Config('downlee')->blankoff=='1'} target="_blank"{/if}>
				<time datetime="{$article.Time('Y-m-d H:i:s')}"><i class="icon font-time"></i>{downlee_TimeAgo($article.Time())}</time>
				<span class="item-font-eye"><i class="icon font-eye"></i>{downlee_ViewNums($article)}</span>
				<a class="item-category" href="{$article.Category.Url}"{if $zbp->Config('downlee')->blankoff=='1'} target="_blank"{/if}>{$article.Category.Name}</a>
			</a>
		</div>
	</div>
</article>