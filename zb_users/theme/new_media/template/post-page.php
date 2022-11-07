<div class="main container-w">
  <div class="art-post">
    <div class="title">
      <h1>{$article.Title}</h1>
      <div class="info"> <span><a href="{$article.Author.Url}"><i class="iconfont icon-user"></i>{$article.Author.StaticName}</a></span> <span><a href="{$article.Category.Url}"><i class="iconfont icon-modular"></i>{$article.Category.Name}</a></span> <span><i class="iconfont icon-time"></i>{$article.Time('Y-m-d H:i:s')}</span> <span><i class="iconfont icon-browse"></i>{$article.ViewNums}</span> <span><i class="iconfont icon-comment"></i>{$article.CommNums}</span></div>
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
    <div class="art-content"> {if $zbp->Config( 'new_media' )->gg11on=='1'}{$zbp->Config( 'new_media' )->gg11}{/if}
      <article class="single-post">
        <div class="entry"> {$article.Content} </div>
      </article>
      {if $zbp->Config( 'new_media' )->gg12on=='1'}{$zbp->Config( 'new_media' )->gg12}{/if} </div>
  </div>
  
  {if !$article.IsLock}
  <div class="post_comments"> {template:comments} </div>
  {/if} 
</div>
