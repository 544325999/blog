<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{if downlee_is_mobile()}
{if strlen ( $zbp->Config('downlee')->sycmsadyd ) > 8}<div class="syimgid-box auto-list{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown" data-wow-delay="0.25s{/if}">
	<div id="syimgmedia" class="mediad post-syimg-m">{$zbp->Config('downlee')->sycmsadyd}</div>
</div>{/if}
{else}{if strlen ( $zbp->Config('downlee')->sycmsad ) > 8}<div class="syimgid-box auto-list{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown" data-wow-delay="0.25s{/if}">
	<div id="syimgmedia" class="mediad post-syimg-pc">{$zbp->Config('downlee')->sycmsad}</div>
</div>{/if}{/if}