<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{php}$zero1=strtotime (date('y-m-d')); //当前时间
$zero2=strtotime ($article->Time('y-m-d'));  //过期时间
$isnew=false;
if (ceil(($zero1-$zero2)/86400) < 1){
  $isnew=true;
};
if ($zbp->Config('downlee')->introSource =='1') {
	$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),50)).'...');
}else{
	$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),50)).'...');
}{/php}
<div class="syimgid-box auto-list{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown" data-wow-delay="0.25s{/if}">
	<div class="syimgid-item-l">
		<a href="{$article.Url}" title="{$article.Title}">{if $zbp->Config('downlee')->lazyoff=='1'}<img class="lazy" src="{$zbp->Config('downlee')->lazyimg}"  data-original="{downlee_firstimg($article)}"  alt="{$article.Title}" title="详细阅读：{$article.Title}">{else}<img class="lazy" src="{downlee_firstimg($article)}"  alt="{$article.Title}" title="详细阅读：{$article.Title}">{/if}</a>
	</div>
	<div class="syimgid-item-r">
		<h3><a href="{$article.Url}" title="{$article.Title}"><span class="badge arc_v5">置顶</span>{$article.Title}</a></h3>
		{if $zbp->CheckPlugin('LayCenter')}{$pay = $article->Pay}{if $pay->onsale}<p class="syimgid-item-price">促销特价：￥<span>{$pay->price}</span>{$lcp.config.currency_alias}</p>
		{else}<p class="syimgid-item-price">商品售价：￥<span>{$pay->price}</span>{$lcp.config.currency_alias}</p>{/if}
		{elseif strlen ( $article.Metas.price ) > 0}<p class="syimgid-item-price">售价：￥<span>{$article->Metas->price}</span>积分</p>
		{else}<p class="syimgid-item-price wujia">暂无标价</p>{/if}
		<div class="syimgid-item-other">
			{$intro}
		</div>
		<div class="syimgid-item-b">
			<a href="{if strlen ( $article.Metas.showhow ) > 8}{$host}zb_system/cmd.php?act=ajax&hk_url={base64_encode($article->Metas->showhow)}{/if}" title="查看演示" rel="nofollow" class="syimgid-item-demo" target="_blank">{if strlen ( $article.Metas.showhow ) > 8}查看演示{else}查看详情{/if}</a>
			<a href="{$article.Url}" class="syimgid-item-btn" title="{$article.Url}"><i class="iconfont icon-wenhao mr5"></i>下载资源</a>
		</div>
	</div>
</div>