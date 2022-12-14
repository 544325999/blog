{* Template Name:文章商品模板 * Template Type:sale *}<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{template:header}
<div class="article-sale-top container clearfix">
	<section class="article-sale">
		<div class="sale-thumb">
			<div class="sale-iop" alt="{$article.Title}" style="background-image: url({downlee_firstimg($article)});"></div>
			<div class="sale-tagcc">
				<span class="tagcc-time"><i class="icon font-time"></i>{downlee_TimeAgo($article.Time())}</span>
				<span class="tagcc-view"><i class="icon font-eye"></i>{$article.ViewNums}阅读</span>
				{if $user.Level == 1}{if $zbp->CheckPlugin('LayCenter')}<span class="meta-edit"><i class="icon font-edit"></i><a href="{$lcp->BuildUrl('User')}/#/User/EditArticle/id={$article.ID}" class="sing-bj" title="LayCenter编辑本文" target="_blank">编辑</a></span>{else}<span class="meta-edit"><i class="icon font-edit"></i><a href="{$host}zb_system/cmd.php?act=ArticleEdt&id={$article.ID}" class="sing-bj" title="编辑本文" target="_blank">编辑</a></span>{/if}{/if}
			</div>
		</div>
		<div class="sale-meta">
			<div class="sale-works-top"><h1>{$article.Title}</h1></div>
			{if $zbp->CheckPlugin('LayCenter')}{$pay = $article->Pay}{if $pay->onsale}<div class="sale-des{if $pay->onsale} sale-cuxiao{/if}">
				<span class="sale-text">促销价(￥)：</span>
				<span class="theme-tag">{$pay->price} {$lcp.config.currency_alias}</span>
				<span class="theme-cuxiao">原价：{$pay->oldprice} {$lcp.config.currency_alias}</span>
			</div>
			{else}<div class="sale-des{if $pay->onsale} sale-cuxiao{/if}">
				<span class="sale-text">商品售价(￥)：</span>
				<span class="theme-tag">{$pay->price} {$lcp.config.currency_alias}</span>
			</div>{/if}
			{elseif strlen ( $article.Metas.price ) > 0}<div class="sale-des">
				<span class="sale-text">商品售价(￥)：</span>
				<span class="theme-tag">{$article->Metas->price}</span>
			</div>
			{else}<div class="sale-des"><span class="sale-text wujia">暂无标价</span></div>{/if}
			<div class="downinfo pay-box">
				{if $zbp->Config('downlee')->buylinkoff=='1'}<a rel="nofollow" target="_blank" href="{$zbp->Config('downlee')->buylink}" class="btn btn-buy lcpdownload downloadbutton" data-id="{$article.ID}" ><i class="icon font-cart"></i> 前往购买</a>
				{elseif $zbp->CheckPlugin('LayCenter')}{$pay = $article->Pay}{if $pay->hasPermission()}<a class="btn btn-buy" rel="nofollow" target="_self" onclick="click_scroll();" class="q_buy click_scroll"><i class="icon font-cart"></i> 查看详情</a>
				{else}<a class="btn btn-buy lcpdownload downloadbutton{if $pay->hasPermission()} purchased{/if}" rel="nofollow" target="_blank" onclick="click_scroll();" data-id="{$article.ID}" ><i class="icon font-cart"></i> 立即购买</a>{/if}
				{elseif $zbp->CheckPlugin('YtUser')}{php}$showtype=(int)$article->Category->Metas->showtype;{/php}{if $article.Buypay == '1' || $showtype == 2}<a href="{$host}?download={$article.ID}" class="btn btn-buy yt-bug" rel="nofollow" target="_blank"><i class="icon font-cart"></i> 查看详情</a>
				{else}{if $showtype == 3}<form class="js-ajax-form" action="{$host}zb_users/plugin/YtUser/YtSbuy.php" method="post" novalidate="novalidate"><input type="hidden" name="LogID" id="LogID" value="{$article.ID}"><button class="js-ajax-submit btn btn-buy yt-bug"><i class="icon font-cart"></i> 积分购买</button></form>
				{elseif $showtype == 4}<a class="btn btn-buy yt-bug" rel="nofollow" target="_blank" onclick="return YtSbuy()" data-id="{$article.ID}" ><i class="icon font-cart"></i> 立即购买</a>{/if}{/if}
				{else}<a class="btn btn-zxqq" rel="nofollow" target="_blank" href="{$zbp->Config('downlee')->buylink}"><i class="icon font-cart"></i> 去购买</a>
				{/if}{if strlen ( $article.Metas.showhow ) > 8}<a rel="nofollow" target="_blank" class="btn btn-demo" href="{$host}zb_system/cmd.php?act=ajax&hk_url={base64_encode($article->Metas->showhow)}"><i class="icon font-fabu"></i> 演示地址</a>
				{else}<a href="" rel="nofollow" class="btn btn-demo grey"><i class="icon font-fabu"></i> 暂无演示</a>{/if}
				<a class="btn btn-qq" target="_blank" href="{if downlee_is_mobile()}//wpa.qq.com/msgrd?v=3&uin={$zbp->Config('downlee')->qicq}&site=qq&menu=yes{else}tencent://message/?uin={$zbp->Config('downlee')->qicq}&Site=qq&Menu=yes{/if}"><i class="icon font-qq"></i> QQ咨询</a>
			</div>
			<ul class="serv">
				<li><i class="icon font-credits"></i>免费售后咨询</li>
				<li><i class="icon font-ruanjiankaifabao"></i>协助安装指导</li>
				<li><i class="icon font-setting"></i>付费安装主题</li>
				<li><i class="icon font-jiaocheng"></i>付费BUG修复</li>
			</ul>
			<span class="shengming"><p><i class="dashicons dashicons-info"></i>特别声明：原创产品提供以上服务，破解产品仅供参考学习，不提供售后服务（均已杀毒检测），如有需求，建议购买正版！如果源码侵犯了您的利益请留言告知！</p></span>
		</div>
	</section>
