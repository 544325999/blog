<?php  /* Template Name:单页文章归档 * Template Type:sitemap */  ?><?php  include $this->GetTemplate('header');  ?>
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
				<nav class="navcates place">当前位置：<i class="icon font-home"></i><a href="<?php  echo $host;  ?>">首页</a><i class="icon font-angle-right"></i><a href="<?php  echo $article->Url;  ?>" rel="bookmark" title="正在阅读 <?php  echo $article->Title;  ?>"><?php  echo $article->Title;  ?></a></nav>
				<div id="font-change" class="single-font fr">
					<span id="font-dec"><a href="#" title="减小字体"><i class="icon font-minus-square-o"></i></a></span>
					<span id="font-int"><a href="#" title="默认字体"><i class="icon font-font"></i></a></span>
					<span id="font-inc"><a href="#" title="增大字体"><i class="icon font-plus-square-o"></i></a></span>
					<a class="r-hide" href="javascript:switchcloseside()" target="_self"><i class="icon font-arrow-double-right"></i></a>
				</div>
			</header>
			<?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->singleadoff=="1" && strlen ( $zbp->Config('downlee')->singleadyd ) > 8) { ?><div id="single-ad" class="mediad single-ad"><?php  echo $zbp->Config('downlee')->singleadyd;  ?></div><?php } ?>
			<?php }else{  ?><?php if ($zbp->Config('downlee')->singleadoff=="1" && strlen ( $zbp->Config('downlee')->singlead ) > 8) { ?><div id="single-ad" class="mediad single-ad"><?php  echo $zbp->Config('downlee')->singlead;  ?></div><?php } ?><?php } ?>
			<div class="article-content">
				<div class="single-entry">
					<?php  echo $article->Content;  ?>
					<div id="cundang" class="archive_list clearfix">
<?php //文章归档
function downlee_archive_list() {
    global $zbp;
    $i = $zbp->modulesbyfilename['archives']->MaxLi;
    if ($i < 0)return '';
    $fdate;
    $ldate;
    $sql = $zbp->db->sql->Select($zbp->table['Post'], array('log_PostTime'), null, array('log_PostTime' => 'DESC'), array(1), null);
    $array = $zbp->db->Query($sql);
    if (count($array) == 0)
        return '';
    $ldate = array(date('Y', $array[0]['log_PostTime']), date('m', $array[0]['log_PostTime']));
    $sql = $zbp->db->sql->Select($zbp->table['Post'], array('log_PostTime'), null, array('log_PostTime' => 'ASC'), array(1), null);
    $array = $zbp->db->Query($sql);
    if (count($array) == 0)
        return '';
    $fdate = array(date('Y', $array[0]['log_PostTime']), date('m', $array[0]['log_PostTime']));
    $arraydate = array();
    for ($i = $fdate[0];
        $i < $ldate[0] + 1;
        $i++) {
        for ($j = 1; $j < 13; $j++) {
            $arraydate[] = strtotime($i . '-' . $j);
        }
    }
    foreach ($arraydate as $key => $value) {
        if ($value - strtotime($ldate[0] . '-' . $ldate[1]) > 0)
            unset($arraydate[$key]);
        if ($value - strtotime($fdate[0] . '-' . $fdate[1]) < 0)
            unset($arraydate[$key]);
    }
    $arraydate = array_reverse($arraydate);
    $s = '';
    foreach ($arraydate as $key => $value) {
        $ff = $key+1;
        $url = new UrlRule($zbp->option['ZC_DATE_REGEX']);
        $url->Rules['{%date%}'] = date('Y-n', $value);
        $url->Rules['{%year%}'] = date('Y', $value);
        $url->Rules['{%month%}'] = date('n', $value);
        $url->Rules['{%day%}'] = 1;
        $fdate = $value;
        $ldate = (strtotime(date('Y-m-t', $value)) + 60 * 60 * 24);
        $sql = $zbp->db->sql->Count($zbp->table['Post'], array(array('COUNT', '*', 'num')), array(array('=', 'log_Type', '0'), array('=', 'log_Status', '0'), array('BETWEEN', 'log_PostTime', $fdate, $ldate)));
        $n = GetValueInArrayByCurrent($zbp->db->Query($sql), 'num');
        if ($n > 0) {
            $s.= '<div class="al_mon_list item">';
            $s.= '<h3>'.date('Y', $fdate).'年 '.downlee_number(date('n', $fdate)).'月</h3>';
            $s.= '<ul class="al_post_list archives-list" style="display: none;"> ';
            $order = array('log_PostTime' => 'DESC');
            $where = array(
                array('=','log_Status','0'),
                array('=','log_Type','0'),
                array('BETWEEN', 'log_PostTime', $fdate, $ldate)
            );
            $nbarraylist = $zbp->GetArticleList(array('*'),$where,$order,'','');
            foreach ($nbarraylist as $key => $essay) {
                $s .= '<li><time>'.$essay->Time('d').'日</time><span class="muted">'.$essay->CommNums.' 评论</span><a href="'.$essay->Url.'" title="'.$essay->Title.'" >'.$essay->Title.'</a></li>';
            }
            $s.= '</ul></div>';
        }
    }
    return $s;
}
function downlee_number($month) {
    $array = array('01','02','03','04','05','06','07','08','09','10','11','12');
    return $array[$month-1];
} ?>
						<?php echo downlee_archive_list() ?>
					</div>
				</div>
				<div class="article-iash">
					<p><b>未经允许不得转载：</b>作者:<a title="查看更多文章" href="<?php  echo $article->Author->Url;  ?>"><?php  echo $article->Author->StaticName;  ?></a>，转载或复制请以 <a href="<?php  echo $article->Url;  ?>">超链接形式</a>并注明出处<a href="<?php  echo $host;  ?>"><?php  echo $name;  ?></a>。</p>
					<p>原文地址：<a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Url;  ?>">《<?php  echo $article->Title;  ?>》</a>发布于<?php  echo $article->Time('Y-m-d');  ?></p>
				</div>
				<footer class="article-foot clearfix">
					<div class="xshare fl"><span class="xshare-title">分享到：</span><a class="x-weixin" href="javascript:;"><i class="icon font-weixin"></i><img alt="微信" src="<?php  echo $host;  ?>zb_users/theme/downlee/plugin/api.php?url=<?php  echo $article->Url;  ?>"></a><a class="x-qq" href="javascript:Share('tqq')"><i class="icon font-qq"></i></a><a class="x-weibo" href="javascript:Share('sina')"><i class="icon font-weibo"></i></a></div>
					<div class="xactions fr"><?php if (($zbp->CheckPlugin('san_praise_sdk')) =='1') { ?><a class="praise san-praise-sdk" sfa='click' data-postid='<?php  echo $san_praise_sdk->postid;  ?>' data-value="1" data-ok='zijiqugemingzi' title="赞一个"><i class="icon font-heart"></i>赞(<span class="san-praise-sdk" sfa='num' data-value='1' data-postid='<?php  echo $san_praise_sdk->postid;  ?>'><?php  echo $san_praise_sdk->value1;  ?></span>)</a><?php } ?>
					<?php if ($zbp->Config('downlee')->wzzsoff=='1') { ?><a href="javascript:;" class="zanter" onclick="reward()" title="打赏，支持一下"><i class="icon font-yen"></i>打赏</a><?php } ?>
					<a class="comiis_poster_a" href="javascript:;" title="生成海报封面"><i class="icon font-haibao"></i>海报</a></div>
				</footer>
			</div>
		</article>
		<?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->commentadoff=="1" && strlen ( $zbp->Config('downlee')->commentadyd ) > 8) { ?><div id="comment-ad" class="mediad comment-ad"><?php  echo $zbp->Config('downlee')->commentadyd;  ?></div><?php } ?>
		<?php }else{  ?><?php if ($zbp->Config('downlee')->commentadoff=="1" && strlen ( $zbp->Config('downlee')->commentad ) > 8) { ?><div id="comment-ad" class="mediad comment-ad"><?php  echo $zbp->Config('downlee')->commentad;  ?></div><?php } ?><?php } ?>
		<?php if (!$article->IsLock) { ?><section id="comments" class="theme-box">  
			<?php  include $this->GetTemplate('comments');  ?>
			<span class="icon icon_comment" title="comment"></span>
		</section><?php } ?>
	</div>
	<aside class="sidebar fr<?php if ($zbp->Config('downlee')->msideoff=='1') { ?> mside<?php } ?>">
		<?php  include $this->GetTemplate('sidebar3');  ?>
	</aside>
