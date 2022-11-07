<?php echo'404';die();?>{template:header}
{if $type=='index'&&$page=='1'}
    {template:post-cms}
{else}
	{template:post-category}
{/if}
{template:footer}