</div>
<main class="main-content main-sale container clearfix">
	<div class="content-wrap fl">
		{template:post-show}
	</div>
	<aside class="sidebar fr{if $zbp->Config('downlee')->msideoff=='1'} mside{/if}">
		<section class="widget sidebar-pay">
			<div class="sidebar-pay-info">
				<p class="sidebar-price">
					<span class="s-price">￥：</span>
					{if $zbp->CheckPlugin('LayCenter')}{$pay = $article->Pay}{$pay->price}<span class="s-sup">{$lcp.config.currency_alias}</span>
					{elseif strlen ( $article.Metas.price ) > 0}{$article->Metas->price}<span class="s-sup">元</span>
					{else}<span class="s-sup wujia">暂无标价</span>{/if}
					<span class="s-badge"><i class="icon font-vip"></i>VIP免费</span>
				</p>
			</div>
			<ul class="sidebar-options">
				<li><i class="icon font-user"></i> 普通用户购买价格：<span class="pricing_opt wujia">原价购买无优惠</span></li>
				<li><i class="icon font-vip"></i> 终身VIP购买价格 : <span class="pricing_opt">永久免费下载</span></li>
			</ul>
			{if $zbp->Config('downlee')->buylinkoff=='1'}<div class="sidebar-links-vip sidebar-look"><a class="btn btn-buy" rel="nofollow" target="_self" onclick="click_scroll();" class="q_buy click_scroll"><i class="icon font-cart"></i>前往购买</a></div>
			{elseif $user.ID>0}<div class="sidebar-links-vip sidebar-look"><a class="btn btn-buy" rel="nofollow" target="_self" onclick="click_scroll();" class="q_buy click_scroll"><i class="icon font-cart"></i>查看VIP链接</a></div>
			{else}<div class="sidebar-links-vip sidebar-look yk-look"><a href="{$zbp->Config('downlee')->topregister}" class="btn btn-buy" rel="nofollow" class="q_buy click_scroll"><i class="icon font-cart"></i>登录查看VIP内容</a></div>{/if}
		</section>
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
		scrollTop: $(".lcp-article-area,.lcp-article-goods").offset().top-15
	},
	800);
}
</script>{/if}
{if $zbp->Config('downlee')->shareoff=='1'}<script>//分享代码
function Share(pType){
	var pTitle = "{$article.Title}"; //待分享的标题
	var pImage = "{downlee_firstimg($article)}"; //待分享的图片
	var pContent = "{php}$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),78)).'...');{/php}{$description}"; //待分享的内容
	var pUrl = window.location.href; //当前的url地址
	var pObj = jQuery("div[class='yogo_hc']").find("h4");
	if(pObj.length){ pTitle = pObj.text();}
	var pObj = jQuery("div[class='yogo_hcs']").find("em");
	if(pObj.length){ pContent = pObj.text();  }
	var pObj = jQuery("div[class='con_cons']").find("img");
	if(pObj.length){ pImage = jQuery("div[class='con_cons']").find("img",0).attr("src"); }
	shareys(pType, pUrl, pTitle,pImage, pContent);
}
function shareys(a, c, b, e, d) {
    switch (a) {
    case "sina":
        c = "//service.weibo.com/share/share.php?title\x3d" + encodeURIComponent("\u300c" + b + "\u300d" + d + "\u9605\u8bfb\u8be6\u60c5" + c) + "\x26pic\x3d" + e +"&appkey={$zbp->Config('downlee')->weibokey}&searchPic=true";
        window.open(c);
        break;
    case "tqq":
        c = "//connect.qq.com/widget/shareqq/index.html?url\x3d" + encodeURIComponent(c) + "\x26title\x3d" + encodeURIComponent(b) + "\x26pics\x3d" + e;
        window.open(c);
        break;
    case "qzone":
        c = "//sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url\x3d" + encodeURIComponent(c) + "\x26title\x3d" + encodeURIComponent(b) + "\x26site\x3d\x26pics\x3d" + encodeURIComponent(e) + "\x26desc\x3d" + encodeURIComponent(d) + "\x26summary\x3d" + encodeURIComponent(d);
        window.open(c)
    }
};
</script>{/if}
<script src="{$host}zb_users/theme/{$theme}/plugin/js/html2canvas.min.js"></script>
<script src="{$host}zb_users/theme/{$theme}/plugin/js/common.js"></script>
<script>
	var poster_open = 'on';
	var txt1 = '长按识别二维码查看详情';
	var txt2 = '{$name}';
    var comiis_poster_start_wlat = 0;
	var comiis_rlmenu =  1;
	var comiis_nvscroll =  0;
    var comiis_poster_time_baxt;
    $(document).ready(function(){
        $(document).on('click', '.comiis_poster_a', function(e) {
            show_comiis_poster_ykzn();
        });
    });
    function comiis_poster_rrwz(){
        setTimeout(function(){
            html2canvas(document.querySelector(".comiis_poster_box_img"), {scale:2,useCORS:true}).then(canvas => {
                var img = canvas.toDataURL("image/jpeg", .9);
                document.getElementById('comiis_poster_images').src = img;
                $('.comiis_poster_load').hide();
                $('.comiis_poster_imgshow').show();
            });
        }, 100);
    }
    function show_comiis_poster_ykzn(){
        if(comiis_poster_start_wlat == 0){
            comiis_poster_start_wlat = 1;
            popup.open('<img src="{$host}zb_users/theme/{$theme}/plugin/img/imageloading.gif" class="comiis_loading">');
			var url = window.location.href.split('#')[0];
			url = encodeURIComponent(url);
            var html = '<div id="comiis_poster_box" class="comiis_poster_nchxd">\n' +
                '<div class="comiis_poster_box">\n' +
                '<div class="comiis_poster_okimg">\n' +
                '<div style="padding:150px 0;" class="comiis_poster_load">\n' +
                '<div class="loading_color">\n' +
                '  <span class="loading_color1"></span>\n' +
                '  <span class="loading_color2"></span>\n' +
                '  <span class="loading_color3"></span>\n' +
                '  <span class="loading_color4"></span>\n' +
                '  <span class="loading_color5"></span>\n' +
                '  <span class="loading_color6"></span>\n' +
                '  <span class="loading_color7"></span>\n' +
                '</div>\n' +
                '<div class="comiis_poster_oktit">正在生成海报, 请稍候</div>\n' +
                '</div>\n' +
                '<div class="comiis_poster_imgshow" style="display:none">\n' +
                '<img src="" class="vm" id="comiis_poster_images">\n' +
                '<div class="comiis_poster_oktit">↑长按上图保存图片分享</div>\n' +
                '</div>\n' +
                '</div>\n' +
                '<div class="comiis_poster_okclose"><a href="javascript:;" class="comiis_poster_closekey"><img src="{$host}zb_users/theme/{$theme}/plugin/img/poster_okclose.png" class="vm"></a></div>\n' +
                '</div>\n' +
                '<div class="comiis_poster_box_img">\n' +
                '<div class="comiis_poster_img"><div class="img_time">{$article.Time('d')}<span>{$article.Time('Y')}/{$article.Time('m')}</span></div><img src="{downlee_firstimg($article)}" class="vm" id="comiis_poster_image"></div>\n' +
                '<div class="comiis_poster_tita">{$article.Title}</div>\n' +
                '<div class="comiis_poster_txta">{php}$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),45)).'...');{/php}{$description}</div><div class="comiis_poster_x guig"></div>\n' +
                '<div class="comiis_poster_foot">\n' +
                '<img src="{$host}zb_users/theme/{$theme}/plugin/api.php?url='+url+'" class="kmewm fqpl vm">\n' +
                '<img src="{$host}zb_users/theme/{$theme}/plugin/img/poster_zw.png" class="kmzw vm"><span class="kmzwtip">'+txt1+'<br>'+txt2+'</span>\n' +
                '</div>\n' +
                '</div>\n' +
                '</div>';
            if(html.indexOf("comiis_poster") >= 0){
                comiis_poster_time_baxt = setTimeout(function(){
                    comiis_poster_rrwz();
                }, 5000);
                $('body').append(html);
                $('#comiis_poster_image').on('load',function(){
                    clearTimeout(comiis_poster_time_baxt);
                    comiis_poster_rrwz();
                });
                popup.close();
                setTimeout(function() {
                    $('.comiis_poster_box').addClass("comiis_poster_box_show");
                    $('.comiis_poster_closekey').off().on('click', function(e) {
                        $('.comiis_poster_box').removeClass("comiis_poster_box_show").on('webkitTransitionEnd transitionend', function() {
                            $('#comiis_poster_box').remove();
                            comiis_poster_start_wlat = 0;
                        });
                        return false;
                    });
                }, 60);
            }
        }
    }
    var new_comiis_user_share, is_comiis_user_share = 0;
    var as = navigator.appVersion.toLowerCase(), isqws = 0;
    if (as.match(/MicroMessenger/i) == "micromessenger" || as.match(/qq\//i) == "qq/") {
        isqws = 1;
    }
    if(isqws == 1){
        if(typeof comiis_user_share === 'function'){
            new_comiis_user_share = comiis_user_share;
            is_comiis_user_share = 1;
        }
        var comiis_user_share = function(){
            if(is_comiis_user_share == 1){
                isusershare = 0;
                new_comiis_user_share();
                if(isusershare == 1){
                    return false;
                }
            }
            isusershare = 1;
            show_comiis_poster_ykzn();
            return false;
        }
    }
</script>
{if $zbp->Config('downlee')->imgbox=='1'}<script src="{$host}zb_users/theme/{$theme}/script/fancybox.umd.js"></script>
{/if}{template:footer}