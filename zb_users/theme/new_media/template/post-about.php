<?php echo'404';die();?>
<body>
{template:header}
{template:breadcrumb}
<div id="main">
<div class="main container"> {if $article.Metas.side=='1'}
  <div class="mainfull mb150"> {else}
    <div class="mainl2 mb150"> {/if}
      <div class="post">
        <div class="title">
          <h1>{$article.Title}</h1>
        </div>
        <div class="article_content"> {$article.Content} </div>
      </div>
      {if !$article.IsLock}
      <div class="post_comments"> {template:comments} </div>
      {/if} </div>
    <!--@ mainl-->
    {if $article.Metas.side=='1'}
    {else}
    <div class="mainr2" style="margin-bottom:15px;">
      <div style="padding:5px;"> <img src="{$host}zb_users/theme/{$theme}/style/images/lianxi.png" alt="联系我们"> </div>
      <ul>
        {$zbp->Config( 'new_media' )->gydhss}
      </ul>
    </div>
    {/if} </div>
</div>
