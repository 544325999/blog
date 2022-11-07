{* Template Name:首页模板 * Template Type:index-cms *}<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{template:header}
<div id="topsearch" class="topsearch" style="background:url({$zbp->Config('downlee')->sstitlebg}) center;">
	<div id="particles-js"><canvas class="particles-js-canvas-el" width="1349" height="675" style="width: 100%; height: 100%;"></canvas></div>
	<div class="wrapper search-top">
		<div class="search-inner">
			<h2>{$zbp->Config('downlee')->sstitle}</h2>
			<form method="post" name="search" action="{$host}zb_system/cmd.php?act=search" class="searchform">
				<input type="text" name="q" placeholder="{$zbp->Config('downlee')->sstext}" class="search-top-input">
				<button type="submit" class="search-top-btn" value="搜索"><i class="icon font-search"></i></button>
				<div class="fl right-but"><a rel="nofollow" href="{$zbp->Config('downlee')->ssfrurl}" target="_blank">{$zbp->Config('downlee')->ssfrtext}</a></div>
			</form>
			<div class="hot-search"><span>热门搜索：</span>
				{downlee_hot_Tags($zbp->Config('downlee')->sstagnum)}
			</div>
		</div>
	</div>
</div>
<main class="main-content">
	{if $zbp->Config('downlee')->suggesttoff=='1'}<div class="main-box home-firstitems">
		<div class="container">
			<ul>
				<li><a href="{$zbp->Config('downlee')->suggestu}"><i class="icon font-icon_yingyongguanli"></i><strong>{$zbp->Config('downlee')->suggestt}</strong><p>{$zbp->Config('downlee')->suggesti}</p><span class="btn btn-primary">立即查看</span></a></li>
				<li><a href="{$zbp->Config('downlee')->suggestu2}"><i class="icon font-jiaocheng"></i><strong>{$zbp->Config('downlee')->suggestt2}</strong><p>{$zbp->Config('downlee')->suggesti2}</p><span class="btn btn-primary">立即查看</span></a></li>
				<li><a href="{$zbp->Config('downlee')->suggestu3}" target="_blank"><i class="icon font-credits"></i><strong>{$zbp->Config('downlee')->suggestt3}</strong><p>{$zbp->Config('downlee')->suggesti3}</p><span class="btn btn-primary">立即查看</span></a></li>
				<li><a href="{$zbp->Config('downlee')->suggestu4}" target="_blank"><i class="icon font-ruanjiankaifabao"></i><strong>{$zbp->Config('downlee')->suggestt4}</strong><p>{$zbp->Config('downlee')->suggesti4}</p><span class="btn btn-primary">立即查看</span></a></li>
			</ul>
		</div>
	</div>{/if}
	{if $zbp->Config('downlee')->slideoff=='1' && $type=='index'&&$page=='1'}<div class="main-box top-slider">
		<div class="top-slider container clearfix">
			{if downlee_is_mobile()}{if $zbp->Config('downlee')->homeadoff=='1' && strlen ( $zbp->Config('downlee')->homeadyd ) > 8}<div id="homedia" class="mediad homedia}">{$zbp->Config('downlee')->homeadyd}</div>{/if}
			{else}{if $zbp->Config('downlee')->homeadoff=='1' && strlen ( $zbp->Config('downlee')->homead ) > 8}<div id="homedia" class="mediad homedia">{$zbp->Config('downlee')->homead}</div>{/if}{/if}
			<div class="wrapper-ban">
				<div class="swiper-container swiper-main">
					<div class="swiper-wrapper">
					{module:slide}
					</div><!-- Add Pagination -->
					<div class="swiper-pagination"></div><div class="swiper-button-next"></div><div class="swiper-button-prev"></div>
				</div>
			</div>
			<div class="wrapper-push">
				<div class="push-box">{php}$arrays = explode(',',$zbp->Config('downlee')->toptextid);{/php}{foreach $arrays as $ikeys=>$topcms}{$article=GetPost((int)$topcms)}
					<div class="push-box-inner">
						<a href="{$article.Url}" title="{$article.Title}"{if $zbp->Config('downlee')->blankoff=='1'} target="_blank"{/if}>
							<figure class="gr-thumbnail"><img src="{downlee_firstimg($article)}" alt="{$article.Title}"></figure>
							<div class="push-b-title">
								<h3 class="push-b-h3">{$article.Title}</h2>
								<p class="push-b-footer"><span>{$article.ViewNums} 阅读 ，</span><time>{$article.Time('m-d')}</time></p>
							</div>
						</a>
					</div>{/foreach}
				</div>
			</div>
		</div>
	</div>
	{/if}{if $zbp->Config('downlee')->latesoff=='1'}<div class="index-main auto-side container clearfix">
		<section class="section-info">
			<h2 class="postmode-title">{$zbp->Config('downlee')->latestitle}</h2>
			<p class="postmode-description">{$zbp->Config('downlee')->latestext}</p>
		</section>
		<div class="newest-main auto-main">
			{foreach $articles as $n=>$article}{php}$i = $n+1;{/php}
			{if $article.IsTop}
			{template:post-istop}
			{else}
			{if $zbp->Config('downlee')->sycmsadoff=='1'}{if $i==4}{template:post-ads}{/if}{php}$i++;{/php}{/if}
			{template:post-multi}
			{/if}
			{/foreach}
		</div>
		{if $pagebar}<footer class="pagination{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown{/if}">
			{foreach $pagebar.buttons as $k=>$v}{if $k=='›'}<div id="loadmore" class="load-more-wrap loadmore"><a class="load-more" href="{$v}" id="post_over">点击查看更多</a></div>{/if}{/foreach}
		</footer>{/if}
	</div>
	{/if}{if downlee_is_mobile()}{if $zbp->Config('downlee')->syimgadoff=='1' && strlen ( $zbp->Config('downlee')->syimgadm ) > 8}<div id="icmstwo" class="mediad icmstwo}">{$zbp->Config('downlee')->syimgadm}</div>{/if}
	{else}{if $zbp->Config('downlee')->syimgadoff=='1' && strlen ( $zbp->Config('downlee')->syimgad ) > 8}<div id="icmstwo" class="mediad icmstwo">{$zbp->Config('downlee')->syimgad}</div>{/if}{/if}
	{if $zbp->Config('downlee')->sytextidoff=='1'}{php}$flids = explode(',',$zbp->Config('downlee')->syshowid);{/php}{foreach $flids as $flid}<div class="home-list-main">
		<div class="container clearfix">
			{if isset($categorys[$flid])}<section class="section-info">
				<h2 class="postmode-title">{$categorys[$flid].Name}</h2>
				<p class="postmode-description">{if $categorys[$flid].Intro>'0'}{$categorys[$flid].Intro}{else}{$zbp->Config('downlee')->Description}{/if}</p>
			</section>{/if}			
			<div class="cat-site clearfix">
				{foreach GetList($zbp->Config('downlee')->syshownum,$flid,null,null,null,null,array('has_subcate'=>true)) as $key=>$article}{$i=$key}
					{template:post-multis}
				{/foreach}
			</div>
			{if isset($categorys[$flid])}<div class="item-pagination"><a href="{$categorys[$flid].Url}" target="_blank" class="btn-pagination">查看更多</a></div>{/if}
		</div>
	</div>{/foreach}{/if}
	{if $zbp->Config('downlee')->vipmoduleoff=='1'}<div class="home-custom{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown" data-wow-delay="0.25s{/if}" style="background-image: url(/zb_users/theme/downlee/style/images/custom_bg.jpg);">
		<div class="container clearfix">
			<div class="custom_desc"><span>{$zbp->Config('downlee')->vipmodule}</span></div>
			<div class="custom_btn">
				<a href="{$zbp->Config('downlee')->vipurl1}" class="custom_button_l" title=""><span>{$zbp->Config('downlee')->viptext1}</span></a>
				<a href="{$zbp->Config('downlee')->vipurl2}" class="custom_button_r" title=""><span>{$zbp->Config('downlee')->viptext2}</span></a>
			</div>
		</div>
	</div>
	{/if}{if downlee_is_mobile()}{if $zbp->Config('downlee')->sybigadoff=='1' && strlen ( $zbp->Config('downlee')->sybigadm ) > 8}<div id="icmsone" class="mediad icmsone}">{$zbp->Config('downlee')->sybigadm}</div>{/if}
	{else}{if $zbp->Config('downlee')->sybigadoff=='1' && strlen ( $zbp->Config('downlee')->sybigad ) > 8}<div id="icmsone" class="mediad icmsone">{$zbp->Config('downlee')->sybigad}</div>{/if}{/if}
	{if $zbp->Config('downlee')->sygoodsoff=='1'}<div class="home-primary">{php}$flids = explode(',',"{$zbp->Config('downlee')->sygoods}");{/php}{foreach $flids as $flid}{if isset($categorys[$flid])}
		<section class="section-info">
			<h2 class="postmode-title">{$categorys[$flid].Name}</h2>
			<p class="postmode-description">{if $categorys[$flid].Intro>'0'}{$categorys[$flid].Intro}{else}{$zbp->Config('downlee')->Description}{/if}</p>
		</section>{/if}
		<div class="syimgid-main container clearfix">
			{foreach GetList($zbp->Config('downlee')->sygoodsnum,$flid,null,null,null,null,array('has_subcate'=>true)) as $key=>$article}
				<div class="syimgid-box{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown" data-wow-delay="0.25s{/if}">
					<div class="syimgid-item-l">
						<a href="{$article.Url}" title="{$article.Title}"><img src="{downlee_firstimg($article)}" alt="{$article.Title}"></a>
					</div>
					<div class="syimgid-item-r">
						<h3><a href="{$article.Url}" title="{$article.Title}">{$article.Title}</a></h3>
						{if $zbp->CheckPlugin('LayCenter')}{$pay = $article->Pay}{if $pay->onsale}<p class="syimgid-item-price">促销特价：￥<span>{$pay->price}</span>{$lcp.config.currency_alias}</p>
						{else}<p class="syimgid-item-price">商品售价：￥<span>{$pay->price}</span>{$lcp.config.currency_alias}</p>{/if}
						{elseif strlen ( $article.Metas.price ) > 0}<p class="syimgid-item-price">售价：￥<span>{$article->Metas->price}</span>积分</p>
						{else}<p class="syimgid-item-price wujia">暂无标价</p>{/if}
						<div class="syimgid-item-other">
							{php}if ($zbp->Config('downlee')->introSource =='1') {$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),50)).'...');}else{$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),50)).'...');}{/php}{$intro}
						</div>
						<div class="syimgid-item-b">
							<a href="{if strlen ( $article.Metas.showhow ) > 8}{$host}zb_system/cmd.php?act=ajax&hk_url={base64_encode($article->Metas->showhow)}{/if}" title="查看演示" rel="nofollow" class="syimgid-item-demo" target="_blank">{if strlen ( $article.Metas.showhow ) > 8}查看演示{else}查看详情{/if}</a>
							<a href="{$article.Url}" class="syimgid-item-btn" title="{$article.Url}"><i class="iconfont icon-wenhao mr5"></i>下载资源</a>
						</div>
					</div>
				</div>{/foreach}
			</div>{if isset($categorys[$flid])}<div class="item-pagination"><a href="{$categorys[$flid].Url}" target="_blank" class="btn-pagination">查看更多</a></div>{/if}
		</div>{/foreach}		
	</div>{/if}
	{if $zbp->Config('downlee')->syspecialon=='1'}<div class="home-text-list">
		<div class="container clearfix">{php}$flids = explode(',',$zbp->Config('downlee')->syspecial);{/php}{foreach $flids as $flid}
			<div class="home-text-box{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown" data-wow-delay="0.25s{/if}">
				{foreach GetList($zbp->Config('downlee')->syspecialnum,$flid,null,null,null,null,array('has_subcate'=>true)) as $key=>$article}{$ids=$key}{if $ids==0}
				<div class="home-text-item">
					<div class="home-item-category">{$categorys[$flid].Name}</div>
					<h2 class="text-item-title"><a href="{$article.Url}" title="{$article.Title}" target="_blank">{$article.Title}</a></h2>
					<p class="text-item-info">{php}if ($zbp->Config('downlee')->introSource =='1') {$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),108)).'...');}else{$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),108)).'...');}{/php}{$intro}</p>
					<ul class="text-item-ul">{else}
						<li><span class="list-date">{$article.Time('y/m/d')}</span><a href="{$article.Url}" title="{$article.Title}" target="_blank">{$article.Title}</a></li>{/if}{/foreach}
					</ul>
				</div>
			</div>{/foreach}
		</div>
	</div>{/if}
	{if downlee_is_mobile()}{if $zbp->Config('downlee')->sytextadoff=='1' && strlen ( $zbp->Config('downlee')->sytextadm ) > 8}<div id="icmsthree" class="mediad icmsthree}">{$zbp->Config('downlee')->sytextadm}</div>{/if}
	{else}{if $zbp->Config('downlee')->sytextadoff=='1' && strlen ( $zbp->Config('downlee')->sytextad ) > 8}<div id="icmsthree" class="mediad icmsthree">{$zbp->Config('downlee')->sytextad}</div>{/if}{/if}
	{if $zbp->Config('downlee')->linkoff=='1'}
	<div class="home-links container clearfix{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown{/if}"><!--友情链接-->
		<div class="link-box">
		<section class="links-title">
			<h3>{$modules['link'].Name}</h3>
			<span class="linksub">{$zbp->Config('downlee')->linksub}</span>
			<span class="suburl"><a href="{$zbp->Config('downlee')->linkurl}" target="_blank">更多<i class="icon font-add-circle"></i></a></span>
		</section>
		<ul id="links-home">
			{module:link}
		</ul>
		</div>
	</div>{/if}
</main>
{if $zbp->Config('downlee')->smoduleoff=='1'}<div class="rno-cert">
	<div class="rno-panel">
		<div class="rno-panel-bg" style="background-image: url(//main.qcloudimg.com/raw/119a10c00081b7a999e2b264c289930a/bg2.jpg);"></div>
		<div class="rno-panel-inner">
			<h3 class="rno-panel-title">{$zbp->Config('downlee')->svipmodule}</h3>
			<p class="rno-panel-desc">{$zbp->Config('downlee')->svipsub}</p>
			<a href="{$zbp->Config('downlee')->svipurl}" class="rno-btn"><span class="rno-btn-text">{$zbp->Config('downlee')->sviptext}</span></a>
		</div>
	</div>
</div>
{/if}{template:footer}