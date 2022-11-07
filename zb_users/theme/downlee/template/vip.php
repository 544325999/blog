{* Template Name:会员介绍单页 * Template Type:page,vip *}<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{template:header}
<div class="banner-vip-wrap" style="background-image:url({$zbp->Config('downlee')->viptop});">
	<div class="container">
		<div class="vip-user-info">
			<div class="vip-login-wrap">会员VIP特权</div>
			<div class="vip-i-p">
				{$zbp->Config('downlee')->viptoptq}
			</div>
			<a class="support-btn" href="{if $zbp->CheckPlugin('LayCenter')}{php}echo $lcp->BuildUrl('User').'#/User/Invest/to=VIP'{/php}{else}{$zbp->Config('downlee')->viptqcz}{/if}" id="pay-vip2">立即充值</a>
		</div>
	</div>
</div>
<div class="vip-main-content">
	<div class="main-content vip-main container clearfix">
		<div class="single box-show">
			<article class="single-entry">
				{$article.Content}
			</article>
		</div>
	</div>
</div>
<div class="vip-theme-section"><!--会员各项级别-->
	<div class="vip-module" style="background-image:url({$zbp->Config('downlee')->vipcostbg});">
		<div class="container vip-relative">
			<div class="vip-col-lg">
				<h3 class="h3-text"><i class="icon font-selectionfill"></i>加入超级VIP会员，海量资源免费下载使用</h3>
				{if $zbp->CheckPlugin('LayCenter')}<p class="text-white">本站已有 <span class="badge badge-pill badge-info">{php}echo $lcp->sql('Member',true)->Count(array(array('=','mem_LayCenter_VipType',4))){/php}</span> 位优秀的VIP会员加入</p>
				{else}<p class="text-white">本站VIP会员期待您的加盟，充会员享特权！</p>{/if}
			</div>
			<div class="vip-section-box">
				<div class="vip-col-item">
					<div class="vip-col-card text-green">
                        <div class="vip-card-header">
							<div class="vip-card-price"><span class="font-weight-bolder">{if $zbp->CheckPlugin('LayCenter')}￥{$lcp.config.vip_month_price}{else}￥{$zbp->Config('downlee')->vipmcost}{/if}</span></div>
                            <span class="vip-card-day"><i class="icon font-zuanshi"></i> 月卡VIP / 31天</span>
						</div>
                        <div class="vip-card-body">
                            <ul class="vip-list-muted">
								{$zbp->Config('downlee')->vipmcostj}
							</ul>
						</div>
                        <div class="vip-card-footer">
                            <a class="vip-btn-success" href="{if $zbp->CheckPlugin('LayCenter')}{php}echo $lcp->BuildUrl('User').'#/User/Invest/to=VIP'{/php}{else}{$zbp->Config('downlee')->vipcosturl}{/if}"><i class="icon font-zuanshi"></i> 升级月卡VIP会员</a>
                        </div>
                    </div>
				</div>
				<div class="vip-col-item">
					<div class="vip-col-card text-rad">
                        <div class="vip-card-header">
							<div class="vip-card-price"><span class="font-weight-bolder">{if $zbp->CheckPlugin('LayCenter')}￥{$lcp.config.vip_year_price}{else}￥{$zbp->Config('downlee')->vipycost}{/if}</span></div>
                            <span class="vip-card-day"><i class="icon font-zuanshi"></i> 年卡VIP / 366天</span>
						</div>
                        <div class="vip-card-body">
                            <ul class="vip-list-muted">
								{$zbp->Config('downlee')->vipycostj}
							</ul>
						</div>
                        <div class="vip-card-footer">
                            <a class="vip-btn-success" href="{if $zbp->CheckPlugin('LayCenter')}{php}echo $lcp->BuildUrl('User').'#/User/Invest/to=VIP'{/php}{else}{$zbp->Config('downlee')->vipcosturl}{/if}"><i class="icon font-zuanshi"></i> 升级年卡VIP会员</a>
                        </div>
                    </div>
				</div>
				<div class="vip-col-item">
					<div class="vip-col-card text-yellow">
                        <div class="vip-card-header">
							<div class="vip-card-price"><span class="font-weight-bolder">{if $zbp->CheckPlugin('LayCenter')}￥{$lcp.config.vip_ever_price}{else}￥{$zbp->Config('downlee')->vipscost}{/if}</span></div>
                            <span class="vip-card-day"><i class="icon font-zuanshi"></i> 超级VIP / 永久</span>
						</div>
                        <div class="vip-card-body">
                            <ul class="vip-list-muted">
								{$zbp->Config('downlee')->vipscostj}
							</ul>
						</div>
                        <div class="vip-card-footer">
                            <a class="vip-btn-success" href="{if $zbp->CheckPlugin('LayCenter')}{php}echo $lcp->BuildUrl('User').'#/User/Invest/to=VIP'{/php}{else}{$zbp->Config('downlee')->vipcosturl}{/if}"><i class="icon font-zuanshi"></i> 升级超级VIP会员</a>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="moudle-top"><!--特权介绍-->
	<div class="container">
		<div class="module-line">
			<span class="arrow left-arrow"></span>
			<span class="text">会员尊享6项特权</span>
			<span class="arrow right-arrow"></span>
		</div>
		<ul class="vip-slogan">
			<li class="vip-slogan-box"><i class="icon font-jishufuwu"></i><div class="vip-slogan-text">{$zbp->Config('downlee')->viptqxq}</div></li>
			<li class="vip-slogan-box"><i class="icon font-wendang1"></i><div class="vip-slogan-text">{$zbp->Config('downlee')->viptqxq2}</div></li>
			<li class="vip-slogan-box"><i class="icon font-zhuti"></i><div class="vip-slogan-text">{$zbp->Config('downlee')->viptqxq3}</div></li>
			<li class="vip-slogan-box"><i class="icon font-yun"></i><div class="vip-slogan-text">{$zbp->Config('downlee')->viptqxq4}</div></li>
			<li class="vip-slogan-box"><i class="icon font-jishufuwushang1"></i><div class="vip-slogan-text">{$zbp->Config('downlee')->viptqxq5}</div></li>
			<li class="vip-slogan-box"><i class="icon font-vip"></i><div class="vip-slogan-text">{$zbp->Config('downlee')->viptqxq6}</div></li>
		</ul>
	</div>
