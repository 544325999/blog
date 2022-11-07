<footer class="footer">
	<div class="footer-top">
		<div class="container clearfix">
			<div class="span-1">
				<div class="span-title"><h2>联系我们</h2></div>
				<div class="span-text">
					<span><?php  echo $zbp->Config('downlee')->dbnavjs;  ?></span>
					<div class="foot-search">
						<form method="post" name="search" action="<?php  echo $host;  ?>zb_system/cmd.php?act=search" class="foot-searchform">
							<input type="text" name="q" placeholder="搜索..." class="foot-text-s">
							<input type="submit" class="foot-btn" value="搜索">
						</form>
					</div>
				</div>
			</div>
			<div class="span-2">
				<div class="span-title"><h2>关于我们</h2></div>
				<div class="span-text">
					<ul>
					<?php  echo $zbp->Config('downlee')->dbnavbq;  ?>
					</ul>
				</div>
			</div>
			<div class="span-3">
				<span class="span-4"><img src="<?php  echo $zbp->Config('downlee')->wxqrcode;  ?>" alt="" title=""><img src="<?php  echo $zbp->Config('downlee')->wxqrcodefr;  ?>" alt="" title=""></span>
				<p class="span-link"><?php  echo $zbp->Config('downlee')->wydbtext;  ?></p>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container clearfix">
			<p class="footer_copyright fl"><?php  echo $zbp->Config('downlee')->ftwenzi;  ?>. 安全运行<span id="iday"></span>天 <script>function siteRun(d){var nowD=new Date();return parseInt((nowD.getTime()-Date.parse(d))/24/60/60/1000)} document.getElementById("iday").innerHTML=siteRun("<?php  echo $zbp->Config('downlee')->webtime;  ?>");</script></p>
			<p class="footer_beian fr"><?php if (strlen ($zbp->Config('downlee')->icpbeian) > 8) { ?><?php  echo $zbp->Config('downlee')->icpbeian;  ?><?php } ?><?php if (strlen ($zbp->Config('downlee')->gabbeian) > 8) { ?><?php  echo $zbp->Config('downlee')->gabbeian;  ?><?php } ?>.<?php  echo $zbp->Config('downlee')->tongji;  ?></p>
		</div>
	</div>
	<div id="backtop" class="backtop">
		<div class="bt-box top"><i class="icon font-top"></i></div>
		<div class="bt-box bt_night"><a class="at-night" href="javascript:switchNightMode()" target="_self"><i class="icon font-yueliang"></i></a></div>
		<?php if (($type=='article' || $type=='page') && !$article->IsLock) { ?><div class="bt-box bt-comments"><a href="<?php  echo $article->Url;  ?>#comments" target="_self" title="发表评论"><i class="icon font-comment"></i></a></div><?php } ?>
		<div class="bt-box bottom"><i class="icon font-bottom"></i></div>
	</div>
	<?php if ($zbp->Config('downlee')->footaioff=='1') { ?><a class="bt-service" href="<?php if (downlee_is_mobile()) { ?>//wpa.qq.com/msgrd?v=3&uin=<?php  echo $zbp->Config('downlee')->qicq;  ?>&site=qq&menu=yes<?php }else{  ?>tencent://message/?uin=<?php  echo $zbp->Config('downlee')->qicq;  ?>&Site=qq&Menu=yes<?php } ?>" target="_blank" rel="noopener noreferrer" title="AI秘书"><span>我是Talklee，欢迎咨询我哦～</span></a><?php } ?>
</footer>
<div id="percentageCounter" class="fr-sidebar"></div>
<div class="none">
<?php if ($zbp->Config('downlee')->fjzhon=='1') { ?><script>var cookieDomain = "<?php  echo $host;  ?>";</script>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/zh_tw.js"></script>
<?php } ?><?php if ($type=='index'&&$page=='1') { ?><script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/particles.min.js"></script><?php } ?>
<?php if ($zbp->Config('downlee')->funcodeoff=='1') { ?><?php  echo $zbp->Config('downlee')->funcode;  ?>
<?php } ?><script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/custom.js?v=<?php  echo $zbp->themeinfo['modified'];  ?>"></script>
<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?><script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/wow.min.js"></script>
<?php } ?><?php if ($zbp->Config('downlee')->lazyoff=='1') { ?><script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/jquery.lazyload.js"></script>
<?php }else{  ?><script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/jquery.lazy.js"></script>
<?php } ?></div><?php  echo $footer;  ?>
</body>
</html>