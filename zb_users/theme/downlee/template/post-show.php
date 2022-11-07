<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?><article class="article-main theme-box">
	<header class="article-header clearfix">
		<nav class="navcates place">
		当前位置：<i class="icon font-home"></i><a href="{$host}">首页</a>{if $type=='page'}<i class="icon font-angle-right"></i><a href="{$article.Url}" rel="bookmark" title="正在阅读 {$article.Title}">{$article.Title}</a>{else}{php}
		$html='';
		function navcate($id){
			global $html;
			$cate = new Category;
			$cate->LoadInfoByID($id);
			$html ='<i class="icon font-angle-right"></i><a href="' .$cate->Url.'" title="查看 ' .$cate->Name. ' 分类中的全部文章">' .$cate->Name. '</a> '.$html;
			if(($cate->ParentID)>0){navcate($cate->ParentID);}
		}
		navcate($article->Category->ID);
		global $html;
		echo $html;
		{/php}<i class="icon font-angle-right"></i><a href="{$article.Url}" rel="bookmark" title="正在阅读 {$article.Title}">正文</a>{/if}
		</nav>
		<div id="font-change" class="single-font fr">
			<span id="font-dec"><a href="#" title="减小字体"><i class="icon font-minus-square-o"></i></a></span>
			<span id="font-int"><a href="#" title="默认字体"><i class="icon font-font"></i></a></span>
			<span id="font-inc"><a href="#" title="增大字体"><i class="icon font-plus-square-o"></i></a></span>
			<a class="r-hide" href="javascript:switchcloseside()" target="_self"><i class="icon font-arrow-double-right"></i></a>
		</div>
	</header>
	{if downlee_is_mobile()}{if $zbp->Config('downlee')->singleadoff=="1" && strlen ( $zbp->Config('downlee')->singleadyd ) > 8}<div id="single-ad" class="ads single-ad">{$zbp->Config('downlee')->singleadyd}</div>{/if}
	{else}{if $zbp->Config('downlee')->singleadoff=="1" && strlen ( $zbp->Config('downlee')->singlead ) > 8}<div id="single-ad" class="ads single-ad">{$zbp->Config('downlee')->singlead}</div>{/if}{/if}
	<div class="article-content">
		<div class="single-entry">
			{if $zbp->Config('downlee')->timeoutoff=="1" && (ZC_VERSION_COMMIT >= 2800) && $article.Time('Update','Y')!='1970'}{php}$nowTime = time();
			$updateDay = ($nowTime - $article->UpdateTime) / 24 / 60 / 60;
			$updateDay = floor($updateDay);{/php}
			{if ($article.Time('Update','Y年m月d日')) > ($article.Time('Y年m月d日'))}<div class="article-update-tips">
				<p class="update-tips-ts"><i class="icon font-exclamationcircle"></i>温馨提示：</p>
				<p class="update-tips-text">文章最后更新时间<span class="red">{$article.Time('Update','Y年m月d日')}</span>，已超过<span class="red">{$updateDay}</span>天没有更新，若内容或图片失效，请留言反馈！</p>
			</div>{/if}{/if}
			{$article.Content}
		</div>
		<div class="article-tags">
			{if Count($article.Tags)>0}标签：{foreach $article.Tags as $tag}<a href="{$tag.Url}" rel="tag" title="查看标签为《{$tag.Name}》的所有文章">{$tag.Name}</a>{/foreach}{else}<a>博主很懒没有标签</a>{/if}
		</div>
		{if $zbp->Config('downlee')->tougaoff=='1'}{if strlen ( $article->Metas->originalauthor ) > 2 || strlen ( $article->Metas->originalurl) > 2}<div class="article-iash article-zztg">
			<p><b>特别声明：</b>以上文章内容仅代表作者本人观点，不代表<span>{$name}</span>观点或立场，如有侵权请联系删除。</p>
			<p>原文作者：<a rel="nofollow" href="{$article->Metas->originalurl}">{if strlen ( $article->Metas->originalauthor ) > 2}{$article->Metas->originalauthor}{else}文章投稿{/if}</a>，地址：<a rel="nofollow" href="{$article->Metas->originalurl}" title="{$article->Metas->originalurl}" target="_blank">《{$article.Title}》</a>发布于：{$article.Time('Y-m-d')}</p>
		</div>
		{else}<div class="article-iash">
			<p><b>未经允许不得转载！</b>
			作者:<a title="查看更多文章" href="{$article.Author.Url}">{$article.Author.StaticName}</a>，转载或复制请以<a href="{$article.Url}">超链接形式</a>并注明出处<a href="{$host}">{$name}</a>。</p>
			<p>原文地址：<a href="{$article.Url}" title="{$article.Url}">《{$article.Title}》</a>发布于：{$article.Time('Y-m-d')}</p>
		</div>{/if}{/if}
		<footer class="article-foot clearfix">
			{if $zbp->Config('downlee')->shareoff=='1'}<div class="xshare fl">
				<span class="xshare-title">分享到：</span><a class="x-weixin" href="javascript:;"><i class="icon font-weixin"></i><img alt="微信" src="{$host}zb_users/theme/downlee/plugin/api.php?url={$article.Url}"></a><a class="x-qq" href="javascript:Share('tqq')"><i class="icon font-qq"></i></a><a class="x-weibo" href="javascript:Share('sina')"><i class="icon font-weibo"></i></a>
			</div>{/if}
			<div class="xactions fr">
				{if ($zbp->CheckPlugin('san_praise_sdk')) =='1'}<a class="praise san-praise-sdk" sfa='click' data-postid='{$san_praise_sdk.postid}' data-value="1" data-ok='zijiqugemingzi' title="赞一个"><i class="icon font-heart"></i>赞(<span class="san-praise-sdk" sfa='num' data-value='1' data-postid='{$san_praise_sdk.postid}'>{$san_praise_sdk.value1}</span>)</a>{/if}
				{if $zbp->Config('downlee')->wzzsoff=='1'}<a href="javascript:;" class="zanter" onclick="reward()" title="打赏，支持一下"><i class="icon font-yen"></i>打赏</a>{/if}<a class="comiis_poster_a" href="javascript:;" title="生成海报封面"><i class="icon font-haibao"></i>海报</a>
			</div>
		</footer>
	</div>