</div>
<div class="vip-theme-faq"><!--问题答疑-->
	<div class="vip-module" style="background-image:url({$zbp->Config('downlee')->vipfaqbg});">
		<div class="container vip-faq-main">
			<h4 class="vip-faq-title">会员常见问题及帮助</h4>
			<div class="row">
				<div class="vip-faq-col">
					<div class="vip-faq-itm">
						<h4><i class="icon font-wenhao"></i> {$zbp->Config('downlee')->vipfaq}</h4>
						<p>{$zbp->Config('downlee')->vipfaq2}</p>
					</div>
				</div>
				<div class="vip-faq-col">
					<div class="vip-faq-itm">
						<h4><i class="icon font-wenhao"></i> {$zbp->Config('downlee')->vipfaq3}</h4>
						<p>{$zbp->Config('downlee')->vipfaq4}</p>
					</div>
				</div>
				<div class="vip-faq-col">
					<div class="vip-faq-itm">
						<h4><i class="icon font-wenhao"></i> {$zbp->Config('downlee')->vipfaq5}</h4>
						<p>{$zbp->Config('downlee')->vipfaq6}</p>
					</div>
				</div>
				<div class="vip-faq-col">
					<div class="vip-faq-itm">
						<h4><i class="icon font-wenhao"></i> {$zbp->Config('downlee')->vipfaq7}</h4>
						<p>{$zbp->Config('downlee')->vipfaq8}</p>
					</div>
				</div>
			</div><!--end row-->
			<div class="vip-faq-desc">
				<span class="vip-badge-success">PS：</span> {$zbp->Config('downlee')->vipfaqps}
			</div>
		</div>
	</div>
</div>
{template:footer}