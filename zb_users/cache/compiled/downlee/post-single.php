<article class="article-main theme-box">
	<header class="article-header clearfix">
		<nav class="navcates place">
		当前位置：<i class="icon font-home"></i><a href="<?php  echo $host;  ?>">首页</a><?php if ($type=='page') { ?><i class="icon font-angle-right"></i><a href="<?php  echo $article->Url;  ?>" rel="bookmark" title="正在阅读 <?php  echo $article->Title;  ?>"><?php  echo $article->Title;  ?></a><?php }else{  ?><?php 
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
            $datas = getData($article->Title);

             ?><i class="icon font-angle-right"></i><a href="<?php  echo $article->Url;  ?>" rel="bookmark" title="正在阅读 <?php  echo $article->Title;  ?>">正文</a><?php } ?>
		</nav>
		<div id="font-change" class="single-font fr">
			<span id="font-dec"><a href="#" title="减小字体"><i class="icon font-minus-square-o"></i></a></span>
			<span id="font-int"><a href="#" title="默认字体"><i class="icon font-font"></i></a></span>
			<span id="font-inc"><a href="#" title="增大字体"><i class="icon font-plus-square-o"></i></a></span>
			<a class="r-hide" href="javascript:switchcloseside()" target="_self"><i class="icon font-icverticleright"></i></a>
		</div>
	</header>
	<?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->singleadoff=="1" && strlen ( $zbp->Config('downlee')->singleadyd ) > 8) { ?><div id="single-ad" class="mediad single-ad"><?php  echo $zbp->Config('downlee')->singleadyd;  ?></div><?php } ?>
	<?php }else{  ?><?php if ($zbp->Config('downlee')->singleadoff=="1" && strlen ( $zbp->Config('downlee')->singlead ) > 8) { ?><div id="single-ad" class="mediad single-ad"><?php  echo $zbp->Config('downlee')->singlead;  ?></div><?php } ?><?php } ?>
	<div class="article-content">
		<?php if (($article->Metas->usable)=='1') { ?><div class="single-r-usable"></div><?php } ?>
		<div class="single-entry">
			<?php if ($zbp->Config('downlee')->timeoutoff=="1" && (ZC_VERSION_COMMIT >= 2800) && $article->Time('Update','Y')!='1970') { ?><?php $nowTime = time();
			$updateDay = ($nowTime - $article->UpdateTime) / 24 / 60 / 60;
			$updateDay = floor($updateDay); ?>
			<?php if (($article->Time('Update','Y年m月d日')) > ($article->Time('Y年m月d日'))) { ?><div class="article-update-tips">
				<p class="update-tips-ts"><i class="icon font-exclamationcircle"></i>温馨提示：</p>
				<p class="update-tips-text">文章最后更新时间<span class="red"><?php  echo $article->Time('Update','Y年m月d日');  ?></span>，已超过<span class="red"><?php  echo $updateDay;  ?></span>天没有更新，若内容或图片失效，请留言反馈！</p>
			</div><?php } ?><?php } ?>
			<?php  echo $article->Content;  ?>
		</div>
		<?php if ((isset($article->Metas->bdresurl) || ($article->Metas->lzresurl) ||($article->Metas->qtresurl))) { ?>
		<h2 class="down-h2">资源下载</h2>
		<div id="gsxz" class="article-download">
			<span class="article-tipss">资源下载</span>
			<div class="download-up">
				<i class="icon font-anzhuang"></i>
				<h3 class="mdl-name"><?php if (strlen ($article->Metas->resname) > 2) { ?><?php  echo $article->Metas->resname;  ?><?php }else{  ?><?php  echo $article->Title;  ?><?php } ?></h3>
				<span class="mdl-info"><?php if (strlen ($article->Metas->filesize) > 2) { ?>文件大小：<em><?php  echo $article->Metas->filesize;  ?></em><?php } ?><?php if (strlen ($article->Metas->dpcode) > 2) { ?>解压密码：<em><?php  echo $article->Metas->dpcode;  ?></em><?php } ?>更新时间：<time class="red"><?php  echo $article->Time('Y-m-d');  ?></time></span>
			</div>
			<div class="download-links">
				<ul>
					<?php if (strlen ($article->Metas->bdresurl) > 8) { ?><li>
						<?php if (strlen ($article->Metas->bdycode) > 2) { ?><button class="copy-button" type="button" onclick="bdycopyContent();"><em>下载：</em><input type="text" class="share-input"  value="<?php  echo $article->Metas->bdycode;  ?>" id="bdcopy-content"/></button><script>function bdycopyContent(){var copyobject=document.getElementById("bdcopy-content");copyobject.select();document.execCommand("Copy");var result=confirm("\u63d0\u53d6\u7801\u590d\u5236\u5b8c\u6210\uff0c\u70b9\u51fb\u786e\u5b9a\u8df3\u8f6c\u94fe\u63a5");if(result){window.open("<?php  echo $article->Metas->bdresurl;  ?>")}else{return false}};</script><?php }else{  ?><a href="<?php  echo $article->Metas->bdresurl;  ?>" target="_blank"><span>下载</span></a><?php } ?>下载地址1
					</li><?php } ?>
					<?php if (strlen ($article->Metas->lzresurl) > 8) { ?><li>
						<?php if (strlen ($article->Metas->lzycode) > 2) { ?><button class="copy-button" type="button" onclick="lzcopyContent();"><em>下载：</em><input type="text" class="share-input"  value="<?php  echo $article->Metas->lzycode;  ?>" id="lzcopy-content"/></button><script>function lzcopyContent(){var copyobject=document.getElementById("lzcopy-content");copyobject.select();document.execCommand("Copy");var result=confirm("\u63d0\u53d6\u7801\u590d\u5236\u5b8c\u6210\uff0c\u70b9\u51fb\u786e\u5b9a\u8df3\u8f6c\u94fe\u63a5");if(result){window.open("<?php  echo $article->Metas->lzresurl;  ?>")}else{return false}};</script><?php }else{  ?><a href="<?php  echo $article->Metas->lzresurl;  ?>" target="_blank"><span>下载</span></a><?php } ?>下载地址2
					</li><?php } ?>
					<?php if (strlen ($article->Metas->qtresurl) > 8) { ?><li>
						<?php if (strlen ($article->Metas->qtcode) > 2) { ?><button class="copy-button" type="button" onclick="qtcopyContent();"><em>下载：</em><input type="text" class="share-input"  value="<?php  echo $article->Metas->qtcode;  ?>" id="qtcopy-content"/></button><script>function qtcopyContent(){var copyobject=document.getElementById("qtcopy-content");copyobject.select();document.execCommand("Copy");var result=confirm("\u63d0\u53d6\u7801\u590d\u5236\u5b8c\u6210\uff0c\u70b9\u51fb\u786e\u5b9a\u8df3\u8f6c\u94fe\u63a5");if(result){window.open("<?php  echo $article->Metas->qtresurl;  ?>")}else{return false}};</script><?php }else{  ?><a href="<?php  echo $article->Metas->qtresurl;  ?>" target="_blank"><span>下载</span></a><?php } ?>下载地址3
					</li><?php } ?>
				</ul>
			</div>
		</div><?php } ?>
		<div class="article-tags">
			<?php if (Count($article->Tags)>0) { ?>标签：<?php  foreach ( $article->Tags as $tag) { ?><a href="<?php  echo $tag->Url;  ?>" rel="tag" title="查看标签为《<?php  echo $tag->Name;  ?>》的所有文章"><?php  echo $tag->Name;  ?></a><?php }   ?><?php }else{  ?><a>博主很懒没有标签</a><?php } ?>
		</div>
		<?php if ($zbp->Config('downlee')->tougaoff=='1') { ?><?php if (strlen ( $article->Metas->originalauthor ) > 2 || strlen ( $article->Metas->originalurl) > 2) { ?><div class="article-iash article-zztg">
			<p><b>特别声明：</b>以上文章内容仅代表作者本人观点，不代表<span><?php  echo $name;  ?></span>观点或立场，如有侵权请联系删除。</p>
			<p>原文作者：<a rel="nofollow" href="<?php  echo $article->Metas->originalurl;  ?>"><?php if (strlen ( $article->Metas->originalauthor ) > 2) { ?><?php  echo $article->Metas->originalauthor;  ?><?php }else{  ?>文章投稿<?php } ?></a>，地址：<a rel="nofollow" href="<?php  echo $article->Metas->originalurl;  ?>" title="<?php  echo $article->Metas->originalurl;  ?>" target="_blank">《<?php  echo $article->Title;  ?>》</a>发布于：<?php  echo $article->Time('Y-m-d');  ?></p>
		</div>
		<?php }else{  ?><div class="article-iash">
			<p><b>未经允许不得转载！</b>
			作者:<a title="查看更多文章" href="<?php  echo $article->Author->Url;  ?>"><?php  echo $article->Author->StaticName;  ?></a>，转载或复制请以<a href="<?php  echo $article->Url;  ?>">超链接形式</a>并注明出处<a href="<?php  echo $host;  ?>"><?php  echo $name;  ?></a>。</p>
			<p>原文地址：<a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Url;  ?>">《<?php  echo $article->Title;  ?>》</a>发布于：<?php  echo $article->Time('Y-m-d');  ?></p>
		</div><?php } ?><?php } ?>
		<footer class="article-foot clearfix">
			<?php if ($zbp->Config('downlee')->shareoff=='1') { ?><div class="xshare fl"><span class="xshare-title">分享到：</span>
				<a class="x-weixin" href="javascript:;"><i class="icon font-weixin"></i><img alt="微信" src="<?php  echo $host;  ?>zb_users/theme/downlee/plugin/api.php?url=<?php  echo $article->Url;  ?>"></a>
				<a class="x-qq" href="javascript:Share('tqq')"><i class="icon font-qq"></i></a>
				<a class="x-weibo" href="javascript:Share('sina')"><i class="icon font-weibo"></i></a>
			</div><?php } ?>
			<div class="xactions fr">
				<?php if (($zbp->CheckPlugin('san_praise_sdk')) =='1') { ?><a class="praise san-praise-sdk" sfa='click' data-postid='<?php  echo $san_praise_sdk->postid;  ?>' data-value="1" data-ok='zijiqugemingzi' title="赞一个"><i class="icon font-heart"></i>赞(<span class="san-praise-sdk" sfa='num' data-value='1' data-postid='<?php  echo $san_praise_sdk->postid;  ?>'><?php  echo $san_praise_sdk->value1;  ?></span>)</a><?php } ?>
				<?php if ($zbp->Config('downlee')->wzzsoff=='1') { ?><a href="javascript:;" class="zanter" onclick="reward()" title="打赏，支持一下"><i class="icon font-yen"></i>打赏</a><?php } ?>
				<a class="comiis_poster_a" href="javascript:;" title="生成海报封面"><i class="icon font-haibao"></i>海报</a>
			</div>
		</footer>
	</div>
