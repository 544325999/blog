{* Template Name:专题目录 * Template Type:page,special *}<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{template:header}
<div class="article-term">
	<div class="term-top">
		<div class="term-box">
			<div class="term-bar-bg" style="background-image: url({if ($article->Metas->specialbg != '')}{$article->Metas->specialbg}{else}{downlee_firstimg($article)}{/if});"></div>
		</div>
		<div class="container term-text">
			<h1 class="article-title"><a href="{$article.Url}" title="正在阅读：{$article.Title}">{$article.Title}</a></h1>
		</div>
	</div>
	<div class="moveing-warp">
		<div class="bolang1 move"></div>
		<div class="bolang2 move"></div>
		<div class="bolang3 move"></div>
	</div>
</div>
<main class="top-column container clearfix">
	<nav class="navcates place"><i class="icon font-home"></i><a href="{$host}">首页</a><i class="icon font-angle-right"></i><a href="{$article.Url}" rel="bookmark" title="正在阅读 {$article.Title}">{$name} 专题栏目</a></nav>
	{if downlee_is_mobile()}{if $zbp->Config('downlee')->selladoff=="1" && strlen ( $zbp->Config('downlee')->selltopadyd ) > 8}<div id="catamedia" class="mediad catamedia">{$zbp->Config('downlee')->selltopadyd}</div>{/if}
	{else}{if $zbp->Config('downlee')->selladoff=="1" && strlen ( $zbp->Config('downlee')->selltopad ) > 8}<div id="catamedia" class="mediad catamedia">{$zbp->Config('downlee')->selltopad}</div>{/if}{/if}
	<div class="special-wrap clearfix">{php}$sid = explode(',',$article->Metas->specialid);{/php}{*按顺序填入tagID*}
		{foreach $sid as $key => $tid}<div class="special-item">{$array=Getlist(6,null,null,null,array($zbp->GetTagByID($tid)));}
			<figure class="special-item-thumb">
				<a href="{$zbp->GetTagByID($tid)->Url}" target="_blank"><img class="lazy loaded" src="{$host}zb_users/upload/special/{$zbp->GetTagByID($tid)->ID}.jpg"></a>
				<div class="special-number"><h2>专题：{$zbp->GetTagByID($tid)->Name}</h2></div>
			</figure>
			<div class="special-title">
				<div class="special-item-info">
					<span class="special-count">{if strlen ( $zbp->GetTagByID($tid)->Intro ) > 2}{$zbp->GetTagByID($tid)->Intro}{else}这是关于{$zbp->GetTagByID($tid)->Name} 文章的专题栏目，更多更详细的内容请点击查看详情{/if} · {$zbp->GetTagByID($tid)->Count}篇文章</span>
				</div>
				<ul class="special-posts">{foreach $array as $article}
					<li><span><a href="{$article.Category.Url}" target="_blank">{$article.Category.Name}</a></span><a href="{$article.Url}" class="post-link" target="_blank">{$article.Title}</a></li>
				{/foreach}</ul>
			</div>
		</div>{/foreach}
	</div>
</main>
{template:footer}