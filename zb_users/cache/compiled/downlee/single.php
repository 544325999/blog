<?php  /* Template Name:文章页模板 * Template Type:single */  ?><?php  include $this->GetTemplate('header');  ?>
<div class="article-term">
	<div class="term-top">
		<div class="term-box">
			<div class="term-bar-bg" style="background-image: url(<?php  echo downlee_firstimg($article);  ?>);"></div>
		</div>
		<div class="container term-text">
			<h1 class="article-title"><a href="<?php  echo $article->Url;  ?>" title="正在阅读：<?php  echo $article->Title;  ?>"><?php  echo $article->Title;  ?></a></h1>
			<div class="article-meta">
				<span class="meta-time"><i class="icon font-time"></i><?php  echo downlee_TimeAgo($article->Time());  ?></span>
				<?php if (!$article->IsLock && !$option['ZC_COMMENT_TURNOFF']) { ?><span class="meta-comm"><a href="<?php  echo $article->Url;  ?>#comments"><i class="icon font-comment"></i><?php  echo $article->CommNums;  ?>评论</a></span><?php } ?>
				<span class="meta-view"><i class="icon font-eye"></i><?php  echo $article->ViewNums;  ?>阅读</span>
				<?php if ($user->Level == 1) { ?><?php if ($article->Type==ZC_POST_TYPE_ARTICLE) { ?><span class="meta-edit"><i class="icon font-edit"></i><a href="<?php  echo $host;  ?>zb_system/cmd.php?act=ArticleEdt&id=<?php  echo $article->ID;  ?>" class="sing-bj" title="编辑文章" target="_blank">编辑本文</a></span>
				<?php }else{  ?><span class="meta-edit"><i class="icon font-edit"></i><a href="<?php  echo $host;  ?>zb_system/cmd.php?act=PageEdt&id=<?php  echo $article->ID;  ?>" class="sing-bj" title="编辑页面" target="_blank">编辑本文</a></span><?php } ?><?php } ?>
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
		<?php if ($article->Type==ZC_POST_TYPE_ARTICLE) { ?>
		<?php  include $this->GetTemplate('post-single');  ?>
		<?php }else{  ?>
		<?php  include $this->GetTemplate('post-page');  ?>
		<?php } ?>
	</div>
	<aside class="sidebar fr<?php if ($zbp->Config('downlee')->msideoff=='1') { ?> mside<?php } ?>">
		<?php if (($article->Type==ZC_POST_TYPE_ARTICLE) && ($zbp->CheckPlugin('LayCenter'))) { ?><section class="widget sidebar-pay">
			<div class="sidebar-pay-info">
				<p class="sidebar-price">
					<span class="s-price">￥：</span><?php if ($zbp->CheckPlugin('LayCenter')) { ?><?php  $pay = $article->Pay;  ?><?php if ($pay->onsale) { ?><?php  echo $pay->price;  ?><span class="s-sup"><?php  echo $lcp->config->currency_alias;  ?></span>
					<?php }else{  ?><?php  echo $pay->oldPrice;  ?><span class="s-sup"><?php  echo $lcp->config->currency_alias;  ?></span><?php } ?>
					<?php }elseif(strlen ( $article->Metas->price ) > 0) {  ?><?php  echo $article->Metas->price;  ?><span class="s-sup">元</span>
					<?php }else{  ?>
					<span class="s-sup wujia">暂无标价</span>
					<?php } ?>
					<span class="s-badge"><i class="icon font-vip"></i>VIP免费</span>
				</p>
			</div>
			<ul class="sidebar-options">
				<li><i class="icon font-user"></i> 普通用户购买价格：<span class="pricing_opt wujia">原价购买无优惠</span></li>
				<li><i class="icon font-vip"></i> 终身VIP购买价格 : <span class="pricing_opt">永久免费下载</span></li>
			</ul>
			<?php if ($user->ID>0) { ?><div class="sidebar-links-vip sidebar-look"><a class="btn btn-buy" rel="nofollow" target="_self" onclick="click_scroll();" class="q_buy click_scroll"><i class="icon font-cart"></i>查看VIP链接</a></div>
			<?php }else{  ?><div class="sidebar-links-vip sidebar-look yk-look"><a href="<?php  echo $zbp->Config('downlee')->topregister;  ?>" class="btn btn-buy" rel="nofollow" class="q_buy click_scroll"><i class="icon font-cart"></i>登录查看VIP内容</a></div><?php } ?>
		</section><?php } ?>
		<?php if ((isset($article->Metas->bdresurl) || ($article->Metas->lzresurl) ||($article->Metas->qtresurl))) { ?><section class="widget sidebar-pay">
			<div class="sidebar-links">				
				<?php if (strlen ($zbp->Config('downlee')->gsxzid) > 3) { ?><div class="sidebar-links-gsxz">
                    <a href="<?php  echo $zbp->Config('downlee')->gsxzid;  ?>" class="btn btn-buy gsdownload" rel="nofollow" target="_self"><i class="icon font-bottom"></i>高速下载</a>
                </div><?php } ?>
                <ul class="sidebar-links-ul">
                    <?php if (strlen ($article->Metas->bdresurl) > 8) { ?><li class="sidebar-ul-li clearfix">
                        <?php if (strlen ($article->Metas->bdycode) > 2) { ?><button class="copy-button" type="button" onclick="sbdycopyContent();"><span><i class="icon font-bottom"></i>下载地址1：</span><input type="text" class="share-input"  value="<?php  echo $article->Metas->bdycode;  ?>" id="s-bdcopy-content"/></button><script>function sbdycopyContent(){var copyobject=document.getElementById("s-bdcopy-content");copyobject.select();document.execCommand("Copy");var result=confirm("\u63d0\u53d6\u7801\u590d\u5236\u5b8c\u6210\uff0c\u70b9\u51fb\u786e\u5b9a\u8df3\u8f6c\u94fe\u63a5");if(result){window.open("<?php  echo $article->Metas->bdresurl;  ?>")}else{return false}};</script><?php }else{  ?><span class="s-links"><a href="<?php  echo $article->Metas->bdresurl;  ?>" target="_blank"><i class="icon font-bottom"></i>下载地址1</a></span><?php } ?>
                    </li><?php } ?>
                    <?php if (strlen ($article->Metas->lzresurl) > 8) { ?><li class="sidebar-ul-li clearfix">
                        <?php if (strlen ($article->Metas->lzycode) > 2) { ?><button class="copy-button" type="button" onclick="slzcopyContent();"><span><i class="icon font-bottom"></i>下载地址2：</span><input type="text" class="share-input"  value="<?php  echo $article->Metas->lzycode;  ?>" id="s-lzcopy-content"/></button><script>function slzcopyContent(){var copyobject=document.getElementById("s-lzcopy-content");copyobject.select();document.execCommand("Copy");var result=confirm("\u63d0\u53d6\u7801\u590d\u5236\u5b8c\u6210\uff0c\u70b9\u51fb\u786e\u5b9a\u8df3\u8f6c\u94fe\u63a5");if(result){window.open("<?php  echo $article->Metas->lzresurl;  ?>")}else{return false}};</script><?php }else{  ?><span class="s-links"><a href="<?php  echo $article->Metas->lzresurl;  ?>" target="_blank"><i class="icon font-bottom"></i>下载地址2</a></span><?php } ?>
                    </li><?php } ?>
                    <?php if (strlen ($article->Metas->qtresurl) > 8) { ?><li class="sidebar-ul-li clearfix">
                        <?php if (strlen ($article->Metas->qtcode) > 2) { ?><button class="copy-button" type="button" onclick="sqtcopyContent();"><span><i class="icon font-bottom"></i>下载地址3：</span><input type="text" class="share-input"  value="<?php  echo $article->Metas->qtcode;  ?>" id="s-qtcopy-content"/></button><script>function sqtcopyContent(){var copyobject=document.getElementById("s-qtcopy-content");copyobject.select();document.execCommand("Copy");var result=confirm("\u63d0\u53d6\u7801\u590d\u5236\u5b8c\u6210\uff0c\u70b9\u51fb\u786e\u5b9a\u8df3\u8f6c\u94fe\u63a5");if(result){window.open("<?php  echo $article->Metas->qtresurl;  ?>")}else{return false}};</script>
						<?php }else{  ?><span><a href="<?php  echo $article->Metas->qtresurl;  ?>" target="_blank"><i class="icon font-bottom"></i>下载地址3</a></span><?php } ?>
                    </li><?php } ?>
                </ul>
			</div>
		</section><?php } ?>
		<?php  include $this->GetTemplate('sidebar3');  ?>
	</aside>
