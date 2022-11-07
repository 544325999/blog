<!DOCTYPE html>
<html<?php if ($zbp->Config('downlee')->grayscale=='1') { ?> class="html-<?php  echo $type;  ?>"<?php } ?> xml:lang="<?php  echo $lang['lang_bcp47'];  ?>" lang="<?php  echo $lang['lang_bcp47'];  ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta name="applicable-device" content="pc,mobile">
	<meta name="renderer" content="webkit" />
    <meta name="force-rendering" content="webkit" />
	<title>抱歉，您访问的页面不存在 - <?php  echo $name;  ?></title>
	<meta name="Keywords" content="<?php  echo $zbp->Config('downlee')->Keywords;  ?>">
	<meta name="description" content="<?php  echo $zbp->Config('downlee')->Description;  ?>">
	<script src="<?php  echo $host;  ?>zb_system/script/jquery-2.2.4.min.js"></script>
    <script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js"></script>
    <script src="<?php  echo $host;  ?>zb_system/script/c_html_js_add.php"></script>
    <?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?><link rel="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/libs/animate.css" type="text/css" media="all" />
    <?php } ?><link href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/<?php  echo $style;  ?>.css?v=<?php  echo $zbp->themeinfo['modified'];  ?>" type="text/css" media="all" rel="stylesheet" />
	<link rel="shortcut icon" href="<?php  echo $zbp->Config('downlee')->favicon;  ?>" type="image/x-icon">
	<link rel="alternate" type="application/rss+xml" href="<?php  echo $feedurl;  ?>" title="<?php  echo $zbp->Config('downlee')->webtitle;  ?>" />
    <?php if ($zbp->Config('downlee')->uncodeoff=='1') { ?><?php  echo $zbp->Config('downlee')->uncode;  ?>
    <?php } ?><?php if ($zbp->Config('downlee')->Displayds1=='1') { ?><style type="text/css"><?php  echo $zbp->Config('downlee')->diystyle;  ?></style>
    <?php } ?><?php if ($zbp->Config('downlee')->grayscale=='1') { ?><?php if ($zbp->Config('downlee')->allgrayscale=='1') { ?><script>(function() {var date = new Date();if (date.getMonth()+1 === <?php  echo $zbp->Config('downlee')->getMonth;  ?> && date.getDate() === <?php  echo $zbp->Config('downlee')->getDate;  ?>)$('head').append('<style>html{filter:grayscale(100%);}*{filter:gray;}html body{background-image:none!important;background-color:#f1f1f1!important;}</style>')})();</script><?php }else{  ?><?php if ($type == 'index') { ?><script>(function() {var date = new Date();if (date.getMonth()+1 === <?php  echo $zbp->Config('downlee')->getMonth;  ?> && date.getDate() === <?php  echo $zbp->Config('downlee')->getDate;  ?>)$('head').append('<style>html.html-index{filter:grayscale(100%);}*{filter:gray;}html.html-index body{background-image:none!important;background-color:#f1f1f1!important;}</style>')})();</script><?php } ?><?php } ?><?php } ?>