</article>
<nav class="theme-box article-nav clearfix">
	<div class="entry-page-prev fl">
		<?php if ($article->Prev) { ?><a href="<?php  echo $article->Prev->Url;  ?>" rel="prev">
			<i class="icon font-arrow-double-left"></i><span>上一篇</span>
			<p><?php  echo $article->Prev->Title;  ?></p>
		</a>
		<?php }else{  ?>
		<a href="/" rel="prev">
			<i class="icon font-arrow-double-left"></i><span>上一篇</span>
			<p>别找了，亲，已是天涯海角啦！</p>
		</a><?php } ?>
	</div>
	<div class="entry-page-next fr">
		<?php if ($article->Next) { ?><a href="<?php  echo $article->Next->Url;  ?>" rel="next">
			<span>下一篇</span><i class="icon font-arrow-double-right"></i>
			<p><?php  echo $article->Next->Title;  ?></p>
		</a>
		<?php }else{  ?>
		<a href="/" rel="next">
			<span>下一篇</span><i class="icon font-arrow-double-right"></i>
			<p>别翻了，亲，我可是有底线的！</p>
		</a><?php } ?>
	</div>
</nav>
<?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->xgtjadoff=="1" && strlen ( $zbp->Config('downlee')->xgtjadyd ) > 8) { ?><div id="related-ad" class="mediad related-ad"><?php  echo $zbp->Config('downlee')->xgtjadyd;  ?></div><?php } ?>
<?php }else{  ?><?php if ($zbp->Config('downlee')->xgtjadoff=="1" && strlen ( $zbp->Config('downlee')->xgtjad ) > 8) { ?><div id="related-ad" class="mediad related-ad"><?php  echo $zbp->Config('downlee')->xgtjad;  ?></div><?php } ?><?php } ?>
<div class="theme-box relates-thumb">
	<div class="relates-theme">相关推荐</div>
    <div class="relates-list clearfix">
        <?php if (isset($datas['data']) && $datas['data']) { ?>
        <?php  foreach ( $datas['data'] as $data) { ?>
            <div class="push-box-inner">
                            <a href="<?php  echo $data['log_ID'];  ?>.html" title="<?php  echo $data['log_Title'];  ?>" target="_blank">
                <!--                <figure class="gr-thumbnail"><img src="<?php  echo downlee_firstimg($newlist);  ?>" alt="<?php  echo $newlist->Title;  ?>"></figure>-->
                <div class="push-b-title">
                    <h3 class="push-b-h3"><?php  echo $data['log_Title'];  ?></h2>
                        <!--                        <p class="push-b-footer"><span><?php  echo downlee_ViewNums($newlist);  ?> 阅读<?php if (!$article->IsLock && !$option['ZC_COMMENT_TURNOFF']) { ?> ，</span><span><?php  echo $newlist->CommNums;  ?> 评论<?php } ?></span></p>-->
                </div>
                </a>
            </div>
        <?php }   ?>
        <?php } ?>
    </div>
