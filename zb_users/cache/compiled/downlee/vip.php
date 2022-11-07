<?php  /* Template Name:会员介绍单页 * Template Type:page,vip */  ?><?php  include $this->GetTemplate('header');  ?>
<div class="banner-vip-wrap" style="background-image:url(<?php  echo $zbp->Config('downlee')->viptop;  ?>);">
	<div class="container">
		<div class="vip-user-info">
			<div class="vip-login-wrap">会员VIP特权</div>
			<div class="vip-i-p">
				<?php  echo $zbp->Config('downlee')->viptoptq;  ?>
			</div>
			<a class="support-btn" href="<?php if ($zbp->CheckPlugin('LayCenter')) { ?><?php echo $lcp->BuildUrl('User').'#/User/Invest/to=VIP' ?><?php }else{  ?><?php  echo $zbp->Config('downlee')->viptqcz;  ?><?php } ?>" id="pay-vip2">立即充值</a>
		</div>
	</div>
</div>
<div class="vip-main-content">
	<div class="main-content vip-main container clearfix">
		<div class="single box-show">
			<article class="single-entry">
				<?php  echo $article->Content;  ?>
			</article>
		</div>
	</div>
</div>
<div class="vip-theme-section"><!--会员各项级别-->
	<div class="vip-module" style="background-image:url(<?php  echo $zbp->Config('downlee')->vipcostbg;  ?>);">
		<div class="container vip-relative">
			<div class="vip-col-lg">
				<h3 class="h3-text"><i class="icon font-selectionfill"></i>加入超级VIP会员，海量资源免费下载使用</h3>
				<?php if ($zbp->CheckPlugin('LayCenter')) { ?><p class="text-white">本站已有 <span class="badge badge-pill badge-info"><?php echo $lcp->sql('Member',true)->Count(array(array('=','mem_LayCenter_VipType',4))) ?></span> 位优秀的VIP会员加入</p>
				<?php }else{  ?><p class="text-white">本站VIP会员期待您的加盟，充会员享特权！</p><?php } ?>
			</div>
			<div class="vip-section-box">
				<div class="vip-col-item">
					<div class="vip-col-card text-green">
                        <div class="vip-card-header">
							<div class="vip-card-price"><span class="font-weight-bolder"><?php if ($zbp->CheckPlugin('LayCenter')) { ?>￥<?php  echo $lcp->config->vip_month_price;  ?><?php }else{  ?>￥<?php  echo $zbp->Config('downlee')->vipmcost;  ?><?php } ?></span></div>
                            <span class="vip-card-day"><i class="icon font-zuanshi"></i> 月卡VIP / 31天</span>
						</div>
                        <div class="vip-card-body">
                            <ul class="vip-list-muted">
								<?php  echo $zbp->Config('downlee')->vipmcostj;  ?>
							</ul>
						</div>
                        <div class="vip-card-footer">
                            <a class="vip-btn-success" href="<?php if ($zbp->CheckPlugin('LayCenter')) { ?><?php echo $lcp->BuildUrl('User').'#/User/Invest/to=VIP' ?><?php }else{  ?><?php  echo $zbp->Config('downlee')->vipcosturl;  ?><?php } ?>"><i class="icon font-zuanshi"></i> 升级月卡VIP会员</a>
                        </div>
                    </div>
				</div>
				<div class="vip-col-item">
					<div class="vip-col-card text-rad">
                        <div class="vip-card-header">
							<div class="vip-card-price"><span class="font-weight-bolder"><?php if ($zbp->CheckPlugin('LayCenter')) { ?>￥<?php  echo $lcp->config->vip_year_price;  ?><?php }else{  ?>￥<?php  echo $zbp->Config('downlee')->vipycost;  ?><?php } ?></span></div>
                            <span class="vip-card-day"><i class="icon font-zuanshi"></i> 年卡VIP / 366天</span>
						</div>
                        <div class="vip-card-body">
                            <ul class="vip-list-muted">
								<?php  echo $zbp->Config('downlee')->vipycostj;  ?>
							</ul>
						</div>
                        <div class="vip-card-footer">
                            <a class="vip-btn-success" href="<?php if ($zbp->CheckPlugin('LayCenter')) { ?><?php echo $lcp->BuildUrl('User').'#/User/Invest/to=VIP' ?><?php }else{  ?><?php  echo $zbp->Config('downlee')->vipcosturl;  ?><?php } ?>"><i class="icon font-zuanshi"></i> 升级年卡VIP会员</a>
                        </div>
                    </div>
				</div>
				<div class="vip-col-item">
					<div class="vip-col-card text-yellow">
                        <div class="vip-card-header">
							<div class="vip-card-price"><span class="font-weight-bolder"><?php if ($zbp->CheckPlugin('LayCenter')) { ?>￥<?php  echo $lcp->config->vip_ever_price;  ?><?php }else{  ?>￥<?php  echo $zbp->Config('downlee')->vipscost;  ?><?php } ?></span></div>
                            <span class="vip-card-day"><i class="icon font-zuanshi"></i> 超级VIP / 永久</span>
						</div>
                        <div class="vip-card-body">
                            <ul class="vip-list-muted">
								<?php  echo $zbp->Config('downlee')->vipscostj;  ?>
							</ul>
						</div>
                        <div class="vip-card-footer">
                            <a class="vip-btn-success" href="<?php if ($zbp->CheckPlugin('LayCenter')) { ?><?php echo $lcp->BuildUrl('User').'#/User/Invest/to=VIP' ?><?php }else{  ?><?php  echo $zbp->Config('downlee')->vipcosturl;  ?><?php } ?>"><i class="icon font-zuanshi"></i> 升级超级VIP会员</a>
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
			<li class="vip-slogan-box"><i class="icon font-jishufuwu"></i><div class="vip-slogan-text"><?php  echo $zbp->Config('downlee')->viptqxq;  ?></div></li>
			<li class="vip-slogan-box"><i class="icon font-wendang1"></i><div class="vip-slogan-text"><?php  echo $zbp->Config('downlee')->viptqxq2;  ?></div></li>
			<li class="vip-slogan-box"><i class="icon font-zhuti"></i><div class="vip-slogan-text"><?php  echo $zbp->Config('downlee')->viptqxq3;  ?></div></li>
			<li class="vip-slogan-box"><i class="icon font-yun"></i><div class="vip-slogan-text"><?php  echo $zbp->Config('downlee')->viptqxq4;  ?></div></li>
			<li class="vip-slogan-box"><i class="icon font-jishufuwushang1"></i><div class="vip-slogan-text"><?php  echo $zbp->Config('downlee')->viptqxq5;  ?></div></li>
			<li class="vip-slogan-box"><i class="icon font-vip"></i><div class="vip-slogan-text"><?php  echo $zbp->Config('downlee')->viptqxq6;  ?></div></li>
		</ul>
	</div>
