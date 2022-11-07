<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?><!DOCTYPE html>
<html{if $zbp->Config('downlee')->grayscale=='1'} class="html-{$type}"{/if} xml:lang="{$lang['lang_bcp47']}" lang="{$lang['lang_bcp47']}">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta name="applicable-device" content="pc,mobile">
	<meta name="renderer" content="webkit" />
    <meta name="force-rendering" content="webkit" />
    {if $zbp->Config('downlee')->zdywzseo=='0'}<title>{if $type=='article' || $type=='page'}{$title}-{$name}{else}{$name}-{$title}{/if}</title>
    {else}{template:header_seo}
{/if}{if $zbp->Config('downlee')->instanton=='1'}<script src="{$zbp->Config('downlee')->instant}" type="module"></script>
	{/if}<script src="{$host}zb_system/script/jquery-2.2.4.min.js"></script>
    <script src="{$host}zb_system/script/zblogphp.js"></script>
    <script src="{$host}zb_system/script/c_html_js_add.php"></script>
    {if $type=='index' && $zbp->Config('downlee')->slideoff=='1'}<script src="{$host}zb_users/theme/{$theme}/script/swiper.min.js"></script>
    <link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/libs/swiper.min.css" media="all" />
    {/if}{if $zbp->Config('downlee')->gdtxoff=='1'}<link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/libs/animate.css" type="text/css" media="all" />
    {/if}{if ($zbp->Config('downlee')->imgbox=='1') && ($type=='article' || $type=='page')}<link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/libs/fancybox.css" type="text/css" media="all" />
    {/if}<link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/{$style}.css?v={$zbp->themeinfo['modified']}" media="all" />
    <link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/libs/sweetalert.css" media="all" />
	<link rel="shortcut icon" href="{$zbp->Config('downlee')->favicon}" type="image/x-icon">
    <link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$zbp->Config('downlee')->webtitle}" />
    {if $zbp->Config('downlee')->uncodeoff=='1'}{$zbp->Config('downlee')->uncode}
    {/if}{if $zbp->Config('downlee')->Displayds1=='1'}<style type="text/css">{$zbp->Config('downlee')->diystyle}</style>
    {/if}{if $zbp->Config('downlee')->grayscale=='1'}{if $zbp->Config('downlee')->allgrayscale=='1'}<script>(function() {var date = new Date();if (date.getMonth()+1 === {$zbp->Config('downlee')->getMonth} && date.getDate() === {$zbp->Config('downlee')->getDate})$('head').append('<style>html{filter:grayscale(100%);}*{filter:gray;}html body{background-image:none!important;background-color:#f1f1f1!important;}</style>')})();</script>{else}{if $type == 'index'}<script>(function() {var date = new Date();if (date.getMonth()+1 === {$zbp->Config('downlee')->getMonth} && date.getDate() === {$zbp->Config('downlee')->getDate})$('head').append('<style>html.html-index{filter:grayscale(100%);}*{filter:gray;}html.html-index body{background-image:none!important;background-color:#f1f1f1!important;}</style>')})();</script>{/if}{/if}{/if}
