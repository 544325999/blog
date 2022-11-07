<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?><footer class="footer">
	<div class="footer-top">
		<div class="container clearfix">
			<div class="span-1">
				<div class="span-title"><h2>联系我们</h2></div>
				<div class="span-text">
					<span>{$zbp->Config('downlee')->dbnavjs}</span>
					<div class="foot-search">
						<form method="post" name="search" action="{$host}zb_system/cmd.php?act=search" class="foot-searchform">
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
					{$zbp->Config('downlee')->dbnavbq}
					</ul>
				</div>
			</div>
			<div class="span-3">
				<span class="span-4"><img src="{$zbp->Config('downlee')->wxqrcode}" alt="" title=""><img src="{$zbp->Config('downlee')->wxqrcodefr}" alt="" title=""></span>
				<p class="span-link">{$zbp->Config('downlee')->wydbtext}</p>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container clearfix">
			<p class="footer_copyright fl">{$zbp->Config('downlee')->ftwenzi}. 安全运行<span id="iday"></span>天 <script>function siteRun(d){var nowD=new Date();return parseInt((nowD.getTime()-Date.parse(d))/24/60/60/1000)} document.getElementById("iday").innerHTML=siteRun("{$zbp->Config('downlee')->webtime}");</script></p>
			<p class="footer_beian fr">{if strlen ($zbp->Config('downlee')->icpbeian) > 8}{$zbp->Config('downlee')->icpbeian}{/if}{if strlen ($zbp->Config('downlee')->gabbeian) > 8}{$zbp->Config('downlee')->gabbeian}{/if}.{$zbp->Config('downlee')->tongji}</p>
		</div>
	</div>
	<div id="backtop" class="backtop">
		<div class="bt-box top"><i class="icon font-top"></i></div>
		<div class="bt-box bt_night"><a class="at-night" href="javascript:switchNightMode()" target="_self"><i class="icon font-yueliang"></i></a></div>
		{if ($type=='article' || $type=='page') && !$article.IsLock}<div class="bt-box bt-comments"><a href="{$article.Url}#comments" target="_self" title="发表评论"><i class="icon font-comment"></i></a></div>{/if}
		<div class="bt-box bottom"><i class="icon font-bottom"></i></div>
	</div>
	{if $zbp->Config('downlee')->footaioff=='1'}<a class="bt-service" href="{if downlee_is_mobile()}//wpa.qq.com/msgrd?v=3&uin={$zbp->Config('downlee')->qicq}&site=qq&menu=yes{else}tencent://message/?uin={$zbp->Config('downlee')->qicq}&Site=qq&Menu=yes{/if}" target="_blank" rel="noopener noreferrer" title="AI秘书"><span>我是Talklee，欢迎咨询我哦～</span></a>{/if}
</footer>
<div id="percentageCounter" class="fr-sidebar"></div>
<div class="none">
{if $zbp->Config('downlee')->fjzhon=='1'}<script>var cookieDomain = "{$host}";</script>
<script src="{$host}zb_users/theme/{$theme}/script/zh_tw.js"></script>
{/if}{if $type=='index'&&$page=='1'}<script src="{$host}zb_users/theme/{$theme}/script/particles.min.js"></script>{/if}
{if $zbp->Config('downlee')->funcodeoff=='1'}{$zbp->Config('downlee')->funcode}
{/if}<script src="{$host}zb_users/theme/{$theme}/script/custom.js?v={$zbp->themeinfo['modified']}"></script>
{if $zbp->Config('downlee')->gdtxoff=='1'}<script src="{$host}zb_users/theme/{$theme}/script/wow.min.js"></script>
{/if}{if $zbp->Config('downlee')->lazyoff=='1'}<script src="{$host}zb_users/theme/{$theme}/script/jquery.lazyload.js"></script>
{else}<script src="{$host}zb_users/theme/{$theme}/script/jquery.lazy.js"></script>
{/if}</div>{$footer}
</body>
</html>