</div>
<div class="vip-theme-faq"><!--问题答疑-->
	<div class="vip-module" style="background-image:url(<?php  echo $zbp->Config('downlee')->vipfaqbg;  ?>);">
		<div class="container vip-faq-main">
			<h4 class="vip-faq-title">会员常见问题及帮助</h4>
			<div class="row">
				<div class="vip-faq-col">
					<div class="vip-faq-itm">
						<h4><i class="icon font-wenhao"></i> <?php  echo $zbp->Config('downlee')->vipfaq;  ?></h4>
						<p><?php  echo $zbp->Config('downlee')->vipfaq2;  ?></p>
					</div>
				</div>
				<div class="vip-faq-col">
					<div class="vip-faq-itm">
						<h4><i class="icon font-wenhao"></i> <?php  echo $zbp->Config('downlee')->vipfaq3;  ?></h4>
						<p><?php  echo $zbp->Config('downlee')->vipfaq4;  ?></p>
					</div>
				</div>
				<div class="vip-faq-col">
					<div class="vip-faq-itm">
						<h4><i class="icon font-wenhao"></i> <?php  echo $zbp->Config('downlee')->vipfaq5;  ?></h4>
						<p><?php  echo $zbp->Config('downlee')->vipfaq6;  ?></p>
					</div>
				</div>
				<div class="vip-faq-col">
					<div class="vip-faq-itm">
						<h4><i class="icon font-wenhao"></i> <?php  echo $zbp->Config('downlee')->vipfaq7;  ?></h4>
						<p><?php  echo $zbp->Config('downlee')->vipfaq8;  ?></p>
					</div>
				</div>
			</div><!--end row-->
			<div class="vip-faq-desc">
				<span class="vip-badge-success">PS：</span> <?php  echo $zbp->Config('downlee')->vipfaqps;  ?>
			</div>
		</div>
	</div>
</div>
<?php  include $this->GetTemplate('footer');  ?>