{* Template Name:分类商品模板 * Template Type:catasell *}<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{template:header}
<div class="category-term">
	<div class="term-top">
		<div class="term-box">
			<div class="term-bar-bg" style="background-image: url({if $type=='category' && strlen ($category->Metas->catalog_bgimg) > 8}{$category->Metas->catalog_bgimg}{else}{$zbp->Config('downlee')->categorybg}{/if});"></div>
		</div>
		<div class="container term-text">
			<h2>{if $type=='category'}{if strlen ( $category->Metas->Categorytitle ) > 2}{$category->Metas->Categorytitle}{else}{$category.Name}{/if}{elseif $type=='tag'}{if strlen ( $category->Metas->Tagstitle ) > 2}{$category->Metas->Tagstitle}{else}{$tag.Name}{/if}{elseif $type=='author'}{$author.StaticName}{else}{$title}{/if}</h2>
			<h4 class="term-btns"><i class="mdi mdi-diamond-stone"></i>{if $type=='category' && $category.Intro>'0'}{$category.Intro}{elseif  $type=='tag' && $tag.Intro>'0'}{$tag.Intro}{elseif $type=='author' && $author.Intro>'0'}{$author.Intro}{else}{$zbp->Config('downlee')->Description}{/if}</h4>
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
		echo $html;{/php}{elseif $type=='tag'}<i class="icon font-angle-right"></i>关于 <a href="{$tag.Url}">{$tag.Name}</a> 的文章{elseif $type=='author'}<i class="icon font-angle-right"></i>作者 <a href="{$author.Url}">{$author.Name}</a> 发布的文章{else}<i class="icon font-angle-right"></i>{$title}{/if}
	</nav>
	{if $type=='category'}<div class="filter-sift">
		<ul class="filter-tag">
			<span class="filter-l"><i class="icon font-fenlan"></i>分类</span>
			<li class="clearfix">
				{$cates = downlee_GetRootCategory()}{foreach $cates as $cate}
				<a id="cate-{$cate->ID}" href="{$cate->Url}" class="{if $cate->Url == $category->Url || $category->Level && $category->RootID == $cate->ID}current{/if}">{$cate->Name}</a>
				{/foreach}
			</li>
		</ul>
		{if $category->Level == 0}
			{$subcate = $zbp->GetCategoryList('*',array(array('=','cate_ParentID',$category->ID)),array('cate_Order'=>'ASC'))}
		{elseif $category->Level == 1}
			{$subcate = $zbp->GetCategoryList('*',array(array('=','cate_ParentID',$category->ParentID)),array('cate_Order'=>'ASC'))}
		{elseif $category->Level == 2}
			{$subcate = $zbp->GetCategoryList('*',array(array('=','cate_ParentID',$category->Parent->ParentID)),array('cate_Order'=>'ASC'))}
		{/if}
		{if isset($subcate) && $subcate}
		<ul class="filter-tag">
			<span class="filter-l"><i class="icon font-layers"></i>子类</span>
			<li class="clearfix">
				{foreach $subcate as $cate}
				<a id="cate-{$cate->ID}" href="{$cate->Url}" class="{if $cate->Url == $category->Url || $category->Level == 2 && $category->Parent->Url == $cate->Url}current{/if}">{$cate->Name}</a>
				{/foreach}
			</li>
		</ul>{/if}
		{if strlen ( $zbp->Config('downlee')->fltagnum ) > 0}<ul class="filter-tag">
			<span class="filter-l"><i class="icon font-youhui"></i>标签</span>
			<li class="clearfix">
				{foreach $zbp->GetTagList('*',null,array('tag_Count' => 'DESC'),''.$zbp->Config('downlee')->fltagnum.'') as $k => $tags}
				<a id="tags-{$tags->ID}" href="{$tags->Url}" class="">{$tags->Name}</a>
				{/foreach}
			</li>
		</ul>{/if}
		<form id="kf-order" class="filter-tag">
			<span class="filter-l"><i class="icon font-paixu"></i>排序</span>
			<li class="filter order">
				<a href="" rel="nofollow" class="{if GetVars('order','GET') == 'newest' || !GetVars('order','GET')}current{/if}" data-type="newest">最新<i class="icon font-chevron-{if GetVars('sort','GET')}up{else}down{/if}"></i></a>
				<a href="" rel="nofollow" class="{if GetVars('order','GET') == 'view'}current{/if}" data-type="view">浏览<i class="icon font-chevron-{if GetVars('sort','GET')}up{else}down{/if}"></i></a>
				{if !$option['ZC_COMMENT_TURNOFF']}<a href="" rel="nofollow" class="{if GetVars('order','GET') == 'comment'}current{/if}" data-type="comment">评论<i class="icon font-chevron-{if GetVars('sort','GET')}up{else}down{/if}"></i></a>{/if}
			</li>
			{if $zbp->Config('system')->ZC_STATIC_MODE != 'REWRITE'}<input type="hidden" name="cate" value="{$category->ID}">{/if}
			<input type="hidden" name="order" value="{GetVars('order','GET')}">
			<input type="hidden" name="sort" value="{php}echo (int)GetVars('sort','GET'){/php}">
		</form>
	</div>{/if}
	<div class="category-main auto-side">
		{if downlee_is_mobile()}{if $zbp->Config('downlee')->selladoff=="1" && strlen ( $zbp->Config('downlee')->selltopadyd ) > 8}<div id="catamedia" class="mediad catamedia">{$zbp->Config('downlee')->selltopadyd}</div>{/if}
		{else}{if $zbp->Config('downlee')->selladoff=="1" && strlen ( $zbp->Config('downlee')->selltopad ) > 8}<div id="catamedia" class="mediad catamedia">{$zbp->Config('downlee')->selltopad}</div>{/if}{/if}
		<div class="catesell-item auto-main">
			{foreach $articles as $n=>$article}{php}$i = $n+1;{/php}
			{if $article.IsTop}
				{template:post-selltop}
            {else}
				{if $zbp->Config('downlee')->sycmsadoff=="1"}{if $i==4}{template:post-sellads}{/if}{php}$i++;{/php}{/if}				
				{template:post-sellist}
            {/if}{/foreach}
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
</main>
{template:footer}