{* Template Name:首页模板 * Template Type:index-cms *}<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>
{if $type=='index'}
	{template:index-cms}
{elseif $type=='author' || $type=='date' || $type=='tag'}
    {template:post-tag}
{else}
	{template:catalog}
{/if}