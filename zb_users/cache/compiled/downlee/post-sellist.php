<?php $zero1=strtotime (date('y-m-d')); //当前时间
$zero2=strtotime ($article->Time('y-m-d'));  //过期时间
$isnew=false;
if (ceil(($zero1-$zero2)/86400) < 1){
  $isnew=true;
};
if ($zbp->Config('downlee')->introSource =='1') {
	$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),50)).'...');
}else{
	$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),50)).'...');
} ?>
<div class="syimgid-box auto-list<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown" data-wow-delay="0.25s<?php } ?>">
	<div class="syimgid-item-l">
		<a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>"><?php if ($zbp->Config('downlee')->lazyoff=='1') { ?><img class="lazy" src="<?php  echo $zbp->Config('downlee')->lazyimg;  ?>"  data-original="<?php  echo downlee_firstimg($article);  ?>"  alt="<?php  echo $article->Title;  ?>" title="详细阅读：<?php  echo $article->Title;  ?>"><?php }else{  ?><img class="lazy" src="<?php  echo downlee_firstimg($article);  ?>"  alt="<?php  echo $article->Title;  ?>" title="详细阅读：<?php  echo $article->Title;  ?>"><?php } ?></a>
	</div>
	<div class="syimgid-item-r">
		<h3><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>"><?php  echo $article->Title;  ?></a></h3>
		<?php if ($zbp->CheckPlugin('LayCenter')) { ?><?php  $pay = $article->Pay;  ?><?php if ($pay->onsale) { ?><p class="syimgid-item-price">促销特价：￥<span><?php  echo $pay->price;  ?></span><?php  echo $lcp->config->currency_alias;  ?></p>
		<?php }else{  ?><p class="syimgid-item-price">商品售价：￥<span><?php  echo $pay->price;  ?></span><?php  echo $lcp->config->currency_alias;  ?></p><?php } ?>
		<?php }elseif(strlen ( $article->Metas->price ) > 0) {  ?><p class="syimgid-item-price">售价：￥<span><?php  echo $article->Metas->price;  ?></span>积分</p>
		<?php }else{  ?><p class="syimgid-item-price wujia">暂无标价</p><?php } ?>
		<div class="syimgid-item-other">
			<?php  echo $intro;  ?>
		</div>
		<div class="syimgid-item-b">
			<a href="<?php if (strlen ( $article->Metas->showhow ) > 8) { ?><?php  echo $host;  ?>zb_system/cmd.php?act=ajax&hk_url=<?php  echo base64_encode($article->Metas->showhow);  ?><?php } ?>" title="查看演示" rel="nofollow" class="syimgid-item-demo" target="_blank"><?php if (strlen ( $article->Metas->showhow ) > 8) { ?>查看演示<?php }else{  ?>查看详情<?php } ?></a>
			<a href="<?php  echo $article->Url;  ?>" class="syimgid-item-btn" title="<?php  echo $article->Url;  ?>"><i class="iconfont icon-wenhao mr5"></i>下载资源</a>
		</div>
	</div>
</div>