<!--[if lt IE 9]><script src="https://cdn.staticfile.org/html5shiv/3.7.0/html5shiv.js"></script><![endif]-->
<?php  echo $header;  ?>
</head>
<body class="home home-404<?php if (GetVars('night','COOKIE') ) { ?> night<?php } ?><?php if (GetVars('sidehide','COOKIE') ) { ?> sidehide<?php } ?>" style="background-image:url(<?php  echo $zbp->Config('downlee')->bodybg;  ?>);">
<div id="pjax_on">
	<header class="top-header">
		<div class="top-bar">
			<div class="new-header container clearfix">
				<div class="top-bar-left pull-left navlogo">
					<a href="<?php  echo $host;  ?>" class="logo box"><img src="<?php  echo $zbp->Config('downlee')->weblogo;  ?>" class="logo-light" id="logo-light" alt="<?php  echo $name;  ?>"><img src="<?php  echo $zbp->Config('downlee')->yjlogo;  ?>" class="logo-dark d-none" id="logo-dark" alt="<?php  echo $name;  ?>"><?php if ($zbp->Config('downlee')->flashlights=='1') { ?><b class="shan"></b><?php } ?></a>
				</div>
				<div class="top-bar-left header-nav fl" data-type="<?php if ($type=='category') { ?>category<?php }elseif($type=='article') {  ?>article<?php }elseif($type=='page') {  ?>page<?php }else{  ?>index<?php } ?>" data-infoid="<?php if ($type=='index'&&$page=='1') { ?>index<?php }elseif($type=='category') {  ?><?php  echo $category->ID;  ?><?php }elseif($type=='article') {  ?><?php  echo $article->Category->ID;  ?><?php }elseif($type=='page') {  ?><?php  echo $article->ID;  ?><?php }else{  ?><?php } ?>">
					<div class="nav-sjlogo">
						<?php if ($zbp->Config('downlee')->fjzhon=='1') { ?><a class="top-tnrt" href="javascript:translatePage();" id="zh_tw">繁</a>
						<?php } ?><i class="nav-bar"><span></span><span></span><span></span></i>
						<i class="icon font-search top-search"></i>
					</div>
					<form name="search" class="m_searchform" method="post" action="<?php  echo $host;  ?>zb_system/cmd.php?act=search">
						<input class="searchInput" type="text" name="q" size="11" placeholder="请输入搜索内容..." value="" id="ms" />
						<input type="submit" class="btn_m" value="搜索">
					</form>
					<aside class="mobile_aside mobile_nav">
						<?php if (downlee_is_mobile() && $zbp->Config('downlee')->toploginoff=='1') { ?><div class="mobile_top_nav" style="background-image:url(<?php  echo $zbp->Config('downlee')->mnavtopbg;  ?>);">
							<?php if ($user->ID>0) { ?><a class="m_top_login" href="<?php  echo $user->Url;  ?>"><img class="widget-about-image" src="<?php  echo $user->Avatar;  ?>" alt="<?php  echo $user->StaticName;  ?>" height="70" width="70"></a>
							<div class="m_top_name"><h3><?php  echo $user->StaticName;  ?><span class="autlv aut-<?php  echo $user->Level;  ?> vs">V</span></h3><a href="<?php  echo $host;  ?>zb_system/admin/index.php?act=admin">后台管理</a><?php if ($user->Level<=4) { ?><a href="<?php  echo $host;  ?>zb_system/admin/edit.php?act=ArticleEdt">新建文章</a><?php } ?></div>
							<?php }else{  ?><a class="m_top_login" href=""><img class="widget-about-image" src="<?php  echo $zbp->Config('downlee')->toportrait;  ?>" alt="游客默认头像" height="70" width="70"></a><div class="m_top_name"><h3>游客,您好<span class="autlv aut-0 vs">V</span></h3><a href="<?php  echo $zbp->Config('downlee')->topregister;  ?>">会员登录</a><?php if ($zbp->Config('downlee')->qqloginoff=='1') { ?><a href="<?php  echo $zbp->Config('downlee')->qqlogin;  ?>">QQ登录</a><?php } ?></div>
						<?php } ?></div><?php } ?>
						<ul id="nav" class="top-bar-menu nav-pills">
							<?php  if(isset($modules['navbar'])){echo $modules['navbar']->Content;}  ?>
						</ul>
						<?php if (downlee_is_mobile()) { ?><?php  include $this->GetTemplate('sidebar5');  ?><?php } ?>
					</aside>
				</div>
				<div class="top-bar-right text-right fr">
					<div class="top-admin">
						<div class="search_top">
							<a class="search_btn" href="javascript:;" title="点击搜索"><i class="icon font-search"></i></a>
							<div class="top_search"><form method="post" name="search" action="<?php  echo $host;  ?>zb_system/cmd.php?act=search" class="t-searchform"><input type="text" name="q" placeholder="输入关键字..." class="text"><input type="submit" class="btn" value="搜索"></form></div>
						</div>
						<?php if ($zbp->Config('downlee')->fjzhon=='1') { ?><a class="top-tnrt" href="javascript:translatePage();" id="zh_tw">繁</a>
						<?php } ?><?php if ($zbp->Config('downlee')->toploginoff=='1') { ?><div class="login"><?php downlee_Plugin_Html_login() ?></div><?php } ?>
					</div>
				</div>
			</div>
			<div id="percentageCounter"></div>
		</div>
	</header>
	<div class="content-error">
		<div class="error-title-bg"></div>
		<h1 class="error-text">404</h1>
		<h4 class="error-info">哎呀！ 该页面无法找到。</h4>
		<a class="error-muted" href="javascript:history.back()" title="返回">返回上一页</a>
	</div>
<?php  include $this->GetTemplate('footer');  ?>