<?php echo'404';die();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">{if $zbp->Config('new_media')->seo}
{template:seo}{else}
<title>{$name}-{$title}</title>
{/if}
<link rel="stylesheet" type="text/css" href="{$host}zb_users/theme/{$theme}/style/style.css?v={$zbp->themeapp->version}"/> 
<link href="{$host}zb_users/theme/{$theme}/style/font/iconfont.css?v={$zbp->themeapp->version}.5" rel="stylesheet">
<script src="{$host}zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="{$host}zb_system/script/zblogphp.js" type="text/javascript"></script>
<script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script>
{if $zbp->Config( 'new_media' )->favicon}
<link rel="shortcut icon" href="{$zbp->Config( 'new_media' )->favicon}" type="image/x-icon">
{/if}
{$header}
{if $zbp->Config( 'new_media' )->code_on=='1'}{$zbp->Config( 'new_media' )->head_code}{/if}
</head>
<body>
    <div id="header">
      <div class="header container">
        <div class="logo"> <a href="{$host}" title="{$name}"><img src="{if $zbp->Config( 'new_media' )->logo}{$zbp->Config( 'new_media' )->logo}{else}{$host}zb_users/theme/{$theme}/style/images/logo.svg{/if}" alt="{$name}"></a> </div>
        <div id="monavber" class="nav" data-type="{$type}" data-infoid="{if $type=='category'}{if $category.RootID}{$category.RootID}{else}{$category.ID}{/if}{/if}{if $type=='article'}{if $article.Category.RootID}{$article.Category.RootID}{else}{$article.Category.ID}{/if}{/if}{if $type=='page'}{$article.ID}{/if}{if $type=='tag'}{$tag.ID}{/if}"> {if $zbp->Config('new_media')->login=='1'}
          {/if}
          <ul class="navbar">
            {module:navbar}
          </ul>
        </div>
        <div id="mnav"><i class="iconfont icon-app" ></i></div>
        <div id="search"><i class="iconfont icon-search"></i></div>
        <div class="search">
          <form name="search" method="get" action="{$host}search.php?act=search">
            <button type="submit" class="submit" value="搜索"><i class="iconfont icon-search"></i></button>
            <input type="text" name="q" placeholder="搜索关键词"/>
          </form>
        </div>
        </div>
    </div>
    {template:breadcrumb}
    {if $zbp->Config( 'new_media' )->ad1_on=='1'}
    <div class="ad-zone ad1">
        {$zbp->Config( 'new_media' )->ad1}
    </div>
    {/if}