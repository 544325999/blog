{* Template Name:文章页模板 * Template Type:single *}<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{template:header}
<div class="article-term">
	<div class="term-top">
		<div class="term-box">
			<div class="term-bar-bg" style="background-image: url({downlee_firstimg($article)});"></div>
		</div>
		<div class="container term-text">
			<h1 class="article-title"><a href="{$article.Url}" title="正在阅读：{$article.Title}">{$article.Title}</a></h1>
			<div class="article-meta">
				<span class="meta-time"><i class="icon font-time"></i>{downlee_TimeAgo($article.Time())}</span>
				{if !$article.IsLock && !$option['ZC_COMMENT_TURNOFF']}<span class="meta-comm"><a href="{$article.Url}#comments"><i class="icon font-comment"></i>{$article.CommNums}评论</a></span>{/if}
				<span class="meta-view"><i class="icon font-eye"></i>{$article.ViewNums}阅读</span>
				{if $user.Level == 1}{if $article.Type==ZC_POST_TYPE_ARTICLE}<span class="meta-edit"><i class="icon font-edit"></i><a href="{$host}zb_system/cmd.php?act=ArticleEdt&id={$article.ID}" class="sing-bj" title="编辑文章" target="_blank">编辑本文</a></span>
				{else}<span class="meta-edit"><i class="icon font-edit"></i><a href="{$host}zb_system/cmd.php?act=PageEdt&id={$article.ID}" class="sing-bj" title="编辑页面" target="_blank">编辑本文</a></span>{/if}{/if}
			</div>
		</div>
	</div>
	<div class="moveing-warp">
		<div class="bolang1 move"></div>
		<div class="bolang2 move"></div>
		<div class="bolang3 move"></div>
	</div>
</div>
<main class="main-content auto-wrap container clearfix">
	<div class="content-wrap fl">
		{if $article.Type==ZC_POST_TYPE_ARTICLE}
		{template:post-single}
		{else}
		{template:post-page}
		{/if}
	</div>
	<aside class="sidebar fr{if $zbp->Config('downlee')->msideoff=='1'} mside{/if}">
		{if ($article.Type==ZC_POST_TYPE_ARTICLE) && ($zbp->CheckPlugin('LayCenter'))}<section class="widget sidebar-pay">
			<div class="sidebar-pay-info">
				<p class="sidebar-price">
					<span class="s-price">￥：</span>{if $zbp->CheckPlugin('LayCenter')}{$pay = $article->Pay}{if $pay->onsale}{$pay->price}<span class="s-sup">{$lcp.config.currency_alias}</span>
					{else}{$pay->oldPrice}<span class="s-sup">{$lcp.config.currency_alias}</span>{/if}
					{elseif strlen ( $article.Metas.price ) > 0}{$article->Metas->price}<span class="s-sup">元</span>
					{else}
					<span class="s-sup wujia">暂无标价</span>
					{/if}
					<span class="s-badge"><i class="icon font-vip"></i>VIP免费</span>
				</p>
			</div>
			<ul class="sidebar-options">
				<li><i class="icon font-user"></i> 普通用户购买价格：<span class="pricing_opt wujia">原价购买无优惠</span></li>
				<li><i class="icon font-vip"></i> 终身VIP购买价格 : <span class="pricing_opt">永久免费下载</span></li>
			</ul>
			{if $user.ID>0}<div class="sidebar-links-vip sidebar-look"><a class="btn btn-buy" rel="nofollow" target="_self" onclick="click_scroll();" class="q_buy click_scroll"><i class="icon font-cart"></i>查看VIP链接</a></div>
			{else}<div class="sidebar-links-vip sidebar-look yk-look"><a href="{$zbp->Config('downlee')->topregister}" class="btn btn-buy" rel="nofollow" class="q_buy click_scroll"><i class="icon font-cart"></i>登录查看VIP内容</a></div>{/if}
		</section>{/if}
		{if (isset($article.Metas.bdresurl) || ($article.Metas.lzresurl) ||($article.Metas.qtresurl))}<section class="widget sidebar-pay">
			<div class="sidebar-links">				
				{if strlen ($zbp->Config('downlee')->gsxzid) > 3}<div class="sidebar-links-gsxz">
                    <a href="{$zbp->Config('downlee')->gsxzid}" class="btn btn-buy gsdownload" rel="nofollow" target="_self"><i class="icon font-bottom"></i>高速下载</a>
                </div>{/if}
                <ul class="sidebar-links-ul">
                    {if strlen ($article->Metas->bdresurl) > 8}<li class="sidebar-ul-li clearfix">
                        {if strlen ($article->Metas->bdycode) > 2}<button class="copy-button" type="button" onclick="sbdycopyContent();"><span><i class="icon font-bottom"></i>下载地址1：</span><input type="text" class="share-input"  value="{$article->Metas->bdycode}" id="s-bdcopy-content"/></button><script>function sbdycopyContent(){var copyobject=document.getElementById("s-bdcopy-content");copyobject.select();document.execCommand("Copy");var result=confirm("\u63d0\u53d6\u7801\u590d\u5236\u5b8c\u6210\uff0c\u70b9\u51fb\u786e\u5b9a\u8df3\u8f6c\u94fe\u63a5");if(result){window.open("{$article->Metas->bdresurl}")}else{return false}};</script>{else}<span class="s-links"><a href="{$article->Metas->bdresurl}" target="_blank"><i class="icon font-bottom"></i>下载地址1</a></span>{/if}
                    </li>{/if}
                    {if strlen ($article->Metas->lzresurl) > 8}<li class="sidebar-ul-li clearfix">
                        {if strlen ($article->Metas->lzycode) > 2}<button class="copy-button" type="button" onclick="slzcopyContent();"><span><i class="icon font-bottom"></i>下载地址2：</span><input type="text" class="share-input"  value="{$article->Metas->lzycode}" id="s-lzcopy-content"/></button><script>function slzcopyContent(){var copyobject=document.getElementById("s-lzcopy-content");copyobject.select();document.execCommand("Copy");var result=confirm("\u63d0\u53d6\u7801\u590d\u5236\u5b8c\u6210\uff0c\u70b9\u51fb\u786e\u5b9a\u8df3\u8f6c\u94fe\u63a5");if(result){window.open("{$article->Metas->lzresurl}")}else{return false}};</script>{else}<span class="s-links"><a href="{$article->Metas->lzresurl}" target="_blank"><i class="icon font-bottom"></i>下载地址2</a></span>{/if}
                    </li>{/if}
                    {if strlen ($article->Metas->qtresurl) > 8}<li class="sidebar-ul-li clearfix">
                        {if strlen ($article->Metas->qtcode) > 2}<button class="copy-button" type="button" onclick="sqtcopyContent();"><span><i class="icon font-bottom"></i>下载地址3：</span><input type="text" class="share-input"  value="{$article->Metas->qtcode}" id="s-qtcopy-content"/></button><script>function sqtcopyContent(){var copyobject=document.getElementById("s-qtcopy-content");copyobject.select();document.execCommand("Copy");var result=confirm("\u63d0\u53d6\u7801\u590d\u5236\u5b8c\u6210\uff0c\u70b9\u51fb\u786e\u5b9a\u8df3\u8f6c\u94fe\u63a5");if(result){window.open("{$article->Metas->qtresurl}")}else{return false}};</script>
						{else}<span><a href="{$article->Metas->qtresurl}" target="_blank"><i class="icon font-bottom"></i>下载地址3</a></span>{/if}
                    </li>{/if}
                </ul>
			</div>
		</section>{/if}
		{template:sidebar3}
	</aside>
