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
		 ?><i class="icon font-angle-right"></i><a href="<?php  echo $article->Url;  ?>" rel="bookmark" title="正在阅读 <?php  echo $article->Title;  ?>">正文</a><?php } ?>
		</nav>
		<div id="font-change" class="single-font fr">
			<span id="font-dec"><a href="#" title="减小字体"><i class="icon font-minus-square-o"></i></a></span>
			<span id="font-int"><a href="#" title="默认字体"><i class="icon font-font"></i></a></span>
			<span id="font-inc"><a href="#" title="增大字体"><i class="icon font-plus-square-o"></i></a></span>
			<a class="r-hide" href="javascript:switchcloseside()" target="_self"><i class="icon font-arrow-double-right"></i></a>
		</div>
	</header>
	<?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->singleadoff=="1" && strlen ( $zbp->Config('downlee')->singleadyd ) > 8) { ?><div id="single-ad" class="ads single-ad"><?php  echo $zbp->Config('downlee')->singleadyd;  ?></div><?php } ?>
	<?php }else{  ?><?php if ($zbp->Config('downlee')->singleadoff=="1" && strlen ( $zbp->Config('downlee')->singlead ) > 8) { ?><div id="single-ad" class="ads single-ad"><?php  echo $zbp->Config('downlee')->singlead;  ?></div><?php } ?><?php } ?>
	<div class="article-content">
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
			<?php if ($zbp->Config('downlee')->shareoff=='1') { ?><div class="xshare fl">
				<span class="xshare-title">分享到：</span><a class="x-weixin" href="javascript:;"><i class="icon font-weixin"></i><img alt="微信" src="<?php  echo $host;  ?>zb_users/theme/downlee/plugin/api.php?url=<?php  echo $article->Url;  ?>"></a><a class="x-qq" href="javascript:Share('tqq')"><i class="icon font-qq"></i></a><a class="x-weibo" href="javascript:Share('sina')"><i class="icon font-weibo"></i></a>
			</div><?php } ?>
			<div class="xactions fr">
				<?php if (($zbp->CheckPlugin('san_praise_sdk')) =='1') { ?><a class="praise san-praise-sdk" sfa='click' data-postid='<?php  echo $san_praise_sdk->postid;  ?>' data-value="1" data-ok='zijiqugemingzi' title="赞一个"><i class="icon font-heart"></i>赞(<span class="san-praise-sdk" sfa='num' data-value='1' data-postid='<?php  echo $san_praise_sdk->postid;  ?>'><?php  echo $san_praise_sdk->value1;  ?></span>)</a><?php } ?>
				<?php if ($zbp->Config('downlee')->wzzsoff=='1') { ?><a href="javascript:;" class="zanter" onclick="reward()" title="打赏，支持一下"><i class="icon font-yen"></i>打赏</a><?php } ?><a class="comiis_poster_a" href="javascript:;" title="生成海报封面"><i class="icon font-haibao"></i>海报</a>
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