</article>
<nav class="theme-box article-nav clearfix">
	<div class="entry-page-prev fl">
		{if $article.Prev}<a href="{$article.Prev.Url}" rel="prev">
			<i class="icon font-arrow-double-left"></i><span>上一篇</span>
			<p>{$article.Prev.Title}</p>
		</a>
		{else}
		<a href="/" rel="prev">
			<i class="icon font-arrow-double-left"></i><span>上一篇</span>
			<p>别找了，亲，已是天涯海角啦！</p>
		</a>{/if}
	</div>
	<div class="entry-page-next fr">
		{if $article.Next}<a href="{$article.Next.Url}" rel="next">
			<span>下一篇</span><i class="icon font-arrow-double-right"></i>
			<p>{$article.Next.Title}</p>
		</a>
		{else}
		<a href="/" rel="next">
			<span>下一篇</span><i class="icon font-arrow-double-right"></i>
			<p>别翻了，亲，我可是有底线的！</p>
		</a>{/if}
	</div>
</nav>


{if downlee_is_mobile()}{if $zbp->Config('downlee')->xgtjadoff=="1" && strlen ( $zbp->Config('downlee')->xgtjadyd ) > 8}<div id="related-ad" class="ads related-ad">{$zbp->Config('downlee')->xgtjadyd}</div>{/if}
{else}{if $zbp->Config('downlee')->xgtjadoff=="1" && strlen ( $zbp->Config('downlee')->xgtjad ) > 8}<div id="related-ad" class="ads related-ad">{$zbp->Config('downlee')->xgtjad}</div>{/if}{/if}
<div class="theme-box relates-thumb">
	<div class="relates-theme">相关推荐</div>
	<div class="relates-list clearfix">
	{if strlen ( $article.Tag ) > 0}{if $zbp->Config('downlee')->readapi=="3"}<!--同签同类-->
	{foreach GetList($zbp->Config('downlee')->readnum,$article.Category.ID,null,null,null,null,array('is_related'=>$article.ID)) as $related}
		<div class="push-box-inner">
			<a href="{$related.Url}" title="{$related.Title}" target="_blank">
				<figure class="gr-thumbnail"><img src="{downlee_firstimg($related)}" alt="{$related.Title}"></figure>
				<div class="push-b-title">
					<h3 class="push-b-h3">{$related.Title}</h2>
					<p class="push-b-footer"><span>{$related.ViewNums} 阅读{if !$article.IsLock && !$option['ZC_COMMENT_TURNOFF']} ，</span><span>{$related.CommNums} 评论{/if}</span></p>
				</div>
			</a>
		</div>
		{/foreach}{elseif $zbp->Config('downlee')->readapi=="1"}<!--相关标签-->
		{foreach GetList($zbp->Config('downlee')->readnum,null,null,null,null,null,array('is_related'=>$article.ID)) as $related}
		<div class="push-box-inner">
			<a href="{$related.Url}" title="{$related.Title}" target="_blank">
				<figure class="gr-thumbnail"><img src="{downlee_firstimg($related)}" alt="{$related.Title}"></figure>
				<div class="push-b-title">
					<h3 class="push-b-h3">{$related.Title}</h2>
					<p class="push-b-footer"><span>{$related.ViewNums} 阅读{if !$article.IsLock && !$option['ZC_COMMENT_TURNOFF']} ，</span><span>{$related.CommNums} 评论{/if}</span></p>
				</div>
			</a>
		</div>
		{/foreach}{elseif $zbp->Config('downlee')->readapi=="2"}<!--相关分类-->
		{foreach GetList($zbp->Config('downlee')->readnum,$article.Category.ID,null,null,null,null,array('has_subcate'=>true)) as $related}
		<div class="push-box-inner">
			<a href="{$related.Url}" title="{$related.Title}" target="_blank">
				<figure class="gr-thumbnail"><img src="{downlee_firstimg($related)}" alt="{$related.Title}"></figure>
				<div class="push-b-title">
					<h3 class="push-b-h3">{$related.Title}</h2>
					<p class="push-b-footer"><span>{$related.ViewNums} 阅读{if !$article.IsLock && !$option['ZC_COMMENT_TURNOFF']} ，</span><span>{$related.CommNums} 评论{/if}</span></p>
				</div>
			</a>
		</div>
		{/foreach}{/if}{else}{foreach GetList($zbp->Config('downlee')->readnum) as $newlist}
		<div class="push-box-inner">
			<a href="{$newlist.Url}" title="{$newlist.Title}" target="_blank">
				<figure class="gr-thumbnail"><img src="{downlee_firstimg($newlist)}" alt="{$newlist.Title}"></figure>
				<div class="push-b-title">
					<h3 class="push-b-h3">{$newlist.Title}</h2>
					<p class="push-b-footer"><span>{$newlist.ViewNums} 阅读{if !$article.IsLock && !$option['ZC_COMMENT_TURNOFF']} ，</span><span>{$newlist.CommNums} 评论{/if}</span></p>
				</div>
			</a>
		</div>{/foreach}{/if}
	</div>
</div>
{if downlee_is_mobile()}{if $zbp->Config('downlee')->commentadoff=="1" && strlen ( $zbp->Config('downlee')->commentadyd ) > 8}<div id="comment-ad" class="ads comment-ad">{$zbp->Config('downlee')->commentadyd}</div>{/if}
{else}{if $zbp->Config('downlee')->commentadoff=="1" && strlen ( $zbp->Config('downlee')->commentad ) > 8}<div id="comment-ad" class="ads comment-ad">{$zbp->Config('downlee')->commentad}</div>{/if}{/if}
{if !$article.IsLock}<section id="comments" class="theme-box">  
	{template:comments}
	<span class="icon icon_comment" title="comment"></span>
</section>{/if}