</main>
{if $zbp->Config('downlee')->listree=='1'}<div class="listree-box">
	<h3 class="listree-titles"><a class="listree-btn" title="展开">目录[+]</a></h3>
	<ul id="listree-ol" style="display:none;"></ul>
</div>
{/if}{if $zbp->Config('downlee')->wzzsoff=='1'}<div class="hidebody"></div>
<div class="showbody">
	<a class="showbody_c" href="javascript:void(0)" onclick="reward()" title="关闭"><img src="{$host}zb_users/theme/{$theme}/style/images/close.png" alt="取消" /></a>
	<div class="reward_img">
		<img class="alipay_qrcode" src="{$zbp->Config('downlee')->weipay}" alt="微信二维码" />
	</div>
	<div class="reward_bg">
		<div class="pay_box choice" data-id="{$zbp->Config('downlee')->weipay}">
			<span class="pay_box_span"></span>
			<span class="qr_code"><img src="{$host}zb_users/theme/{$theme}/style/images/wechat.svg" alt="微信二维码" /></span>
		</div>
		<div class="pay_box" data-id="{$zbp->Config('downlee')->alipay}">
			<span class="pay_box_span"></span>
			<span class="qr_code"><img src="{$host}zb_users/theme/{$theme}/style/images/alipay.svg" alt="支付宝二维码" /></span>
		</div>
	</div>
</div>
<script>
$(function(){
	$(".pay_box").click(function(){
		$(this).addClass('choice').siblings('.pay_box').removeClass('choice');
		var dataid=$(this).attr('data-id');
		$(".reward_img img").attr("src",dataid);
	});
	$(".hidebody").click(function(){
		reward();
	});
});
function reward(){
	$(".hidebody").fadeToggle();
	$(".showbody").fadeToggle();
}
</script>{/if}
{if $zbp->CheckPlugin('LayCenter')}<script>
function click_scroll() {
	$("html, body").animate({
		scrollTop: $(".lcp-article-area,.lcp-article-goods").offset().top-70
	},
	800);
}
</script>{/if}
{if $zbp->Config('downlee')->imgbox=='1'}<script src="{$host}zb_users/theme/{$theme}/script/fancybox.umd.js"></script>
{/if}{template:footer}