<!--[if lt IE 9]><script src="https://cdn.staticfile.org/html5shiv/3.7.0/html5shiv.js"></script><![endif]-->
{$header}
</head>
<body class="home home-{$type}{if GetVars('night','COOKIE') } night{/if}{if GetVars('sidehide','COOKIE') } sidehide{/if}" style="background-image:url({$zbp->Config('downlee')->bodybg});">
	<header class="top-header{if $zbp->Config('downlee')->topnavbaroff=='1'} topnavbar{/if}">
		{if $zbp->Config('downlee')->topnavbaroff=='1'}<nav id="top-header">
			<div class="top-nav container clearfix">
				<ul class="top-menu-fl">
					{$zbp->Config('downlee')->topnavbarfl}
				</ul>
				<ul class="top-menu-fr">
					{$zbp->Config('downlee')->topnavbarfr}
				</ul>
			</div>
		</nav>{/if}
		<div class="top-bar">
			<div class="new-header container clearfix">
				<div class="top-bar-left pull-left navlogo">
					<a href="{$host}" class="logo box"><img src="{$zbp->Config('downlee')->weblogo}" class="logo-light" id="logo-light" alt="{$name}"><img src="{$zbp->Config('downlee')->yjlogo}" class="logo-dark d-none" id="logo-dark" alt="{$name}">{if $zbp->Config('downlee')->flashlights=='1'}<b class="shan"></b>{/if}</a>
				</div>
				<div class="top-bar-left header-nav fl" data-type="{if $type=='category'}category{elseif $type=='article'}article{elseif $type=='page'}page{else}index{/if}" data-infoid="{if $type=='index'&&$page=='1'}index{elseif $type=='category'}{$category.ID}{elseif $type=='article'}{$article.Category.ID}{elseif $type=='page'}{$article.ID}{else}{/if}">
					<div class="nav-sjlogo">
						{if $zbp->Config('downlee')->fjzhon=='1'}<a class="top-tnrt" href="javascript:translatePage();" id="zh_tw">繁</a>
						{/if}<i class="nav-bar"><span></span><span></span><span></span></i>
						<i class="icon font-search top-search"></i>
					</div>
					<form name="search" class="m_searchform" method="post" action="{$host}zb_system/cmd.php?act=search">
						<input class="searchInput" type="text" name="q" size="11" placeholder="请输入搜索内容..." value="" id="ms" />
						<input type="submit" class="btn_m" value="搜索">
					</form>
					<aside class="mobile_aside mobile_nav">
						{if downlee_is_mobile() && $zbp->Config('downlee')->toploginoff=='1'}<div class="mobile_top_nav" style="background-image:url({$zbp->Config('downlee')->mnavtopbg});">
							{if $user.ID>0}<a class="m_top_login" href="{$user.Url}"><img class="widget-about-image" src="{$user.Avatar}" alt="{$user.StaticName}" height="70" width="70"></a>
							<div class="m_top_name"><h3>{$user.StaticName}<span class="autlv aut-{$user.Level} vs">V</span></h3><a href="{$host}zb_system/admin/index.php?act=admin">后台管理</a>{if $user.Level<=4}<a href="{$host}zb_system/admin/edit.php?act=ArticleEdt">新建文章</a>{/if}</div>
							{else}<a class="m_top_login" href=""><img class="widget-about-image" src="{$zbp->Config('downlee')->toportrait}" alt="游客默认头像" height="70" width="70"></a><div class="m_top_name"><h3>游客,您好<span class="autlv aut-0 vs">V</span></h3><a href="{$zbp->Config('downlee')->topregister}">会员登录</a>{if $zbp->Config('downlee')->qqloginoff=='1'}<a href="{$zbp->Config('downlee')->qqlogin}">QQ登录</a>{/if}</div>
						{/if}</div>{/if}
						<ul id="nav" class="top-bar-menu nav-pills">
							{module:navbar}
						</ul>
						{if downlee_is_mobile()}{template:sidebar5}{/if}
					</aside>
				</div>
				<div class="top-bar-right text-right fr">
					<div class="top-admin">
						<div class="search_top">
							<a class="search_btn" href="javascript:;" title="点击搜索"><i class="icon font-search"></i></a>
							<div class="top_search"><form method="post" name="search" action="{$host}zb_system/cmd.php?act=search" class="t-searchform"><input type="text" name="q" placeholder="输入关键字..." class="text"><input type="submit" class="btn" value="搜索"></form></div>
						</div>
						{if $zbp->Config('downlee')->fjzhon=='1'}<a class="top-tnrt" href="javascript:translatePage();" id="zh_tw">繁</a>
						{/if}{if $zbp->Config('downlee')->toploginoff=='1'}<div class="login">{php}downlee_Plugin_Html_login(){/php}</div>{/if}
					</div>
				</div>
			</div>
			<div id="percentageCounter"></div>
		</div>
	</header>