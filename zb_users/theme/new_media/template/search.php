<?php echo'404';die();?>
{template:header}
<div class="main container-w cl">
	<div class="main-left">
		<div class="art-list cl">
			{foreach $articles as $key=>$article}
			{if $article.IsTop}{template:post-istop}{else}{template:post-multi}{/if}{/foreach}
		</div>
		{template:pagebar}
	</div>
	{template:post-sidebar}
</div>
{template:footer}