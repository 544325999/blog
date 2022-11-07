{* Template Name:单页友链模板 * Template Type:links *}<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{template:header}
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
		<article class="article-main theme-box">
			<header class="article-header clearfix">
				<nav class="navcates place">当前位置：<i class="icon font-home"></i><a href="{$host}">首页</a><i class="icon font-angle-right"></i><a href="{$article.Url}" rel="bookmark" title="正在阅读 {$article.Title}">{$article.Title}</a></nav>
				<div id="font-change" class="single-font fr">
					<span id="font-dec"><a href="#" title="减小字体"><i class="icon font-minus-square-o"></i></a></span>
					<span id="font-int"><a href="#" title="默认字体"><i class="icon font-font"></i></a></span>
					<span id="font-inc"><a href="#" title="增大字体"><i class="icon font-plus-square-o"></i></a></span>
					<a class="r-hide" href="javascript:switchcloseside()" target="_self"><i class="icon font-arrow-double-right"></i></a>
				</div>
			</header>
			{if downlee_is_mobile()}{if $zbp->Config('downlee')->singleadoff=="1" && strlen ( $zbp->Config('downlee')->singleadyd ) > 8}<div id="single-ad" class="mediad single-ad">{$zbp->Config('downlee')->singleadyd}</div>{/if}
			{else}{if $zbp->Config('downlee')->singleadoff=="1" && strlen ( $zbp->Config('downlee')->singlead ) > 8}<div id="single-ad" class="mediad single-ad">{$zbp->Config('downlee')->singlead}</div>{/if}{/if}
			<div class="article-content">
				<div class="single-entry">
					{$article.Content}
					<div id="linkcat-1" class="linkcat"><h2>{$modules['link'].Name}</h2>
						<ul class="xoxo blogroll">
							{module:link}
						</ul>
					</div>
					<div id="linkcat-2" class="linkcat"><h2>{$modules['misc'].Name}</h2>
						<ul class="xoxo blogroll">
							{module:misc}
						</ul>
					</div>
				</div>
				<div class="article-iash">
					<p><b>未经允许不得转载！</b>作者:<a title="查看更多文章" href="{$article.Author.Url}">{$article.Author.StaticName}</a>，转载或复制请以 <a href="{$article.Url}">超链接形式</a>并注明出处<a href="{$host}">{$name}</a>。</p>
					<p>原文地址：<a href="{$article.Url}" title="{$article.Url}">《{$article.Title}》</a>发布于 {$article.Time('Y-m-d')}</p>
				</div>
				<footer class="article-foot clearfix">
					{if $zbp->Config('downlee')->shareoff=='1'}<div class="xshare fl"><span class="xshare-title">分享到：</span><a class="x-weixin" href="javascript:;"><i class="icon font-weixin"></i><img alt="微信" src="{$host}zb_users/theme/downlee/plugin/api.php?url={$article.Url}"></a><a class="x-qq" href="javascript:Share('tqq')"><i class="icon font-qq"></i></a><a class="x-weibo" href="javascript:Share('sina')"><i class="icon font-weibo"></i></a></div>{/if}
					<div class="xactions fr">{if ($zbp->CheckPlugin('san_praise_sdk')) =='1'}<a class="praise san-praise-sdk" sfa='click' data-postid='{$san_praise_sdk.postid}' data-value="1" data-ok='zijiqugemingzi' title="赞一个"><i class="icon font-heart"></i>赞(<span class="san-praise-sdk" sfa='num' data-value='1' data-postid='{$san_praise_sdk.postid}'>{$san_praise_sdk.value1}</span>)</a>{/if}
					{if $zbp->Config('downlee')->wzzsoff=='1'}<a href="javascript:;" class="zanter" onclick="reward()" title="打赏，支持一下"><i class="icon font-yen"></i>打赏</a>{/if}
					<a class="comiis_poster_a" href="javascript:;" title="生成海报封面"><i class="icon font-haibao"></i>海报</a></div>
				</footer>
			</div>
		</article>
		{if downlee_is_mobile()}{if $zbp->Config('downlee')->commentadoff=="1" && strlen ( $zbp->Config('downlee')->commentadyd ) > 8}<div id="comment-ad" class="mediad comment-ad">{$zbp->Config('downlee')->commentadyd}</div>{/if}
		{else}{if $zbp->Config('downlee')->commentadoff=="1" && strlen ( $zbp->Config('downlee')->commentad ) > 8}<div id="comment-ad" class="mediad comment-ad">{$zbp->Config('downlee')->commentad}</div>{/if}{/if}
		{if !$article.IsLock}<section id="comments" class="theme-box">  
			{template:comments}
			<span class="icon icon_comment" title="comment"></span>
		</section>{/if}
	</div>
	<aside class="sidebar fr{if $zbp->Config('downlee')->msideoff=='1'} mside{/if}">
		{template:sidebar3}
	</aside>
</main>
{if $zbp->Config('downlee')->wzzsoff=='1'}<div class="hidebody"></div>
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
    if ($('.lcphidebox').length){
        var scroll_offset = $(".lcphidebox");
    }else{
        var scroll_offset = $(".lcp-download");
    }
    $("html,body").animate({scrollTop:scroll_offset.offset().top}/*,'normal',function(){
        scroll_offset.css('margin-top','20px')
        setTimeout(function(){
            scroll_offset.css('border-color','#ffb800').css('background','#ffb80020');
        },500)
    }*/);
}
</script>{/if}
{if $zbp->Config('downlee')->shareoff=='1'}<script>//分享代码
function Share(pType){
	var pTitle = "{$article.Title}"; //待分享的标题
	var pImage = "{downlee_firstimg($article)}"; //待分享的图片
	var pContent = "{php}$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),78)).'...');{/php}{$description}"; //待分享的内容
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
                '<div class="comiis_poster_txta">{php}$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),45)).'...');{/php}{$description}</div><div class="comiis_poster_x guig"></div>\n' +
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