<?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->xgtjadoff=="1" && strlen ( $zbp->Config('downlee')->xgtjadyd ) > 8) { ?><div id="related-ad" class="ads related-ad"><?php  echo $zbp->Config('downlee')->xgtjadyd;  ?></div><?php } ?>
<?php }else{  ?><?php if ($zbp->Config('downlee')->xgtjadoff=="1" && strlen ( $zbp->Config('downlee')->xgtjad ) > 8) { ?><div id="related-ad" class="ads related-ad"><?php  echo $zbp->Config('downlee')->xgtjad;  ?></div><?php } ?><?php } ?>
<div class="theme-box relates-thumb">
	<div class="relates-theme">相关推荐</div>
	<div class="relates-list clearfix">
	<?php if (strlen ( $article->Tag ) > 0) { ?><?php if ($zbp->Config('downlee')->readapi=="3") { ?><!--同签同类-->
	<?php  foreach ( GetList($zbp->Config('downlee')->readnum,$article->Category->ID,null,null,null,null,array('is_related'=>$article->ID)) as $related) { ?>
		<div class="push-box-inner">
			<a href="<?php  echo $related->Url;  ?>" title="<?php  echo $related->Title;  ?>" target="_blank">
				<figure class="gr-thumbnail"><img src="<?php  echo downlee_firstimg($related);  ?>" alt="<?php  echo $related->Title;  ?>"></figure>
				<div class="push-b-title">
					<h3 class="push-b-h3"><?php  echo $related->Title;  ?></h2>
					<p class="push-b-footer"><span><?php  echo $related->ViewNums;  ?> 阅读<?php if (!$article->IsLock && !$option['ZC_COMMENT_TURNOFF']) { ?> ，</span><span><?php  echo $related->CommNums;  ?> 评论<?php } ?></span></p>
				</div>
			</a>
		</div>
		<?php }   ?><?php }elseif($zbp->Config('downlee')->readapi=="1") {  ?><!--相关标签-->
		<?php  foreach ( GetList($zbp->Config('downlee')->readnum,null,null,null,null,null,array('is_related'=>$article->ID)) as $related) { ?>
		<div class="push-box-inner">
			<a href="<?php  echo $related->Url;  ?>" title="<?php  echo $related->Title;  ?>" target="_blank">
				<figure class="gr-thumbnail"><img src="<?php  echo downlee_firstimg($related);  ?>" alt="<?php  echo $related->Title;  ?>"></figure>
				<div class="push-b-title">
					<h3 class="push-b-h3"><?php  echo $related->Title;  ?></h2>
					<p class="push-b-footer"><span><?php  echo $related->ViewNums;  ?> 阅读<?php if (!$article->IsLock && !$option['ZC_COMMENT_TURNOFF']) { ?> ，</span><span><?php  echo $related->CommNums;  ?> 评论<?php } ?></span></p>
				</div>
			</a>
		</div>
		<?php }   ?><?php }elseif($zbp->Config('downlee')->readapi=="2") {  ?><!--相关分类-->
		<?php  foreach ( GetList($zbp->Config('downlee')->readnum,$article->Category->ID,null,null,null,null,array('has_subcate'=>true)) as $related) { ?>
		<div class="push-box-inner">
			<a href="<?php  echo $related->Url;  ?>" title="<?php  echo $related->Title;  ?>" target="_blank">
				<figure class="gr-thumbnail"><img src="<?php  echo downlee_firstimg($related);  ?>" alt="<?php  echo $related->Title;  ?>"></figure>
				<div class="push-b-title">
					<h3 class="push-b-h3"><?php  echo $related->Title;  ?></h2>
					<p class="push-b-footer"><span><?php  echo $related->ViewNums;  ?> 阅读<?php if (!$article->IsLock && !$option['ZC_COMMENT_TURNOFF']) { ?> ，</span><span><?php  echo $related->CommNums;  ?> 评论<?php } ?></span></p>
				</div>
			</a>
		</div>
		<?php }   ?><?php } ?><?php }else{  ?><?php  foreach ( GetList($zbp->Config('downlee')->readnum) as $newlist) { ?>
		<div class="push-box-inner">
			<a href="<?php  echo $newlist->Url;  ?>" title="<?php  echo $newlist->Title;  ?>" target="_blank">
				<figure class="gr-thumbnail"><img src="<?php  echo downlee_firstimg($newlist);  ?>" alt="<?php  echo $newlist->Title;  ?>"></figure>
				<div class="push-b-title">
					<h3 class="push-b-h3"><?php  echo $newlist->Title;  ?></h2>
					<p class="push-b-footer"><span><?php  echo $newlist->ViewNums;  ?> 阅读<?php if (!$article->IsLock && !$option['ZC_COMMENT_TURNOFF']) { ?> ，</span><span><?php  echo $newlist->CommNums;  ?> 评论<?php } ?></span></p>
				</div>
			</a>
		</div><?php }   ?><?php } ?>
	</div>
</div>
<?php if (downlee_is_mobile()) { ?><?php if ($zbp->Config('downlee')->commentadoff=="1" && strlen ( $zbp->Config('downlee')->commentadyd ) > 8) { ?><div id="comment-ad" class="ads comment-ad"><?php  echo $zbp->Config('downlee')->commentadyd;  ?></div><?php } ?>
<?php }else{  ?><?php if ($zbp->Config('downlee')->commentadoff=="1" && strlen ( $zbp->Config('downlee')->commentad ) > 8) { ?><div id="comment-ad" class="ads comment-ad"><?php  echo $zbp->Config('downlee')->commentad;  ?></div><?php } ?><?php } ?>
<?php if (!$article->IsLock) { ?><section id="comments" class="theme-box">  
	<?php  include $this->GetTemplate('comments');  ?>
	<span class="icon icon_comment" title="comment"></span>
</section><?php } ?>