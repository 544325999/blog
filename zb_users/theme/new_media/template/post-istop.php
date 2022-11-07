<?php echo'404';die();?>
{$i=$key}
{if $i%4==3}
<article class="d-flex flex-wrap">
	<div class="img">
		<a href="{$article.Url}"><span class="img-box" data-ratio="16:16"><img src="{if $article->Metas->pic}{$article->Metas->pic}{elseif $zbp->Config('new_media')->thumb2}{new_media_thumb2($article,278,220,0)}{else}{new_media_thumbnail($article)}{/if}" alt="{$article.Title}" style="border-bottom:#eee solid 1px;"></span></a>
	</div>
	<div class="box">
    	<h2><a href="{$article.Url}"><span style="color:#ca3636">[顶]</span>{$article.Title}</a></h2>
    	<div class="info">
    	    <span class="s"><a class="category brightness transition br" href="{$article.Category.Url}" target="_blank">{$article.Category.Name}</a></span>
    	    <span class="s"><img class="avatar" src="{$article.Author.Avatar}" alt="用户头像"/><small class="txt">{$article.Author.StaticName}</small></span>
        	<span class="s">{$article.Time('Y年d月m日')}</span>
        	<span class="s"><i class="iconfont icon-eye-display-fill"></i>{$article.ViewNums}</span>
    	</div>
    	<p>{new_media_intro($article,1,125,'...')}</p>
	</div>
</article>
{else}
<article class="d-flex flex-wrap">
	<div class="box">
    	<h2><a href="{$article.Url}"><span style="color:#ca3636">[顶]</span>{$article.Title}</a></h2>
    	<div class="info">
    	    <span class="s"><a class="category brightness transition br" href="{$article.Category.Url}" target="_blank">{$article.Category.Name}</a></span>
    	    <span class="s"><img class="avatar" src="{$article.Author.Avatar}" alt="用户头像"/><small class="txt">{$article.Author.StaticName}</small></span>
        	<span class="s">{$article.Time('Y年d月m日')}</span>
        	<span class="s"><i class="iconfont icon-eye-display-fill"></i>{$article.ViewNums}</span>
    	</div>
    	<p>{new_media_intro($article,1,125,'...')}</p>
	</div>
	<div class="img">
		<a href="{$article.Url}"><span class="img-box" data-ratio="16:16"><img src="{if $article->Metas->pic}{$article->Metas->pic}{elseif $zbp->Config('new_media')->thumb2}{new_media_thumb2($article,278,220,0)}{else}{new_media_thumbnail($article)}{/if}" alt="{$article.Title}" style="border-bottom:#eee solid 1px;"></span></a>
	</div>
</article>
{/if}