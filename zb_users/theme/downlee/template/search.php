{* Template Name:搜索页模板 * Template Type:search *}<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{template:header}
<div class="category-term">
	<div class="term-top">
		<div class="term-box">
			<div class="term-bar-bg" style="background-image: url({$zbp->Config('downlee')->categorybg});"></div>
		</div>
		<div class="container term-text">
			<h2>{$title}</h2>
			<h4 class="term-btns"><i class="mdi mdi-diamond-stone"></i>{$zbp->Config('downlee')->Description}</h4>
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
		当前位置：<i class="icon font-home"></i><a href="{$host}">首页</a><i class="icon font-angle-right"></i>{$title}
	</nav>
	<div class="catalist-main search-main auto-side">
		{if downlee_is_mobile()}{if $zbp->Config('downlee')->catezjadoff=="1" && strlen ( $zbp->Config('downlee')->catezjadyd ) > 8}<div id="catamedia" class="mediad catamedia}">{$zbp->Config('downlee')->catezjadyd}</div>{/if}
		{else}{if $zbp->Config('downlee')->catezjadoff=="1" && strlen ( $zbp->Config('downlee')->catezjad ) > 8}<div id="catamedia" class="mediad catamedia">{$zbp->Config('downlee')->catezjad}</div>{/if}{/if}
		{if count((array)$articles)}<div class="catesell-item auto-main">
            {foreach $articles as $n=>$article}{php}$i = $n+1;{/php}
				{if $zbp->Config('downlee')->sycmsadoff=="1"}{if $i==4}{template:post-ads}{/if}{php}$i++;{/php}{/if}
				{template:post-search}
            {/foreach}
			</div>
			{if $pagebar}{if $zbp->Config('downlee')->footpage=="1"}<footer class="pagination onepage{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown{/if}">
				<ul>{template:pagebar}</ul>
			</footer>
			{elseif $zbp->Config('downlee')->footpage=="2"}<footer class="pagination autoload{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown{/if}">
				{foreach $pagebar.buttons as $k=>$v}{if $k=='›'}<div id="loadmore" class="load-more-wrap loadmore"><a class="load-more" href="{$v}" id="post_over">点击查看更多</a></div>{/if}{/foreach}
			</footer>
			{else}<footer class="pagination catpage{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown{/if}">
				<ul>{template:pagebar}</ul>
				{foreach $pagebar.buttons as $k=>$v}{if $k=='›'}<div id="loadmore" class="load-more-wrap loadmore"><a class="load-more" href="{$v}" id="post_over">点击查看更多</a></div>{/if}{/foreach}
			</footer>{/if}{/if}
		</div>
		{else}<div class="search-null">
			<i class="icon font-icon_shiyongwendang"></i>没有搜到相关内容，要不换个关键词试试？
		</div>{/if}
	</div>
	<aside class="sidebar fr{if $zbp->Config('downlee')->msideoff=='1'} mside{/if}">
		{template:sidebar4}
	</aside>
</main>
{template:footer}