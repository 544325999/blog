<?php echo'404';die();?>
{if $pagebar}
<div class="pagebar">
	{foreach $pagebar.buttons as $k=>$v}
	{if $pagebar.PageNow==$k}
	<span>{$k}</span>
	{elseif $k=='‹‹' and $pagebar.PageNow!=$pagebar.PageFirst}
	<a href="{$v}">首页</a>
	{elseif $k=='‹‹' and $pagebar.PageNow==$pagebar.PageFirst}
	{elseif $k=='››' and $pagebar.PageNow==$pagebar.PageLast}
	{elseif $k=='››' and $pagebar.PageNow!=$pagebar.PageLast}
	<a href="{$v}">尾页</a>
	{elseif $k=='‹'}
	<a href="{$v}"><i class="iconfont icon-left"></i></a>
	{elseif $k=='›'}
	<a href="{$v}" class="next"><i class="iconfont icon-right"></i></a>
	{else}
	<a href="{$v}">{$k}</a>
	{/if}
	{/foreach}
</div>
{/if}