</main>
<?php if ($zbp->Config('downlee')->wzzsoff=='1') { ?><div class="hidebody"></div>
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
</script><?php } ?>
<?php if ($zbp->Config('downlee')->shareoff=='1') { ?><script>//分享代码
function Share(pType){
	var pTitle = "<?php  echo $article->Title;  ?>"; //待分享的标题
	var pImage = "<?php  echo downlee_firstimg($article);  ?>"; //待分享的图片
	var pContent = "<?php $description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),78)).'...'); ?><?php  echo $description;  ?>"; //待分享的内容
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
        c = "//service.weibo.com/share/share.php?title\x3d" + encodeURIComponent("\u300c" + b + "\u300d" + d + "\u9605\u8bfb\u8be6\u60c5" + c) + "\x26pic\x3d" + e +"&appkey=<?php  echo $zbp->Config('downlee')->weibokey;  ?>&searchPic=true";
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
</script><?php } ?>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/plugin/js/html2canvas.min.js"></script>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/plugin/js/common.js"></script>
<script>
	var poster_open = 'on';
	var txt1 = '长按识别二维码查看详情';
	var txt2 = '<?php  echo $name;  ?>';
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
            popup.open('<img src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/plugin/img/imageloading.gif" class="comiis_loading">');
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
                '<div class="comiis_poster_okclose"><a href="javascript:;" class="comiis_poster_closekey"><img src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/plugin/img/poster_okclose.png" class="vm"></a></div>\n' +
                '</div>\n' +
                '<div class="comiis_poster_box_img">\n' +
                '<div class="comiis_poster_img"><div class="img_time"><?php  echo $article->Time('d');  ?><span><?php  echo $article->Time('Y');  ?>/<?php  echo $article->Time('m');  ?></span></div><img src="<?php  echo downlee_firstimg($article);  ?>" class="vm" id="comiis_poster_image"></div>\n' +
                '<div class="comiis_poster_tita"><?php  echo $article->Title;  ?></div>\n' +
                '<div class="comiis_poster_txta"><?php $description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),45)).'...'); ?><?php  echo $description;  ?></div><div class="comiis_poster_x guig"></div>\n' +
                '<div class="comiis_poster_foot">\n' +
                '<img src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/plugin/api.php?url='+url+'" class="kmewm fqpl vm">\n' +
                '<img src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/plugin/img/poster_zw.png" class="kmzw vm"><span class="kmzwtip">'+txt1+'<br>'+txt2+'</span>\n' +
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
<?php if ($zbp->Config('downlee')->imgbox=='1') { ?><script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/fancybox.umd.js"></script>
<?php } ?><?php  include $this->GetTemplate('footer');  ?>