</main>
<?php if ($zbp->Config('downlee')->listree=='1') { ?><div class="listree-box">
	<h3 class="listree-titles"><a class="listree-btn" title="展开">目录[+]</a></h3>
	<ul id="listree-ol" style="display:none;"></ul>
</div>
<?php } ?><?php if ($zbp->Config('downlee')->wzzsoff=='1') { ?><div class="hidebody"></div>
<div class="showbody">
	<a class="showbody_c" href="javascript:void(0)" onclick="reward()" title="关闭"><img src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/images/close.png" alt="取消" /></a>
	<div class="reward_img">
		<img class="alipay_qrcode" src="<?php  echo $zbp->Config('downlee')->weipay;  ?>" alt="微信二维码" />
	</div>
	<div class="reward_bg">
		<div class="pay_box choice" data-id="<?php  echo $zbp->Config('downlee')->weipay;  ?>">
			<span class="pay_box_span"></span>
			<span class="qr_code"><img src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/images/wechat.svg" alt="微信二维码" /></span>
		</div>
		<div class="pay_box" data-id="<?php  echo $zbp->Config('downlee')->alipay;  ?>">
			<span class="pay_box_span"></span>
			<span class="qr_code"><img src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/images/alipay.svg" alt="支付宝二维码" /></span>
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
</script><?php } ?>
<?php if ($zbp->CheckPlugin('LayCenter')) { ?><script>
function click_scroll() {
	$("html, body").animate({
		scrollTop: $(".lcp-article-area,.lcp-article-goods").offset().top-70
	},
	800);
}
</script><?php } ?>
<?php if ($zbp->Config('downlee')->imgbox=='1') { ?><script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/fancybox.umd.js"></script>
<?php } ?><?php  include $this->GetTemplate('footer');  ?>