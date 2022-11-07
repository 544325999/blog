<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{template:header}
<div class="category-term">
	<div class="term-top">
		<div class="term-box">
			<div class="term-bar-bg" style="background-image: url({$zbp->Config('downlee')->categorybg});"></div>
		</div>
		<div class="container term-text">
			<h2>{if $type=='tag'}{$tag.Name}{elseif $type=='author'}{$author.StaticName}{else}{$title}{/if}</h2>
			<h4 class="term-btns"><i class="mdi mdi-diamond-stone"></i>{if $type=='tag' && $tag.Intro>'0'}{$tag.Intro}{elseif $type=='author' && $author.Intro>'0'}{$author.Intro}{else}{$zbp->Config('downlee')->Description}{/if}</h4>
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
		当前位置：<i class="icon font-home"></i><a href="{$host}">首页</a>{if $type=='category'}{php}
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
		echo $html;{/php}{elseif $type=='tag'}<i class="icon font-angle-right"></i>关于 <a href="{$tag.Url}">{$tag.Name}</a> 的文章{elseif $type=='author'}<i class="icon font-angle-right"></i>作者 <a href="{$author.Url}">{$author.StaticName}</a> 发布的文章{else}<i class="icon font-angle-right"></i>{$title}{/if}
	</nav>
	<div class="filter-sift">
		<ul class="filter-tag">
			<span class="filter-l"><i class="icon font-youhui"></i>标签</span>
			<li class="clearfix">
				{foreach $zbp->GetTagList('*',null,array('tag_Count' => 'DESC'),'12') as $k => $tags}
				<a id="tags-{$tags->ID}" href="{$tags->Url}" class="{if $tag->Name == $tags->Name}current{/if}">{$tags->Name}</a>
				{/foreach}
			</li>
		</ul>
	</div>
</div>
<main class="main-content container clearfix">
	<div class="category-main auto-side{if $zbp->Config('downlee')->sideberon=="1"} sidebaron fl{/if}">
		{if downlee_is_mobile()}{if $zbp->Config('downlee')->catezjadoff=="1" && strlen ( $zbp->Config('downlee')->catezjadyd ) > 8}<div id="catamedia" class="mediad catamedia}">{$zbp->Config('downlee')->catezjadyd}</div>{/if}
		{else}{if $zbp->Config('downlee')->catezjadoff=="1" && strlen ( $zbp->Config('downlee')->catezjad ) > 8}<div id="catamedia" class="mediad catamedia">{$zbp->Config('downlee')->catezjad}</div>{/if}{/if}
		<div class="category-item auto-main">
			{foreach $articles as $n=>$article}{php}$i = $n+1;{/php}{if $article.IsTop}
				{template:post-istop}
            {else}
				{if $zbp->Config('downlee')->sycmsadoff=="1"}{if $i==4}{template:post-ads}{/if}{php}$i++;{/php}{/if}
				{template:post-multi}
            {/if}{/foreach}
		</div>
		{if $pagebar}<footer class="pagination{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown{/if}">
			{foreach $pagebar.buttons as $k=>$v}{if $k=='›'}<div id="loadmore" class="load-more-wrap loadmore"><a class="load-more" href="{$v}" id="post_over">点击查看更多</a></div>{/if}{/foreach}
		</footer>{/if}
	</div>
	{if $zbp->Config('downlee')->sideberon=="1"}<aside class="sidebar fr{if $zbp->Config('downlee')->msideoff=='1'} mside{/if}">
		{if $zbp->Config('downlee')->authoroff=='1'}<section class="widget abautor">
			<div class="widget-list">
				<div class="widget_avatar" style="background-image: url({$zbp->Config('downlee')->authorimg});"><a href="{$article.Author.Url}"><img class="widget-about-image" src="{$article.Author.Avatar}" alt="{$article.Author.StaticName}" height="70" width="70"><div class="widget-cover{if $zbp->CheckPlugin('LayCenter') && ($article.Author.VipType >= 3)} layvip{$article.Author.VipType} vip{$article.Author.Level}{else} vip{$article.Author.Level}{/if}"></div><i title="{$article.Author.LevelName}" class="author-ident author{$article.Author.Level}"></i></a></div>
				<div class="widget-about-intro">
					<div class="name"><h3>{$article.Author.StaticName}</h3>
					{if $zbp->CheckPlugin('LayCenter') && ($article.Author.VipType >= 3)}<span class="autlv lay-{$article.Author.VipType} aut-{$article.Author.Level} vs">V</span><span class="autlv lay-{$article.Author.VipType} aut-{$article.Author.Level}">{$article.Author.VipName}</span>{else}<span class="autlv aut-{$article.Author.Level}  vs">V</span>
					<span class="autlv aut-{$article.Author.Level}">{$article.Author.LevelName}</span>{/if}</div>
					<div class="widget-about-desc">文章 {$article.Author.Articles} 篇 <i>|</i> 评论 {$article.Author.Comments} 次</div>{$list = GetList(3,null,$article.Author.ID)}
					{if $list}<div class="widget-article-newest"><span>最新文章</span></div>
					<ul class="widget-about-posts">
						{foreach $list as $post}
						<li><span class="posts-date">{$post.Time('m/d')}</span><a class="widget-posts-title" href="{$post.Url}" title="{$post.Title}">{$post.Title}</a></li>{/foreach}
					</ul>{/if}
				</div>
			</div>
        </section>{/if}
		{template:sidebar3}
	</aside>{/if}
</main>
{template:footer}