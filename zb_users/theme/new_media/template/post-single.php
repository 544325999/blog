<?php echo'404';die();?>
<div class="main container-w cl">
    <div class="mainl">
      <div class="art-post">
        <div class="title">
          <h1>{$article.Title}</h1>
          <div class="info"> <span><a href="{$article.Author.Url}"><i class="iconfont icon-user-fill"></i>{$article.Author.StaticName}</a></span> <span><a href="{$article.Category.Url}"><i class="iconfont icon-crossborder-fill"></i>{$article.Category.Name}</a></span> <span><i class="iconfont icon-calendar-fill"></i>{$article.Time('Y-m-d')}</span> <span><i class="iconfont icon-eye-display-fill"></i>{$article.ViewNums}</span> <span><i class="iconfont icon-message-fill"></i>{$article.CommNums}</span></div>
        </div>
        {php}
        if($article->Metas->pic){
        $imgurl = $article->Metas->pic;
        }elseif($zbp->Config('new_media')->thumb2){
        $imgurl = new_media_thumb2($article,230,145,0);
        }else{
        $imgurl = new_media_thumbnail($article) ;     	  	   
        }
        {/php}
        <div class="art-content"> 
            {if $zbp->Config( 'new_media' )->ad3_on=='1'}
            <div class="ad-zone ad3">
                {$zbp->Config( 'new_media' )->ad3}
            </div>
            {/if}
          <article class="single-post">
            <div class="entry"> {$article.Content} </div>
          </article>
            {if $zbp->Config( 'new_media' )->ad4_on=='1'}
            <div class="ad-zone ad4">
                {$zbp->Config( 'new_media' )->ad4}
            </div>
            {/if}
          </div>
       			{if $article.Tags}<span class="tag"><i class="iconfont icon-discount" style="font-size:12px;font-weight:bold;opacity:.7;"></i>{foreach $article.Tags as $tag}<a href="{$tag.Url}"  target="_blank">{$tag.Name}</a>{/foreach}</span>{/if}
        
          <ul class="cl PrevNext">
            <li class="fl" style="max-width: 47%;"><span class="prev">上一篇：</span>{if $article.Prev} <a  href="{$article.Prev.Url}" title="{$article.Prev.Title}">{$article.Prev.Title}</a> {else}没有了{/if} </li>
            <li class="fr" style="max-width: 47%;"><span class="next">下一篇：</span>{if $article.Next} <a  href="{$article.Next.Url}" title="{$article.Next.Title}">{$article.Next.Title}</a> {else}没有了{/if} </li>
          </ul>
      </div>
      {if $zbp->Config('new_media')->post_related=='1'}
      <div class="related">
        <h4 class="bar">相关文章</h4>
        <ul>
          {if $zbp->Config( 'new_media' )->relatedstyle=='2'}
          {$array=GetList(8,null,null,null,null,null,array('is_related'=>$article->ID));}
          {foreach $array as $related}
          {if isset($related)}
          <li> <a href="{$related.Url}">
            <div class="img-box img"><img src="{if $related->Metas->pic}{$related->Metas->pic}{else}{new_media_thumbnail($related)}{/if}" alt="{$related.Title}"></div>
            <p>{$related.Title}</p>
            </a> </li>
          {/if}
          {/foreach}
          {else}
          {foreach GetList(8,$article.Category.ID) as $related}
          <li> <a href="{$related.Url}">
            <div class="img-box img"><img src="{if $related->Metas->pic}{$related->Metas->pic}{elseif $zbp->Config('new_media')->thumb2}{new_media_thumb2($related,210,160,0)}{else}{new_media_thumbnail($related)}{/if}" alt="{$related.Title}"></div>
            <p>{$related.Title}</p>
            </a> </li>
          {/foreach}
          {/if}
        </ul>
      </div>
      {/if}
      
      {if !$article.IsLock}
      <div class="post_comments" id="comments"> {template:comments} </div>
      {/if} 
    </div>
    {if $article.Metas.side=='1'}
    {else}
    {template:post-sidebar}
    {/if} 
</div>