</div>
<?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->commentadoff=="1" && strlen ( $zbp->Config('downlee')->commentadyd ) > 8) { ?><div id="comment-ad" class="mediad comment-ad"><?php  echo $zbp->Config('downlee')->commentadyd;  ?></div><?php } ?>
<?php }else{  ?><?php if ($zbp->Config('downlee')->commentadoff=="1" && strlen ( $zbp->Config('downlee')->commentad ) > 8) { ?><div id="comment-ad" class="mediad comment-ad"><?php  echo $zbp->Config('downlee')->commentad;  ?></div><?php } ?><?php } ?>
<?php if (!$article->IsLock) { ?><section id="comments" class="theme-box">
  <?php  include $this->GetTemplate('comments');  ?>
  <span class="icon icon_comment" title="comment"></span>
</section><?php } ?>
<?php if ($zbp->Config('downlee')->shareoff=='1') { ?><script>//分享代码
function Share(pType){
	var pTitle = "<?php  echo $article->Title;  ?>"; //待分享的标题
	var pImage = "<?php  echo downlee_firstimg($article);  ?>"; //待分享的图片
	var pContent = "<?php $description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),78)).'...'); ?><?php  echo $description;  ?>"; //待分享的内容
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
                '<div class="comiis_poster_txta"><?php $description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),45)).'...'); ?><?php  echo $description;  ?></div><div class="comiis_poster_x guig"></div>\n' +
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
