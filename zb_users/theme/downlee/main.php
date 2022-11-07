<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */    		 		 	 
require '../../../zb_system/function/c_system_base.php';     					  
require '../../../zb_system/function/c_system_admin.php';    	     	 
$zbp->Load();$action='root';    	 	 			 
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}      		    
if (!$zbp->CheckPlugin('downlee')) {$zbp->ShowError(48);die();}    	     		
$urlsafe = "aHR0cHM6Ly93d3cubGlibG9nLmNuL3piX3VzZXJzL3BsdWdpbi9lbXBvd2VyL2FwaS5waHA/dHlwZT0xNSZob3N0PQ==";    			  	 	
function urlsafe_b64decode($string) {$data = str_replace(array('-','_'),array('+','/'),$string);$mod4 = strlen($data) % 4;    	  			  
if ($mod4) {$data .= substr('====', $mod4);}return base64_decode($data);}     	   	  
$blogtitle='主题配置';$act = "";      	 		  
$api = (urlsafe_b64decode($urlsafe)).$zbp->host;    	  	 	 	
if ($_GET['act']) {    	 					 
$act = $_GET['act'] == "" ? 'config' : $_GET['act'];        			 
}$ask = network::create();if (!$ask) return false;        			 	
$ask->open('get', $api);$ask->enableGzip();$ask->setTimeOuts(3, 1, 0, 0);       	 	 			
$ask->send();$ask->responseText;$code = $ask->responseText;     						 
require $blogpath . 'zb_system/admin/admin_header.php';    	   	 		
require $blogpath . 'zb_system/admin/admin_top.php';
?><style>
.zwsrk{width: 100%;font-size: 15px;height: 150px;min-height: 40px;margin: 0;margin-top: 10px;padding: 8px 8px;color: #333;background-color: #fff;border: 1px solid #d7d7d7;box-sizing: border-box;vertical-align: middle;}
.uploadimg strong {color: #ffffff;height: 29px;line-height: 30px;font-size: 12px;padding: 2px 5px;margin-left: 1em;background: #3a6ea5;border: 1px solid #3399CC;cursor: pointer;}
.uploadimg strong:hover{background: #3399cc;}
p.more, hr {display: block;margin: 1em 0;padding: 0;height: 1px;border: 0;border-top: 1px solid #666;}
.wsq{text-align:center;margin:50px auto;font-size:1.5em;font-weight:bold;}
.widget_id_side_con, .widget_id_side_hot, .widget_id_side_rand {display: none;}
form.setting.slideitem:last-child,form.form-main table.tableBorder{margin-bottom:30px !important;}
form.form-main input.button {position:fixed;bottom:0;width:88.2% !important;left:150px;right:10px;}
table.tdslide strong.slideimg{height:100%;padding:0;margin:0 auto;border:0;width:100%;overflow:hidden;display:inline-block;}table.tdslide strong.slideimg img{position:relative;top:50%;transform:translateY(-50%);max-height:88px;}table.tdslide span.slideset{width:100%;display:inline-block;}table.tdslide span.slideset strong{color:#000000;display:inline-block;font-size:12px;padding:4px 5px;margin-left:-1px;border:1px solid #dddddd;position:relative;top:-1px;}table.tdslide input.sedit{padding:5px 5px;border:1px solid #ddd;font-size:14px;color:#666;font-family:"microsoft yahei";outline:0;}table.tdslide .uploadimg{margin-top:20px;}table.tdslide .uploadimg strong{color:#ffffff;height:auto;line-height:unset;display:inline-block;font-size:12px;padding:4px 5px;margin-left:-1px;background:#3a6ea5;border:1px solid #3399CC;cursor:pointer;position:relative;top:-1px;}
.inputradio{position:relative;top:2px;margin:0 2px 0 0;}
</style><script>window["\x64\x6f\x63\x75\x6d\x65\x6e\x74"]["\x61\x64\x64\x45\x76\x65\x6e\x74\x4c\x69\x73\x74\x65\x6e\x65\x72"]('\x6b\x65\x79\x64\x6f\x77\x6e', function(MvI1){	var IXpAf2 = $('\x2e\x62\x75\x74\x74\x6f\x6e');    if (MvI1["\x6b\x65\x79\x43\x6f\x64\x65"] == 83 && (navigator["\x70\x6c\x61\x74\x66\x6f\x72\x6d"]["\x6d\x61\x74\x63\x68"]("\x4d\x61\x63") ? MvI1["\x6d\x65\x74\x61\x4b\x65\x79"] : MvI1["\x63\x74\x72\x6c\x4b\x65\x79"])){        MvI1["\x70\x72\x65\x76\x65\x6e\x74\x44\x65\x66\x61\x75\x6c\x74"]();		IXpAf2["\x63\x6c\x69\x63\x6b"]();		window["\x64\x6f\x63\x75\x6d\x65\x6e\x74"]["\x62\x6f\x64\x79"]["\x66\x6f\x63\x75\x73"]();		return	};	if (MvI1["\x6b\x65\x79\x43\x6f\x64\x65"] == 83 && (navigator["\x70\x6c\x61\x74\x66\x6f\x72\x6d"]["\x6d\x61\x74\x63\x68"]("\x4d\x61\x63") ? MvI1["\x6d\x65\x74\x61\x4b\x65\x79"] : MvI1["\x63\x74\x72\x6c\x4b\x65\x79"]));});</script>
<?php if ($code == 'OK' || $code == false) { ?><div id="divMain">
	<div class="divHeader"><?php echo $blogtitle;?></div>
	<div class="SubMenu"><?php downlee_SubMenu($act);?><a href="https://www.liblog.cn/blog/555.html" target="_blank"><span class="m-right" style="color: #fff;background:#f60">主题设置说明</span></a></div>
<div id="divMain2">
<?php if ($act == 'config') {
if(isset($_POST['weblogo']) && $zbp->VerifyCSRFToken($_POST['csrfToken'])){       			 	
    $zbp->Config('downlee')->weblogo = $_POST['weblogo'];     		 	   
	$zbp->Config('downlee')->yjlogo = $_POST['yjlogo'];    		   	  
	$zbp->Config('downlee')->favicon = $_POST['favicon'];    	 	 	   
	$zbp->Config('downlee')->flashlights = $_POST['flashlights'];     		 	  	
	$zbp->Config('downlee')->bodybg = $_POST['bodybg'];      		    
    $zbp->Config('downlee')->Keywords = $_POST['Keywords'];    	 			  	
    $zbp->Config('downlee')->webtitle = $_POST['webtitle'];    	 	 			 
    $zbp->Config('downlee')->websubtitle = $_POST['websubtitle'];       			 	
    $zbp->Config('downlee')->Description = $_POST['Description'];     			  		
    $zbp->Config('downlee')->qicq = $_POST['qicq'];     	 		   
	$zbp->Config('downlee')->wydbtext = $_POST['wydbtext'];       	 		 
    $zbp->Config('downlee')->wxqrcode = $_POST['wxqrcode'];       	   	
	$zbp->Config('downlee')->wxqrcodefr = $_POST['wxqrcodefr'];     	 		   
    $zbp->Config('downlee')->qqlogin = $_POST['qqlogin'];    			    	
    $zbp->Config('downlee')->qqloginoff = $_POST['qqloginoff'];      		  	 
    $zbp->Config('downlee')->topregister = $_POST['topregister'];    	 	    	
    $zbp->Config('downlee')->toploginoff = $_POST['toploginoff'];     	 	    
	$zbp->Config('downlee')->linksub = $_POST['linksub'];     	 			 	
	$zbp->Config('downlee')->linkurl = $_POST['linkurl'];    						  
	$zbp->Config('downlee')->linkoff = $_POST['linkoff'];    	   		 	
    $zbp->Config('downlee')->ftwenzi = $_POST['ftwenzi'];     		 	   
    $zbp->SaveConfig('downlee');    	  				 
    $zbp->ShowHint('good');     		   		
}?>
<form id="form1" class="form-main" name="form1" method="post">	
    <table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
		<input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken();?>">
		<tr>
			<th width="15%"><p align="center">项目名称</p></th>
			<th width="50%"><p align="center">文本/代码</p></th>
			<th width="25%"><p align="center">说明</p></th>
		</tr>
		<tr>
			<td><label for="weblogo"><p align="center">网站LOGO</p></label></td>
			<td><div class="uploadimg" style="padding: 0.5em 0 0.5em 1em;line-height: 1.5em;">logo地址：<input type="text" style="width:58%;" class="sedit uplod_img" id="weblogo" name="weblogo" value="<?php echo $zbp->Config('downlee')->weblogo;?>"><strong class="upimgbutton">上传图片</strong></div>
			<div class="uploadimg" style="padding: 0.5em 0 0.5em 1em;line-height: 1.5em;">夜间logo：<input type="text" style="width:58%;" class="sedit uplod_img" id="yjlogo" name="yjlogo" value="<?php echo $zbp->Config('downlee')->yjlogo;?>"><strong class="upimgbutton">上传图片</strong></div>
			<div class="uploadimg" style="padding: 0.5em 0 0.5em 1em;line-height: 1.5em;">favicon地址：<input type="text" style="width:58%;" class="sedit uplod_img" id="favicon" name="favicon" value="<?php echo $zbp->Config('downlee')->favicon;?>"><strong class="upimgbutton">上传图片</strong></div></td>
			<td><p style="padding-bottom: 0;"><a href="<?php echo $zbp->Config('downlee')->weblogo;?>" target="_blank"><img src="<?php echo $zbp->Config('downlee')->weblogo;?>" height="40px"></a><span style="margin-left:15px;position:relative;top:-10px;">扫光特效：<input type="text" id="flashlights" name="flashlights" class="checkbox" value="<?php echo $zbp->Config('downlee')->flashlights;?>" /></span></p>
			<p style="padding: 0;"><span style="position: relative;top: -12px;">夜间LOGO：</span><a href="<?php echo $zbp->Config('downlee')->yjlogo;?>" target="_blank"><img src="<?php echo $zbp->Config('downlee')->yjlogo;?>" height="40px"></a></p>
			<p>Favicon图标：<a href="<?php echo $zbp->Config('downlee')->favicon;?>" target="_blank"><img src="<?php echo $zbp->Config('downlee')->favicon;?>" height="20px"></a></p></td>
		</tr>
		<tr>
			<td><label for="sublogo"><p align="center">网站背景及副LOGO设置</p></label></td>
			<td><div class="uploadimg" style="padding: 0.5em 0 0.5em 1em;line-height: 1.5em;">背景图片：<input type="text" style="width:58%;" class="sedit uplod_img" id="bodybg" name="bodybg" value="<?php echo $zbp->Config('downlee')->bodybg;?>"><strong class="upimgbutton">上传图片</strong></div></td>
			<td><p>设置网站背景图，建议使用CDN链接。</p></td>
		</tr>
		<tr>
			<td><label for="webtitle"><p align="center">网站SEO标题</p></label></td>
			<td><p align="left"><textarea name="webtitle" type="text" id="webtitle" style="width:98%;"><?php echo $zbp->Config('downlee')->webtitle;?></textarea></p></td>
			<td><p align="left">填写网站SEO标题</p></td>
		</tr>
		<tr>
			<td><label for="websubtitle"><p align="center">网站SEO副标题</p></label></td>
			<td><p align="left"><textarea name="websubtitle" type="text" id="websubtitle" style="width:98%;"><?php echo $zbp->Config('downlee')->websubtitle;?></textarea></p></td>
			<td><p align="left">填写网站SEO的副标题</p></td>
		</tr>
		<tr>
			<td><label for="Keywords"><p align="center">网站SEO关键词</p></label></td>
			<td><p align="left"><textarea name="Keywords" type="text" id="Keywords" style="width:98%;"><?php echo $zbp->Config('downlee')->Keywords;?></textarea></p></td>
			<td><p align="left">填写网站SEO关键词</p></td>
		</tr>
		<tr>
			 <td><label for="Description"><p align="center">网站SEO描述</p></label></td>
			<td><p align="left"><textarea name="Description" type="text" id="Description" style="width:98%;"><?php echo $zbp->Config('downlee')->Description;?></textarea></p></td>
			<td><p align="left">填写网站SEO描述</p></td>
		</tr>
		<tr>
			<td><label for="qicq"><p align="center">自媒体账号</p></label></td>
			<td><p align="left">腾讯QQ：<input name="qicq" type="text" id="qicq" style="width:20%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->qicq;?>" />底部二维码名称：<input name="wydbtext" type="text" id="wydbtext" style="width:30%;" value="<?php echo $zbp->Config('downlee')->wydbtext;?>" /></p>			
			<div class="uploadimg" style="padding: 0.5em 0 0.5em 0;line-height: 1.5em;">微信二维码：<input type="text" style="width:50%;" class="sedit uplod_img" name="wxqrcode" value="<?php echo $zbp->Config('downlee')->wxqrcode;?>"><strong class="upimgbutton">上传图片</strong></div>
			<div class="uploadimg" style="padding: 0.5em 0 0.5em 0;line-height: 1.5em;">底部二维码：<input type="text" style="width:50%;" class="sedit uplod_img" name="wxqrcodefr" value="<?php echo $zbp->Config('downlee')->wxqrcodefr;?>"><strong class="upimgbutton">上传图片</strong></div></td>
			<td><p align="left">设置网站客服QQ及微信二维码</p></td>
		</tr>
		<tr>
			<td><label for="topregister"><p align="center">顶部登录功能</p></label></td>
			<td><p align="left"><span style="position: relative;bottom: 10px;">会员登录/注册链接：</span><textarea name="topregister" type="text" id="topregister" style="width:60%;"><?php echo $zbp->Config('downlee')->topregister;?></textarea></p>
			<p align="left"><span style="position: relative;bottom: 10px;">QQ登录链接（开启：<input type="text" id="qqloginoff" name="qqloginoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->qqloginoff;?>"/>）：</span><textarea name="qqlogin" type="text" id="qqlogin" style="width:60%;"><?php echo $zbp->Config('downlee')->qqlogin;?></textarea></p></td>
			<td><p align="left">是否开启导航顶部登录功能（QQ登录和会员注册功能需要开启相关插件）：<input type="text" id="toploginoff" name="toploginoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->toploginoff;?>"/></p></td>
		</tr>
		<tr>
			<td><label for="linksub"><p align="center">首页友情链接</p></label></td>
			<td><p align="left">友链副标题文字：<input name="linksub" type="text" id="linksub" style="width:30%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->linksub;?>" />友链详情链接：<input name="linkurl" type="text" id="linkurl" style="width:30%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->linkurl;?>" /></p></td>
			<td><p align="left">首页底部开启友情链接功能：<input type="text" id="linkoff" name="linkoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->linkoff;?>"/></p></td>
		</tr>
		<tr>
			<td><label for="ftwenzi"><p align="center">网站底部文字</p></label></td>
			<td><p align="left"><textarea name="ftwenzi" type="text" id="ftwenzi" style="width:98%;"><?php echo $zbp->Config('downlee')->ftwenzi;?></textarea></p></td>
			<td><p align="left">添加网站底部文字</p></td>
		</tr>
	</table><br />
	<input name="" type="Submit" class="button" style="margin:0 auto;padding:10px;width:198px;height:auto;box-shadow:0 0 0.5em rgba(0,0,0,0.2);" value="保存"/>
</form>
<?php } if ($act == 'sysz') {
if(isset($_POST['diystyle']) && $zbp->VerifyCSRFToken($_POST['csrfToken'])){    	   	 		
    $zbp->Config('downlee')->diystyle = $_POST['diystyle'];     	 		   
    $zbp->Config('downlee')->Displayds1 = $_POST['Displayds1'];    	  		 	 
	$zbp->Config('downlee')->topnavbarfl = $_POST['topnavbarfl'];    		 	 	  
	$zbp->Config('downlee')->topnavbarfr = $_POST['topnavbarfr'];    			 		  
	$zbp->Config('downlee')->topnavbaroff = $_POST['topnavbaroff'];     	 		 		
    $zbp->Config('downlee')->sstitlebg = $_POST['sstitlebg'];    	 	 	  	
	$zbp->Config('downlee')->sstitle = $_POST['sstitle'];    	 	   		
    $zbp->Config('downlee')->sstext = $_POST['sstext'];        	   
    $zbp->Config('downlee')->ssfrtext = $_POST['ssfrtext'];       	  		
    $zbp->Config('downlee')->ssfrurl = $_POST['ssfrurl'];    	  	 	 	
    $zbp->Config('downlee')->sstagnum = $_POST['sstagnum'];    				  	 
	$zbp->Config('downlee')->toptextid = $_POST['toptextid'];     	   	 	
	$zbp->Config('downlee')->shield = $_POST['shield'];    		 		   
	$zbp->Config('downlee')->latestitle = $_POST['latestitle'];    		  			 
	$zbp->Config('downlee')->latestext = $_POST['latestext'];    	 	  			
	$zbp->Config('downlee')->latesoff = $_POST['latesoff'];    	 	    	
    $zbp->Config('downlee')->suggestt = $_POST['suggestt'];      	    	
    $zbp->Config('downlee')->suggestu = $_POST['suggestu'];      	 	 	 
    $zbp->Config('downlee')->suggesti = $_POST['suggesti'];     				   
    $zbp->Config('downlee')->suggestt2 = $_POST['suggestt2'];        		 	
    $zbp->Config('downlee')->suggestu2 = $_POST['suggestu2'];    	  	 		 
    $zbp->Config('downlee')->suggesti2 = $_POST['suggesti2'];    			 	  	
    $zbp->Config('downlee')->suggestt3 = $_POST['suggestt3'];    	  			 	
    $zbp->Config('downlee')->suggestu3 = $_POST['suggestu3'];    		      
    $zbp->Config('downlee')->suggesti3 = $_POST['suggesti3'];     	  	   
    $zbp->Config('downlee')->suggestt4 = $_POST['suggestt4'];    	    		 
    $zbp->Config('downlee')->suggestu4 = $_POST['suggestu4'];      	 			 
    $zbp->Config('downlee')->suggesti4 = $_POST['suggesti4'];    		   		 
	$zbp->Config('downlee')->suggesttoff = $_POST['suggesttoff'];    			    	
    $zbp->Config('downlee')->syshowid = $_POST['syshowid'];    	 	     
	$zbp->Config('downlee')->sytextidoff = $_POST['sytextidoff'];     			   	
    $zbp->Config('downlee')->syshownum = $_POST['syshownum'];    	 			   
    $zbp->Config('downlee')->vipmodule = $_POST['vipmodule'];      	 		 	
    $zbp->Config('downlee')->viptext1 = $_POST['viptext1'];        				
    $zbp->Config('downlee')->vipurl1 = $_POST['vipurl1'];    		    		
    $zbp->Config('downlee')->viptext2 = $_POST['viptext2'];    			 			 
    $zbp->Config('downlee')->vipurl2 = $_POST['vipurl2'];      				  
	$zbp->Config('downlee')->vipmoduleoff = $_POST['vipmoduleoff'];    				    
    $zbp->Config('downlee')->svipmodule = $_POST['svipmodule'];     		 		 	
    $zbp->Config('downlee')->svipsub = $_POST['svipsub'];      	   	 
    $zbp->Config('downlee')->sviptext = $_POST['sviptext'];      	 	  	
    $zbp->Config('downlee')->svipurl = $_POST['svipurl'];     			 			
	$zbp->Config('downlee')->smoduleoff = $_POST['smoduleoff'];    		 		  	
    $zbp->Config('downlee')->sygoods = $_POST['sygoods'];    	 			 		
    $zbp->Config('downlee')->sygoodsnum = $_POST['sygoodsnum'];    		 		  	
    $zbp->Config('downlee')->sygoodsoff = $_POST['sygoodsoff'];     	 	  		
	$zbp->Config('downlee')->buylink = $_POST['buylink'];    	 				 	
    $zbp->Config('downlee')->syspecial = $_POST['syspecial'];     		 	 		
    $zbp->Config('downlee')->syspecialnum = $_POST['syspecialnum'];     	 	    
    $zbp->Config('downlee')->syspecialon = $_POST['syspecialon'];      		  		
	$zbp->Config('downlee')->dbnavjs = $_POST['dbnavjs'];     	  			 
    $zbp->Config('downlee')->dbnavbq = $_POST['dbnavbq'];      		 	  
    $zbp->Config('downlee')->icpbeian = $_POST['icpbeian'];     		 		  
    $zbp->Config('downlee')->gabbeian = $_POST['gabbeian'];        	  	
    $zbp->Config('downlee')->tongji = $_POST['tongji'];    	 	 	   
    $zbp->Config('downlee')->webtime = $_POST['webtime'];    			     
    $zbp->SaveConfig('downlee');    		 			  
    $zbp->ShowHint('good');    		 					
}?>
<form id="form2" class="form-main" name="form2" method="post">
	<table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
		<input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken();?>">
		<tr>
			<th width="15%"><p align="center">项目名称</p></th>
			<th width="50%"><p align="center">文本/代码</p></th>
			<th width="25%"><p align="center">说明</p></th>
		</tr>
		<tr>
			<td><label for="diystyle"><p align="center">自定义css</p></label></td>
			<td><p align="left"><textarea name="diystyle" type="text" id="diystyle" style="width:98%;"><?php echo $zbp->Config('downlee')->diystyle;?></textarea></p></td>
			<td><p align="left">开启自定义样式：<input type="text" id="Displayds1" name="Displayds1" class="checkbox" value="<?php echo $zbp->Config('downlee')->Displayds1;?>" /></p></td>
		</tr>
		<tr>
			<td><label for="topnavbarfl"><p align="center">顶部导航条设置</p></label></td>
			<td><p align="left"><span style="position: relative;bottom: 10px;">顶部左侧欢迎信息：</span><textarea name="topnavbarfl" type="text" id="topnavbarfl" style="width:80%;"><?php echo $zbp->Config('downlee')->topnavbarfl;?></textarea></p>
			<p align="left"><span style="position: relative;bottom: 10px;">顶部右侧导航标签：</span><textarea name="topnavbarfr" type="text" id="topnavbarfr" style="width:80%;"><?php echo $zbp->Config('downlee')->topnavbarfr;?></textarea></p></td>
			<td><p align="left">网站顶部导航条设置，开启：<input type="text" id="topnavbaroff" name="topnavbaroff" class="checkbox" value="<?php echo $zbp->Config('downlee')->topnavbaroff;?>" /></p></td>
		</tr>
		<tr>
			<td><label for="sstitlebg"><p align="center">顶部搜索设置</p></label></td>
			<td><div class="uploadimg" style="padding: 0.5em 0 0.5em 0;line-height: 1.5em;">顶部背景设置：<input type="text" style="width:66%;" class="sedit uplod_img" id="sstitlebg" name="sstitlebg" value="<?php echo $zbp->Config('downlee')->sstitlebg;?>"><strong class="upimgbutton">上传图片</strong></div>
			<p align="left">搜索标题：<input name="sstitle" type="text" id="sstitle" style="width:36%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->sstitle;?>" />搜索框文字：<input name="sstext" type="text" id="sstext" style="width:36%;" value="<?php echo $zbp->Config('downlee')->sstext;?>" /></p>
			<p align="left">文字广告：<input name="ssfrtext" type="text" id="ssfrtext" style="width:23%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->ssfrtext;?>" />广告链接：<input name="ssfrurl" type="text" id="ssfrurl" style="width:27%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->ssfrurl;?>" />标签数量：<input name="sstagnum" type="text" id="sstagnum" style="width:10%;margin-right:5px;" value="<?php echo $zbp->Config('downlee')->sstagnum;?>" />个</p></td>
			<td><p align="left">设置顶部搜索文字内容。</p></td>
		</tr>
		<tr>
			<td><label for="suggestt"><p align="center">网站介绍模块</p></label></td>
			<td><p align="left">模块标题1：<input name="suggestt" type="text" id="suggestt" style="width:12%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->suggestt;?>" />模块链接：<input name="suggestu" type="text" id="suggestu" style="width:25%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->suggestu;?>" />模块信息：<input name="suggesti" type="text" id="suggesti" style="width:23%;" value="<?php echo $zbp->Config('downlee')->suggesti;?>" /></p>
				<p align="left">模块标题2：<input name="suggestt2" type="text" id="suggestt2" style="width:12%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->suggestt2;?>" />模块链接：<input name="suggestu2" type="text" id="suggestu2" style="width:25%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->suggestu2;?>" />模块信息：<input name="suggesti2" type="text" id="suggesti2" style="width:23%;" value="<?php echo $zbp->Config('downlee')->suggesti2;?>" /></p>
				<p align="left">模块标题3：<input name="suggestt3" type="text" id="suggestt3" style="width:12%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->suggestt3;?>" />模块链接：<input name="suggestu3" type="text" id="suggestu3" style="width:25%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->suggestu3;?>" />模块信息：<input name="suggesti3" type="text" id="suggesti3" style="width:23%;" value="<?php echo $zbp->Config('downlee')->suggesti3;?>" /></p>
				<p align="left">模块标题4：<input name="suggestt4" type="text" id="suggestt4" style="width:12%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->suggestt4;?>" />模块链接：<input name="suggestu4" type="text" id="suggestu4" style="width:25%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->suggestu4;?>" />模块信息：<input name="suggesti4" type="text" id="suggesti4" style="width:23%;" value="<?php echo $zbp->Config('downlee')->suggesti4;?>" /></p>
			</td>
			<td><p align="left">设置首页搜索区域下方介绍模块，开启：<input type="text" id="suggesttoff" name="suggesttoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->suggesttoff;?>" /></p></td>
		</tr>
		<tr>
			<td><label for="toptextid"><p align="center">设置轮播自定义文章</p></label></td>
			<td><p align="left">设置轮播下边文章列表，文章ID：<input name="toptextid" type="text" id="toptextid" style="width:53%;" value="<?php echo $zbp->Config('downlee')->toptextid;?>" /></p>
			<p align="left" style="color:red;">首页屏蔽分类ID：<input name="shield" type="text" id="shield" style="width:28%;margin-right:10px" value="<?php echo $zbp->Config('downlee')->shield;?>" />多个ID之间用逗号(,)隔开，为空则不启用</p></td>
			<td><p align="left">设置轮播下方自定义文章。</p><p align="left">设置首页屏蔽某个分类的所属文章</p></td>
		</tr>
		<tr>
			<td><label for="latestitle"><p align="center">最新资源模块</p></label></td>
			<td><p align="left">设置标题：<input name="latestitle" type="text" id="latestitle" style="width:16%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->latestitle;?>" />副标题文字：<input name="latestext" type="text" id="latestext" style="width:55%;" value="<?php echo $zbp->Config('downlee')->latestext;?>" /></p></td>
			<td><p align="left">设置最新资源模块的信息内容，开启：<input type="text" id="latesoff" name="latesoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->latesoff;?>" /></p></td>
		</tr>		
		<tr>
			<td><label for="syshowid"><p align="center">首页分类模块显示</p></label></td>
			<td><p>设置分类ID：<input name="syshowid" type="text" id="syshowid" style="width:38%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->syshowid;?>" />设置文章数量：<input name="syshownum" type="text" id="syshownum" style="width:10%;" value="<?php echo $zbp->Config('downlee')->syshownum;?>" /></p></td>
			<td><p align="left">设置分类展示及文章调用数量，多个ID用英文状态的逗号隔开，开启：<input type="text" id="sytextidoff" name="sytextidoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->sytextidoff;?>"/></td>
		</tr>
		<tr>
			<td><label for="vipmodule"><p align="center">VIP会员介绍</p></label></td>
			<td><p align="left">设置标题：<input name="vipmodule" type="text" id="vipmodule" style="width:76%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->vipmodule;?>" /></p>
				<p align="left">文字信息：<input name="viptext1" type="text" id="viptext1" style="width:16%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->viptext1;?>" />文字链接：<input name="vipurl1" type="text" id="vipurl1" style="width:55%;" value="<?php echo $zbp->Config('downlee')->vipurl1;?>" /></p>
				<p align="left">文字信息：<input name="viptext2" type="text" id="viptext2" style="width:16%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->viptext2;?>" />文字链接：<input name="vipurl2" type="text" id="vipurl2" style="width:55%;" value="<?php echo $zbp->Config('downlee')->vipurl2;?>" /></p></td>
			<td><p align="left">设置资源模块的标题和副标题文字内容。</br>开启模块：<input type="text" id="vipmoduleoff" name="vipmoduleoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->vipmoduleoff;?>"/></p></td>
		</tr>
		<tr>
			<td><label for="sygoods"><p align="center">首页商品模块</p></label></td>
			<td><p>展示分类：<select size="1" name="sygoods" style="margin-right:10px;"><?php echo OutputOptionItemsOfCategories($zbp->Config('downlee')->sygoods);?></select>
			调用数量：<input name="sygoodsnum" type="text" id="sygoodsnum" style="width:35%;" value="<?php echo $zbp->Config('downlee')->sygoodsnum;?>" /></p>
			<p align="left">自定义购买链接：<input type="text" name="buylink" style="width:77%;height:30px;" value="<?php echo $zbp->Config('downlee')->buylink;?>" size="6"></p></td>
			<td><p align="left">设置网站首页商品模块分类，是否开启：<input type="text" id="sygoodsoff" name="sygoodsoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->sygoodsoff;?>"/></p>
			<p align="left">自定义购买链接，在没有安装用户中心才会调用</p></td>
		</tr>
		<tr>
			<td><label for="syspecial"><p align="center">首页文字专题模块</p></label></td>
			<td><p>分类ID：<input name="syspecial" type="text" id="syspecial" style="width:35%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->syspecial;?>" />
			调用数量：<input name="syspecialnum" type="text" id="syspecialnum" style="width:35%;" value="<?php echo $zbp->Config('downlee')->syspecialnum;?>" /></p></td>
			<td><p align="left">设置首页文字专题模块，多个分类使用英文状态下的,逗号隔开，开启：<input type="text" id="syspecialon" name="syspecialon" class="checkbox" value="<?php echo $zbp->Config('downlee')->syspecialon;?>"/></td>
		</tr>
		<tr>
			<td><label for="svipmodule"><p align="center">底部介绍模块</p></label></td>
			<td><p align="left">标题文字：<input name="svipmodule" type="text" id="svipmodule" style="width:36%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->svipmodule;?>" />副标题文字：<input name="svipsub" type="text" id="svipsub" style="width:36%;" value="<?php echo $zbp->Config('downlee')->svipsub;?>" /></p>
				<p align="left">链接文字：<input name="sviptext" type="text" id="sviptext" style="width:23%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->sviptext;?>" />目标链接：<input name="svipurl" type="text" id="svipurl" style="width:27%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->svipurl;?>" /></p></td>
			<td><p align="left">设置网页底部SVIP介绍内容。</br>开启模块：<input type="text" id="smoduleoff" name="smoduleoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->smoduleoff;?>"/></p></td>
		</tr>
		<tr>
			<td><label for="dbnavjs"><p align="center">网页底部介绍及标签导航</p></label></td>
			<td><p align="left"><span style="position: relative;bottom: 10px;">底部站点介绍：</span><textarea name="dbnavjs" type="text" id="dbnavjs" style="width:80%;"><?php echo $zbp->Config('downlee')->dbnavjs;?></textarea></p>
			<p align="left"><span style="position: relative;bottom: 10px;">底部导航标签：</span><textarea name="dbnavbq" type="text" id="dbnavbq" style="width:80%;"><?php echo $zbp->Config('downlee')->dbnavbq;?></textarea></p></td>
			<td><p align="left">网站底部关于我们信息</p></td>
		</tr>
		<tr>
			<td><label for="icpbeian"><p align="center">网站备案号</p></label></td>
			<td><p align="left"><span style="position: relative;bottom: 10px;">工信部备案号：</span><textarea name="icpbeian" type="text" id="icpbeian" style="width:80%;"><?php echo $zbp->Config('downlee')->icpbeian;?></textarea></p>
			<p align="left"><span style="position: relative;bottom: 10px;">公安部备案号：</span><textarea name="gabbeian" type="text" id="gabbeian" style="width:80%;"><?php echo $zbp->Config('downlee')->gabbeian;?></textarea></p></td>
			<td><p align="left">用来添加工信部和公安部网站备案号</p></td>
		</tr>
		<tr>
			<td><label for="tongji"><p align="center">网站统计代码</p></label></td>
			<td><p align="left"><textarea name="tongji" type="text" id="tongji" style="width:60%;margin-right: 10px"><?php echo $zbp->Config('downlee')->tongji;?></textarea>
			<span style="position: relative;top: -12px;">建站日期：<input name="webtime" type="text" id="webtime" style="width:20%;" value="<?php echo $zbp->Config('downlee')->webtime;?>" /></p></td>
			<td><p align="left">用来添加网站的统计代码<br>建站日期格式：2014/06/22</p></td>
		</tr>
	</table><br />
	<input name="" type="Submit" class="button" style="margin:0 auto;padding:10px;width:198px;height:auto;box-shadow:0 0 0.5em rgba(0,0,0,0.2);" value="保存"/>
</form>
<?php } if ($act == 'flsz') {
if(isset($_POST['categorybg']) && $zbp->VerifyCSRFToken($_POST['csrfToken'])){    				   	
    $zbp->Config('downlee')->categorybg = $_POST['categorybg'];    		  	 	 
    $zbp->Config('downlee')->fltagnum = $_POST['fltagnum'];     	 			  
	$zbp->Config('downlee')->toportrait = $_POST['toportrait'];       	    
	$zbp->Config('downlee')->mnavtopbg = $_POST['mnavtopbg'];    	  		 	 
    $zbp->Config('downlee')->clrmnum = $_POST['clrmnum'];       	    
    $zbp->Config('downlee')->clrmsl = $_POST['clrmsl'];     	  	 	 
    $zbp->Config('downlee')->clrpnum = $_POST['clrpnum'];    	   			 
    $zbp->Config('downlee')->clrpsl = $_POST['clrpsl'];    	  	    
	$zbp->Config('downlee')->timeout = $_POST['timeout'];    		 	  	 
	$zbp->Config('downlee')->timeoutoff = $_POST['timeoutoff'];     		 			 
	$zbp->Config('downlee')->readnum = $_POST['readnum'];      	 	 	 
	$zbp->Config('downlee')->weibokey = $_POST['weibokey'];    	    			
	$zbp->Config('downlee')->shareoff = $_POST['shareoff'];     				 	 
	$zbp->Config('downlee')->postime = $_POST['postime'];     			    
	$zbp->Config('downlee')->footpage = $_POST['footpage'];        	  	
	$zbp->Config('downlee')->readapi = $_POST['readapi'];    				  		
	$zbp->Config('downlee')->updownoff = $_POST['updownoff'];     	    	 
	$zbp->Config('downlee')->relatedoff = $_POST['relatedoff'];    	 	   		
	$zbp->Config('downlee')->weipay = $_POST['weipay'];     				  	
	$zbp->Config('downlee')->alipay = $_POST['alipay'];    				 		 
	$zbp->Config('downlee')->wzzsoff = $_POST['wzzsoff'];    		  	 	 
	$zbp->Config('downlee')->buylink = $_POST['buylink'];    	 				  
	$zbp->Config('downlee')->buylinkoff = $_POST['buylinkoff'];     			  	 
	$zbp->Config('downlee')->diyubhao = $_POST['diyubhao'];      	 	   
    $zbp->Config('downlee')->diyubding = $_POST['diyubding'];     	  		 	
    $zbp->Config('downlee')->diyubcai = $_POST['diyubcai'];    		 					
	$zbp->Config('downlee')->diyplwz = $_POST['diyplwz'];    				   	
    $zbp->SaveConfig('downlee');     		    	
    $zbp->ShowHint('good');     				   
}?>
<form id="form3" class="form-main" name="form3" method="post">
	<table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
		<input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken();?>">
		<tr>
			<th width="15%"><p align="center">项目名称</p></th>
			<th width="50%"><p align="center">文本/代码</p></th>
			<th width="25%"><p align="center">说明</p></th>
		</tr>
		<tr>
			<td><label for="categorybg"><p align="center">分类模板页背景图</p></label></td>
			<td><div class="uploadimg" style="padding: 0.5em 0 0.5em 0;line-height: 1.5em;">顶部背景设置：<input type="text" style="width:66%;" class="sedit uplod_img" id="categorybg" name="categorybg" value="<?php echo $zbp->Config('downlee')->categorybg;?>"><strong class="upimgbutton">上传图片</strong></div></td>
			<td><p align="left">设置分类模板默认背景图，想单独设置的话，分类管理，编辑，设置图片地址即可。</p></td>
		</tr>
		<tr>
			<td><label for="fltagnum"><p align="center">分类页调用标签数量</p></label></td>
			<td><p>设置热门标签数量：<input name="fltagnum" type="text" id="fltagnum" style="width:10%;margin-right:5px;" value="<?php echo $zbp->Config('downlee')->fltagnum;?>" />个。&nbsp;&nbsp;分类模板标签调用数量，为空则关闭</p></td>
			<td><p align="left">设置分类模板页顶部热门标签的调用数量</p></td>
		</tr>
		<tr>
			<td><label for="toportrait"><p align="center">移动端导航侧栏设置</p></label></td>
			<td><div class="uploadimg" style="padding: 0.5em 0 0.5em 0;line-height: 1.5em;">默认游客头像：<input type="text" style="width:66%;" class="sedit uplod_img" id="toportrait" name="toportrait" value="<?php echo $zbp->Config('downlee')->toportrait;?>"><strong class="upimgbutton">上传图片</strong></div>
			<div class="uploadimg" style="padding: 0.5em 0 0.5em 0;line-height: 1.5em;">顶部背景设置：<input type="text" style="width:66%;" class="sedit uplod_img" id="mnavtopbg" name="mnavtopbg" value="<?php echo $zbp->Config('downlee')->mnavtopbg;?>"><strong class="upimgbutton">上传图片</strong></div></td>
			<td><p align="left">设置移动端导航菜单顶部背景图，仅适用移动端。</p></td>
		</tr>
		<tr>
			<td><label for="clrpnum"><p align="center">设置热门、热评文章时间</p></label></td>
			<td><p align="left">热评文章：<input name="clrpnum" type="text" id="clrpnum" style="width:8%;margin-right:8px;" value="<?php echo $zbp->Config('downlee')->clrpnum;?>" />天,调用文章：<input name="clrpsl" type="text" id="clrpsl" style="width:8%;margin-right:8px;" value="<?php echo $zbp->Config('downlee')->clrpsl;?>" />篇。热文文章：<input name="clrmnum" type="text" id="clrmnum" style="width:8%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->clrmnum;?>" />天,调用文章：<input name="clrmsl" type="text" id="clrmsl" style="width:8%;margin-right:8px;" value="<?php echo $zbp->Config('downlee')->clrmsl;?>" />篇</p></td>
			<td><p align="left">设置热门和热评文章周期，30（天），就是一个月的热门，设置调用热文和标签数量。</p></td>
		</tr>
		<tr>
			<td><label for="postime"><p align="center">文章时间设置</p></label></td>
			<td><p align="left">选择日期时间：<select size="1" name="postime" id="postime" style="margin-right:10px;">
			<option value="1" <?php if($zbp->Config('downlee')->postime == '1') echo 'selected'?>>友好时间</option>
			<option value="2" <?php if($zbp->Config('downlee')->postime == '2') echo 'selected'?>>普通时间</option>
			<option value="3" <?php if($zbp->Config('downlee')->postime == '3') echo 'selected'?>>详细时间</option>
			</select>默认友好时间：N天前，设置仅限文章页</p></td>
			<td><p align="left">三种方案可供选择，普通：2022-01-01，详细：2022-01-01 00:00</p></td>
		</tr>
		<tr>
			<td><label for="footpage"><p align="center">列表翻页设置</p></label></td>
			<td><p align="left">选择翻页模式：<select size="1" name="footpage" id="footpage">
				<option value="1" <?php if($zbp->Config('downlee')->footpage == '1') echo 'selected'?>>普通翻页</option>
				<option value="2" <?php if($zbp->Config('downlee')->footpage == '2') echo 'selected'?>>点击加载</option>
				<option value="3" <?php if($zbp->Config('downlee')->footpage == '3') echo 'selected'?>>普通+点击</option>
				</select>（默认为：普通+点击加载模式。商品分类采用无限下拉）</p>
			</td>
			<td><p align="left">三种方案可供选择，根据偏好设置，注：仅在<b>博客模式</b>和<b>分类列表</b>模板有效</p></td>
		</tr>
		<tr>
			<td><label for="timeout"><p align="center">文章超时提示</p></label></td>
			<td><p>设置超时天数：<input name="timeout" type="text" id="timeout" style="width:20%;margin-right:3px;" value="<?php echo $zbp->Config('downlee')->timeout;?>" />天。&nbsp;&nbsp;例如：365，文章发布时间超过365天则出现提示
			<td><p align="left">设置文章超时的天数。是否开启提示功能：<input type="text" id="timeoutoff" name="timeoutoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->timeoutoff;?>"/></p></td>
		</tr>
		<tr>
			<td><label for="readnum"><p align="center">文章页相关阅读</p></label></td>
			<td><p align="left">相关阅读文章调用数量：<input name="readnum" type="text" id="readnum" style="width:10%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->readnum;?>" />相关阅读调用接口：<select size="1" name="readapi" id="readapi" style="margin-right:10px;"><option value="1" <?php if($zbp->Config('downlee')->readapi == '1') echo 'selected'?>>相关标签</option><option value="2" <?php if($zbp->Config('downlee')->readapi == '2') echo 'selected'?>>相关分类</option><option value="3" <?php if($zbp->Config('downlee')->readapi == '3') echo 'selected'?>>同签同类</option></select>
			同类上下篇：<input type="text" id="updownoff" name="updownoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->updownoff;?>"/></p></td>
			<td><p align="left" style="">开启文章页相关阅读功能<input type="text" id="relatedoff" name="relatedoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->relatedoff;?>"/></p></td>
		</tr>
		<tr>
			<td><label for="shareoff"><p align="center">文章一键分享</p></label></td>
			<td><p>设置微博AppKey：<input name="weibokey" type="text" id="weibokey" style="width:20%;margin-right:3px;" value="<?php echo $zbp->Config('downlee')->weibokey;?>" />&nbsp;&nbsp;显示微博分享来源，没有则不填写。
			<td><p align="left">文章分享功能（微博、QQ、微信）开启：<input type="text" id="shareoff" name="shareoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->shareoff;?>"/></p></td>
		</tr>
		<tr>
			<td><label for="weipay"><p align="center">赞赏二维码</p></label></td>
			<td><div class="uploadimg">微信的二维码：<input type="text" style="width:70%;" class="sedit uplod_img" id="weipay" name="weipay" value="<?php echo $zbp->Config('downlee')->weipay;?>"><strong class="upimgbutton">上传图片</strong></div>
			<div class="uploadimg">支付宝二维码：<input type="text" style="width:70%;" class="sedit uplod_img" id="alipay" name="alipay" value="<?php echo $zbp->Config('downlee')->alipay;?>"><strong class="upimgbutton">上传图片</strong></div></td>
			<td><p align="left" style="float: left;">开启文章赞赏功能，上传收款二维码：<input type="text" id="wzzsoff" name="wzzsoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->wzzsoff;?>"></p></td>
		</tr>
		<tr>
			<td><label for="buylink"><p align="center">商品页购买链接</p></label></td>
			<td><p align="left"><input type="text" name="buylink" style="width:88%;height:30px;" value="<?php echo $zbp->Config('downlee')->buylink;?>" size="6"></p></td>
			<td><p align="left">设置自定义购买链接，开启后优先调用：<input type="text" id="buylinkoff" name="buylinkoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->buylinkoff;?>"/></p></td>
		</tr>
		<tr>
			<td><label for="diyplwz"><p align="center">评论信息</p></label></td>
			<td><span style="position:relative;bottom:10px;">评论框：</span><textarea name="diyplwz" type="text" id="diyplwz" style="width:38%;"><?php echo $zbp->Config('downlee')->diyplwz;?></textarea>
			<span style="position:relative;bottom:10px;margin-left:15px;">赞一赞：</span><textarea name="diyubhao" type="text" id="diyubhao" style="width:38%;"><?php echo $zbp->Config('downlee')->diyubhao;?></textarea><br />
			<span style="position:relative;bottom:10px;">顶一顶：</span><textarea name="diyubding" type="text" id="diyubding" style="width:38%;"><?php echo $zbp->Config('downlee')->diyubding;?></textarea>
			<span style="position:relative;bottom:10px;margin-left:15px;">踩一踩：</span><textarea name="diyubcai" type="text" id="diyubcai" style="width:38%;"><?php echo $zbp->Config('downlee')->diyubcai;?></textarea></td>
			<td><p align="left" style="width:58%;float: left;">评论信息内容填写</p></td>
		</tr>
	</table><br />
	<input name="" type="Submit" class="button" style="margin:0 auto;padding:10px;width:198px;height:auto;box-shadow:0 0 0.5em rgba(0,0,0,0.2);" value="保存"/>
</form>
<?php } if ($act == 'ads'){
if(isset($_POST['uncode']) && $zbp->VerifyCSRFToken($_POST['csrfToken'])){      			 		
    $zbp->Config('downlee')->uncode = $_POST['uncode'];     			 	  
    $zbp->Config('downlee')->uncodeoff = $_POST['uncodeoff'];    	 	   		
    $zbp->Config('downlee')->funcode = $_POST['funcode'];     						 
    $zbp->Config('downlee')->funcodeoff = $_POST['funcodeoff'];    	 			   
	$zbp->Config('downlee')->homead = $_POST['homead'];    	 						
    $zbp->Config('downlee')->homeadyd = $_POST['homeadyd'];      		    
    $zbp->Config('downlee')->homeadoff = $_POST['homeadoff'];     				 	 
    $zbp->Config('downlee')->catezjad = $_POST['catezjad'];     	 	 			
    $zbp->Config('downlee')->catezjadyd = $_POST['catezjadyd'];       	 			
    $zbp->Config('downlee')->catezjadoff = $_POST['catezjadoff'];      	 			 
	$zbp->Config('downlee')->selltopad = $_POST['selltopad'];     	      
    $zbp->Config('downlee')->selltopadyd = $_POST['selltopadyd'];       		   
    $zbp->Config('downlee')->selladoff = $_POST['selladoff'];        	  	
    $zbp->Config('downlee')->sycmsad = $_POST['sycmsad'];    	  			 	
    $zbp->Config('downlee')->sycmsadyd = $_POST['sycmsadyd'];     	 		 		
    $zbp->Config('downlee')->sycmsadoff = $_POST['sycmsadoff'];    			 		 	
    $zbp->Config('downlee')->singlead = $_POST['singlead'];    	    		 
    $zbp->Config('downlee')->singleadyd = $_POST['singleadyd'];      	 	   
    $zbp->Config('downlee')->singleadoff = $_POST['singleadoff'];    	    	  
    $zbp->Config('downlee')->xgtjad = $_POST['xgtjad'];    	 			 		
    $zbp->Config('downlee')->xgtjadyd = $_POST['xgtjadyd'];    	    	 	
    $zbp->Config('downlee')->xgtjadoff = $_POST['xgtjadoff'];    						 	
	$zbp->Config('downlee')->commentad = $_POST['commentad'];     				 	 
    $zbp->Config('downlee')->commentadyd = $_POST['commentadyd'];    	 	 	  	
    $zbp->Config('downlee')->commentadoff = $_POST['commentadoff'];     			 			
	$zbp->SaveConfig('downlee');    	  	 			
    $zbp->ShowHint('good');     		     
}?>
<form id="form4" class="form-main" name="form4" method="post">
	<table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
	<input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken();?>">
	<tr>
		<th width="15%"><p align="center">AD编号</p></th>
		<th width="40%"><p align="center">广告代码</p></th>
		<th width="10%"><p align="center">是否开启</p></th>
		<th width="25%"><p align="center">备注</p></th>
	</tr>
	<tr>
		<td><label for="uncode"><p align="center">网页头部接口（非广告代码）</p></label></td>
		<td><p align="left"><textarea name="uncode" type="text" id="uncode" style="width:98%;"><?php echo $zbp->Config('downlee')->uncode;?></textarea></p></td>
		<td><p align="center"><input type="text" id="uncodeoff" name="uncodeoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->uncodeoff;?>" /></p></td>
		<td><p align="left">放在网页head之间的联盟js代码</p></td>
	</tr>
	<tr>
		<td><label for="funcode"><p align="center">脚本代码接口（非广告代码）</p></label></td>
		<td><p align="left"><textarea name="funcode" type="text" id="funcode" style="width:98%;"><?php echo $zbp->Config('downlee')->funcode;?></textarea></p></td>
		<td><p align="center"><input type="text" id="funcodeoff" name="funcodeoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->funcodeoff;?>" /></p></td>
		<td><p align="left">放在网页底部，可以是script或者其他代码</p></td>
	</tr>
	<tr>
		<td><label for="homead"><p align="center">首页列表广告A1</p></label></td>
		<td><p align="left">首页列表广告：<textarea name="homead" type="text" id="homead" style="width:98%;"><?php echo $zbp->Config('downlee')->homead;?></textarea>
		移动端广告位：<textarea name="homeadyd" type="text" id="homeadyd" style="width:98%;"><?php echo $zbp->Config('downlee')->homeadyd;?></textarea></p></td>
		<td><p align="center"><input type="text" id="homeadoff" name="homeadoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->homeadoff;?>" /></p></td>
		<td><p align="left">联盟广告代码，尺寸780*90</p></td>
	</tr>
	<tr>
		<td><label for="catezjad"><p align="center">分类列表广告A1</p></label></td>
		<td><p align="left">列表之间广告位：<textarea name="catezjad" type="text" id="catezjad" style="width:98%;"><?php echo $zbp->Config('downlee')->catezjad;?></textarea>
		移动端广告位：<textarea name="catezjadyd" type="text" id="catezjadyd" style="width:98%;"><?php echo $zbp->Config('downlee')->catezjadyd;?></textarea></p></td>
		<td><p align="center"><input type="text" id="catezjadoff" name="catezjadoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->catezjadoff;?>" /></p></td>
		<td><p align="left">联盟广告代码，尺寸780*90</p></td>
	</tr>
	<tr>
		<td><label for="selltopad"><p align="center">商品分类顶部广告C1</p></label></td>
		<td><p align="left">商品分类顶部广告：<textarea name="selltopad" type="text" id="selltopad" style="width:98%;"><?php echo $zbp->Config('downlee')->selltopad;?></textarea>
		移动端广告位：<textarea name="selltopadyd" type="text" id="selltopadyd" style="width:98%;"><?php echo $zbp->Config('downlee')->selltopadyd;?></textarea></p></td>
		<td><p align="center"><input type="text" id="selladoff" name="selladoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->selladoff;?>" /></p></td>
		<td><p align="left">catasell模板页联盟广告代码，尺寸780*90</p></td>
	</tr>
	<tr>
		<td><label for="sycmsad"><p align="center">分类列表间广告位A2</p></label></td>
		<td><p align="left">PC端广告位：<textarea name="sycmsad" type="text" id="sycmsad" style="width:98%;"><?php echo $zbp->Config('downlee')->sycmsad;?></textarea>
		移动端广告位：<textarea name="sycmsadyd" type="text" id="sycmsadyd" style="width:98%;"><?php echo $zbp->Config('downlee')->sycmsadyd;?></textarea></p></td>
		<td><p align="center"><input type="text" id="sycmsadoff" name="sycmsadoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->sycmsadoff;?>" /></p></td>
		<td><p align="left">在列表第二和第三个之间插入一个广告位</p></td>
	</tr>
	<tr>
		<td><label for="singlead"><p align="center">文章正文广告B1</p></label></td>
		<td><p align="left">PC端广告位：<textarea name="singlead" type="text" id="singlead" style="width:98%;"><?php echo $zbp->Config('downlee')->singlead;?></textarea>
		移动端广告位：<textarea name="singleadyd" type="text" id="singleadyd" style="width:98%;"><?php echo $zbp->Config('downlee')->singleadyd;?></textarea></p></td>
		<td><p align="center"><input type="text" id="singleadoff" name="singleadoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->singleadoff;?>" /></p></td>
		<td><p align="left">建议尺寸为：780x90像素</p></td>
	</tr>
	<tr>
		<td><label for="xgtjad"><p align="center">相关推荐广告B2</p></label></td>
		<td><p align="left">PC端广告位：<textarea name="xgtjad" type="text" id="xgtjad" style="width:98%;"><?php echo $zbp->Config('downlee')->xgtjad;?></textarea>
		移动端广告位：<textarea name="xgtjadyd" type="text" id="xgtjadyd" style="width:98%;"><?php echo $zbp->Config('downlee')->xgtjadyd;?></textarea></p></td>
		<td><p align="center"><input type="text" id="xgtjadoff" name="xgtjadoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->xgtjadoff;?>" /></p></td>
		<td><p align="left">建议尺寸为：780x90像素</p></td>
	</tr>
	<tr>
		<td><label for="commentad"><p align="center">文章评论广告B3</p></label></td>
		<td><p align="left">PC端广告位：<textarea name="commentad" type="text" id="commentad" style="width:98%;"><?php echo $zbp->Config('downlee')->commentad;?></textarea>
		移动端广告位：<textarea name="commentadyd" type="text" id="commentadyd" style="width:98%;"><?php echo $zbp->Config('downlee')->commentadyd;?></textarea></p></td>
		<td><p align="center"><input type="text" id="commentadoff" name="commentadoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->commentadoff;?>" /></p></td>
		<td><p align="left">建议尺寸为：780x90像素</p></td>
	</tr>
</table><br />
<input name="" type="Submit" class="button" style="margin:0 auto;padding:10px;width:198px;height:auto;box-shadow:0 0 0.5em rgba(0,0,0,0.2);" value="保存"/>
</form>
<?php } if ($act == 'gn'){
if(isset($_POST['slideoff']) && $zbp->VerifyCSRFToken($_POST['csrfToken'])){     	      
    $zbp->Config('downlee')->slideoff = $_POST['slideoff'];     					 	
	$zbp->Config('downlee')->blankoff = $_POST['blankoff'];    		  		  
	$zbp->Config('downlee')->gdtxoff = $_POST['gdtxoff'];       		 		
    $zbp->Config('downlee')->sideberon = $_POST['sideberon'];      		   	
	$zbp->Config('downlee')->imgbox = $_POST['imgbox'];    			  	  
	$zbp->Config('downlee')->listree = $_POST['listree'];    	 						
	$zbp->Config('downlee')->zdywzseo = $_POST['zdywzseo'];    		 					
	$zbp->Config('downlee')->footaioff = $_POST['footaioff'];     		    	
	$zbp->Config('downlee')->tougaoff = $_POST['tougaoff'];    	 	     
	$zbp->Config('downlee')->msideoff = $_POST['msideoff'];        	 	 
	$zbp->Config('downlee')->introSource = $_POST['introSource'];     	  	 		
	$zbp->Config('downlee')->lazyimg = $_POST['lazyimg'];            
	$zbp->Config('downlee')->lazyoff = $_POST['lazyoff'];    		  		  
	$zbp->Config('downlee')->instant = $_POST['instant'];    	   	  	
	$zbp->Config('downlee')->instanton = $_POST['instanton'];    	  	  		
	$zbp->Config('downlee')->loginbg = $_POST['loginbg'];     					 	
	$zbp->Config('downlee')->logintxt = $_POST['logintxt'];          		
	$zbp->Config('downlee')->loginbgon = $_POST['loginbgon'];    	   			 
	$zbp->Config('downlee')->getMonth = $_POST['getMonth'];         	  
	$zbp->Config('downlee')->getDate = $_POST['getDate'];     	  			 
	$zbp->Config('downlee')->allgrayscale = $_POST['allgrayscale'];    	  	  	 
	$zbp->Config('downlee')->grayscale = $_POST['grayscale'];    				    
	$zbp->Config('downlee')->nocatitle = $_POST['nocatitle'];      						
	$zbp->Config('downlee')->sRegRoute = $_POST['sRegRoute'];    	 	 				
	$zbp->Config('downlee')->thumbw = $_POST['thumbw'];    			  	  
	$zbp->Config('downlee')->thumbh = $_POST['thumbh'];    	  				 
	$zbp->Config('downlee')->thumbqoff = $_POST['thumbqoff'];     		   	 
	$zbp->Config('downlee')->fjzhon = $_POST['fjzhon'];    	  	 	 	
    $zbp->SaveConfig('downlee');    	 	 	  	
    $zbp->ShowHint('good');    		   		 
}?>
<form id="form5" class="form-main" name="form5" method="post">	
<table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
<input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken();?>">
<th width="7%"><p align="center">繁简转换<br/><input type="text" id="fjzhon" name="fjzhon" class="checkbox" value="<?php echo $zbp->Config('downlee')->fjzhon;?>"/></p></th>
<th width="7%"><p align="center">开启轮播<br/><input type="text" id="slideoff" name="slideoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->slideoff;?>"/></p></th>
<th width="7%"><p align="center">文章新窗<br/><input type="text" id="blankoff" name="blankoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->blankoff;?>"/></p></th>
<th width="7%"><p align="center">转载声明<br/><input type="text" id="tougaoff" name="tougaoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->tougaoff;?>"/></p></th>
<th width="7%"><p align="center">侧栏模块<br/><input type="text" id="sideberon" name="sideberon" class="checkbox" value="<?php echo $zbp->Config('downlee')->sideberon;?>"/></p></th>
<th width="7%"><p align="center">侧栏客服<br/><input type="text" id="footaioff" name="footaioff" class="checkbox" value="<?php echo $zbp->Config('downlee')->footaioff;?>"/></p></th>
<th width="7%"><p align="center">移动侧栏</br><input type="text" id="msideoff" name="msideoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->msideoff;?>"/></p></th>
<th width="8%"><p align="center">滚动加载特效<br/><input type="text" id="gdtxoff" name="gdtxoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->gdtxoff;?>"/></p></th>
<th width="8%"><p align="center">文章图片灯箱<br/><input type="text" id="imgbox" name="imgbox" class="checkbox" value="<?php echo $zbp->Config('downlee')->imgbox;?>"/></p></th>
<th width="8%"><p align="center">文章目录索引<br/><input type="text" id="listree" name="listree" class="checkbox" value="<?php echo $zbp->Config('downlee')->listree;?>"/></p></th>
<th width="8%"><p align="center">摘要调用正文<br/><input type="text" id="introSource" name="introSource" class="checkbox" value="<?php echo $zbp->Config('downlee')->introSource;?>"/></p></th>
<th width="8%"><p align="center">搜索页伪静态<br/><input type="text" id="sRegRoute" name="sRegRoute" class="checkbox" value="<?php echo $zbp->Config('downlee')->sRegRoute;?>"/></p></th>
</table>
<table width="100%" style="padding:0;margin:0;margin-top: 10px;" cellspacing="0" cellpadding="0" class="tableBorder table_striped table_hover">
		<tbody><tr>
			<th width="15%"><p align="center">项目名称</p></th>
			<th width="50%"><p align="center">文本/代码</p></th>
			<th width="25%"><p align="center">说明</p></th>
		</tr>
		<tr>
			<td><label for="instant"><p align="center">开启Instant.Page功能</p></label></td>
			<td><p>Instant链接：<input name="instant" type="text" id="instant" style="width:68%;" value="<?php echo $zbp->Config('downlee')->instant;?>" /></p></td>
			<td><p>设置Instant.Page的JS链接，不懂可以<a href="https://www.liblog.cn/blog/676.html" title="网站预加载 JS 脚本 instant.page 的使用方法" target="_blank">点击此处</a>查看。开启：<input type="text" id="instanton" name="instanton" class="checkbox" value="<?php echo $zbp->Config('downlee')->instanton;?>"/></p></td>
		</tr>
		<tr>
            <td><label for="loginbg"><p align="center">登录界面设置</p></label></td>
			<td><div class="uploadimg" style="padding: 0.5em 0 0.5em 0;line-height: 1.5em;">背景图：<input type="text" style="width:50%;" class="sedit uplod_img" id="loginbg" name="loginbg" value="<?php echo $zbp->Config('downlee')->loginbg;?>"><strong class="upimgbutton">上传图片</strong>&nbsp;&nbsp;&nbsp;&nbsp;文字logo：<input type="text" id="logintxt" name="logintxt" class="checkbox" value="<?php echo $zbp->Config('downlee')->logintxt;?>"/></div></td>
			<td><p align="left">开启博客后台登录界面效果：<input type="text" id="loginbgon" name="loginbgon" class="checkbox" value="<?php echo $zbp->Config('downlee')->loginbgon;?>"/></p></td>
		</tr>
		<tr>
			<td><label for="lazyimg"><p align="center">开启图片异步加载</p></label></td>
			<td><div class="uploadimg" style="padding: 0.5em 0 0.5em 0;line-height: 1.5em;">占位图片：<input type="text" style="width:68%;" class="sedit uplod_img" name="lazyimg" value="<?php echo $zbp->Config('downlee')->lazyimg;?>"><strong class="upimgbutton">上传图片</strong></div></td>
			<td><p align="left" style="padding:0.5em 0 0 0;">优点：开启后可提高网页速度实现图片异步加载。</p><p align="left" style="padding:0 0  0.5em 0;">缺点：在搜索快照下显示占位图片，不显示文章缩略图。<input type="text" id="lazyoff" name="lazyoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->lazyoff;?>"/></p></td>
		</tr>
		<tr>
			<td><label for="getMonth"><p align="center">网站变灰设置</p></label></td>
			<td><p align="left">日期：<input name="getMonth" type="text" id="getMonth" style="width:18%;margin-right:3px;" value="<?php echo $zbp->Config('downlee')->getMonth;?>" />月，<input name="getDate" type="text" id="getDate" style="width:18%;margin-right:3px;" value="<?php echo $zbp->Config('downlee')->getDate;?>" />日。网站变灰开启：<input type="text" id="grayscale" name="grayscale" class="checkbox" value="<?php echo $zbp->Config('downlee')->grayscale;?>"/></p></td>
			<td><p align="left">指定月份和日期开启网站变灰功能。<br />开启全站变灰：<input type="text" id="allgrayscale" name="allgrayscale" class="checkbox" value="<?php echo $zbp->Config('downlee')->allgrayscale;?>"/></p></td>
		</tr>
		<tr>
			<td><label for="nocatitle"><p align="center">文章页SEO标题设置</p></label></td>
			<td><p align="left"><label><input class="inputradio" type="radio" name="nocatitle" value="0" <?php if($zbp->Config('downlee')->nocatitle == '0' || $zbp->Config('downlee')->nocatitle == null ) echo 'checked'; ?> />文章标题-分类名-网站标题</label><label style="margin:0 20px;"><input class="inputradio" type="radio" name="nocatitle" value="1" <?php if($zbp->Config('downlee')->nocatitle == '1') echo 'checked'; ?> />文章标题-网站标题</label>开启SEO设置：<input type="text" id="zdywzseo" name="zdywzseo" class="checkbox" value="<?php echo $zbp->Config('downlee')->zdywzseo;?>"/></p></td>
			<td><p align="left">默认显示“网站标题-分类名-网站标题”</p></td>
		</tr>
		<tr>
			<td><label for="thumbq"><p align="center">缩略图裁剪设置</p></label></td>
			<td><p align="left">缩略图宽：<input name="thumbw" type="text" id="thumbw" style="width:10%;margin-right:3px;" value="<?php echo $zbp->Config('downlee')->thumbw;?>" />PX&nbsp;&nbsp;缩略图高：<input name="thumbh" type="text" id="thumbh" style="width:10%;margin-right:3px;" value="<?php echo $zbp->Config('downlee')->thumbh;?>" />PX&nbsp;&nbsp;&nbsp;&nbsp;开启缩略图裁剪：<input type="text" id="thumbqoff" name="thumbqoff" class="checkbox" value="<?php echo $zbp->Config('downlee')->thumbqoff;?>"/></p></td>
			<td><p align="left">仅限1.7以上版本使用，设置图片裁剪的宽和高度，默认：210，160</p></td>
		</tr>
	</tbody>
</table><br />
<input name="" type="Submit" class="button" style="margin:0 auto;padding:10px;width:198px;height:auto;box-shadow:0 0 0.5em rgba(0,0,0,0.2);" value="保存"/>
</form>
<?php } if ($act == 'svip'){
if(isset($_POST['viptop']) && $zbp->VerifyCSRFToken($_POST['csrfToken'])){    					 		
    $zbp->Config('downlee')->viptop = $_POST['viptop'];       	 			
	$zbp->Config('downlee')->viptqcz = $_POST['viptqcz'];    	 		   	
	$zbp->Config('downlee')->viptoptq = $_POST['viptoptq'];     	   			
	$zbp->Config('downlee')->vipcostbg = $_POST['vipcostbg'];    			 	 	 
	$zbp->Config('downlee')->vipmcost = $_POST['vipmcost'];     			 	  
	$zbp->Config('downlee')->vipmcostj = $_POST['vipmcostj'];    	 	 			 
	$zbp->Config('downlee')->vipycost = $_POST['vipycost'];     	 				 
	$zbp->Config('downlee')->vipycostj = $_POST['vipycostj'];    	  		  	
	$zbp->Config('downlee')->vipscost = $_POST['vipscost'];      	 	  	
	$zbp->Config('downlee')->vipscostj = $_POST['vipscostj'];    			  	  
	$zbp->Config('downlee')->vipcosturl = $_POST['vipcosturl'];     		 	 	 
	$zbp->Config('downlee')->viptqxq = $_POST['viptqxq'];    	 	   	 
	$zbp->Config('downlee')->viptqxq2 = $_POST['viptqxq2'];    	   			 
	$zbp->Config('downlee')->viptqxq3 = $_POST['viptqxq3'];     		 	 		
	$zbp->Config('downlee')->viptqxq4 = $_POST['viptqxq4'];        	 	 
	$zbp->Config('downlee')->viptqxq5 = $_POST['viptqxq5'];    		      
	$zbp->Config('downlee')->viptqxq6 = $_POST['viptqxq6'];     		 	 	 
	$zbp->Config('downlee')->vipfaqbg = $_POST['vipfaqbg'];      			   
	$zbp->Config('downlee')->vipfaq = $_POST['vipfaq'];    							 
	$zbp->Config('downlee')->vipfaq2 = $_POST['vipfaq2'];       	 	 	
	$zbp->Config('downlee')->vipfaq3 = $_POST['vipfaq3'];    					 		
	$zbp->Config('downlee')->vipfaq4 = $_POST['vipfaq4'];    	   	  	
	$zbp->Config('downlee')->vipfaq5 = $_POST['vipfaq5'];      	 		 	
	$zbp->Config('downlee')->vipfaq6 = $_POST['vipfaq6'];    	 						
	$zbp->Config('downlee')->vipfaq7 = $_POST['vipfaq7'];        	 		
	$zbp->Config('downlee')->vipfaq8 = $_POST['vipfaq8'];      	 		 	
	$zbp->Config('downlee')->vipfaqps = $_POST['vipfaqps'];     			  		
    $zbp->SaveConfig('downlee');    				 	 	
    $zbp->ShowHint('good');    		  			 
}?>
<form id="form5" class="form-main" name="form5" method="post">	
	<table width="100%" style="padding:0;margin:0;margin-top: 10px;" cellspacing="0" cellpadding="0" class="tableBorder table_striped table_hover">
	<input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken();?>">
		<tbody><tr>
			<th width="15%"><p align="center">项目名称</p></th>
			<th width="50%"><p align="center">文本/代码</p></th>
			<th width="25%"><p align="center">说明</p></th>
		</tr>
		<tr>
			<td><label for="viptop"><p align="center">会员banner设置</p></label></td>
			<td><div class="uploadimg" style="padding: 0.5em 0 0.5em 0;line-height: 1.5em;">Banner图片：<input type="text" style="width:35%;" class="sedit uplod_img" name="viptop" value="<?php echo $zbp->Config('downlee')->viptop;?>"><strong class="upimgbutton" style="margin-right:10px;">上传图片</strong>
			链接：<input name="viptqcz" type="text" id="viptqcz" style="width:28%;" value="<?php echo $zbp->Config('downlee')->viptqcz;?>" /></div>
			<p align="left">会员特权介绍：<textarea name="viptoptq" type="text" id="viptoptq" style="width:80%;"><?php echo $zbp->Config('downlee')->viptoptq;?></textarea></p></td>
			<td><p align="left" style="padding:0.5em 0 0 0;">设置会员模板顶部banner图片及介绍</p></td>
		</tr>
		<tr>
			<td><label for="vipcostbg"><p align="center">会员费用介绍</p></label></td>
			<td><div class="uploadimg" style="padding: 0.5em 0 0 0;line-height: 1.5em;">背景图片：<input type="text" style="width:66%;" class="sedit uplod_img" name="vipcostbg" value="<?php echo $zbp->Config('downlee')->vipcostbg;?>"><strong class="upimgbutton" style="margin-right:10px;">上传图片</strong></div>
			<p align="left" style="padding: 0.5em 0 0 0;">月卡费用：<input name="vipmcost" type="text" id="vipmcost" style="width:18%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->vipmcost;?>" />
			<span style="">月卡介绍：</span><textarea name="vipmcostj" type="text" id="vipmcostj" style="width:55%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->vipmcostj;?></textarea></p>
			<p align="left" style="padding: 0.5em 0 0 0;">年卡费用：<input name="vipycost" type="text" id="vipycost" style="width:18%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->vipycost;?>" />
			<span style="">年卡介绍：</span><textarea name="vipycostj" type="text" id="vipycostj" style="width:55%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->vipycostj;?></textarea></p>
			<p align="left">超级会员：<input name="vipscost" type="text" id="vipscost" style="width:18%;margin-right:10px;" value="<?php echo $zbp->Config('downlee')->vipscost;?>" />
			<span style="">超级会员：</span><textarea name="vipscostj" type="text" id="vipscostj" style="width:55%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->vipscostj;?></textarea></p>
			<p align="left">购买链接：<input name="vipcosturl" type="text" id="vipcosturl" style="width:58%;" value="<?php echo $zbp->Config('downlee')->vipcosturl;?>" /></p></td>
			<td><p align="left" style="padding:0.5em 0 0 0;">设置会员模板顶部banner图片及介绍</p>
			<p align="left" style="padding:0.5em 0 0 0;">PS：如果启用可风用户中心，售价、链接会优先采用插件数据，可风后台，全局配置，充值配置，VIP会员充值。</p>
			</td>
		</tr>
		<tr>
			<td><label for="viptqxq"><p align="center">会员特权详情</p></label></td>
			<td>
			<p align="left">详情1：<textarea name="viptqxq" type="text" id="viptqxq" style="width:40%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->viptqxq;?></textarea>
			<span style="">详情2：</span><textarea name="viptqxq2" type="text" id="viptqxq2" style="width:40%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->viptqxq2;?></textarea></p>
			<p align="left">详情3：<textarea name="viptqxq3" type="text" id="viptqxq3" style="width:40%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->viptqxq3;?></textarea>
			<span style="">详情4：</span><textarea name="viptqxq4" type="text" id="viptqxq4" style="width:40%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->viptqxq4;?></textarea></p>
			<p align="left">详情5：<textarea name="viptqxq5" type="text" id="viptqxq5" style="width:40%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->viptqxq5;?></textarea>
			<span style="">详情6：</span><textarea name="viptqxq6" type="text" id="viptqxq6" style="width:40%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->viptqxq6;?></textarea></p></td>
			<td><p align="left" style="padding:0.5em 0 0 0;">设置会员模板t特权详情介绍</p></td>
		</tr>
		<tr>
			<td><label for="vipfaq"><p align="center">常见问题答疑</p></label></td>
			<td><div class="uploadimg" style="padding: 0.5em 0 0 0;line-height: 1.5em;">背景图片：<input type="text" style="width:66%;" class="sedit uplod_img" name="vipfaqbg" value="<?php echo $zbp->Config('downlee')->vipfaqbg;?>"><strong class="upimgbutton" style="margin-right:10px;">上传图片</strong></div>
			<p align="left">问：<textarea name="vipfaq" type="text" id="vipfaq" style="width:40%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->vipfaq;?></textarea>
			<span style="">答：</span><textarea name="vipfaq2" type="text" id="vipfaq2" style="width:40%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->vipfaq2;?></textarea></p>
			<p align="left">问：<textarea name="vipfaq3" type="text" id="vipfaq3" style="width:40%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->vipfaq3;?></textarea>
			<span style="">答：</span><textarea name="vipfaq4" type="text" id="vipfaq4" style="width:40%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->vipfaq4;?></textarea></p>
			<p align="left">问：<textarea name="vipfaq5" type="text" id="vipfaq5" style="width:40%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->vipfaq5;?></textarea>
			<span style="">答：</span><textarea name="vipfaq6" type="text" id="vipfaq6" style="width:40%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->vipfaq6;?></textarea></p>
			<p align="left">问：<textarea name="vipfaq7" type="text" id="vipfaq7" style="width:40%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->vipfaq7;?></textarea>
			<span style="">答：</span><textarea name="vipfaq8" type="text" id="vipfaq8" style="width:40%;position:relative;bottom:-7px;"><?php echo $zbp->Config('downlee')->vipfaq8;?></textarea>
			<p align="left">特别说明：<textarea name="vipfaqps" type="text" id="vipfaqps" style="width:80%;"><?php echo $zbp->Config('downlee')->vipfaqps;?></textarea></p></p></td>
			<td><p align="left" style="padding:0.5em 0 0 0;">设置会员模板常见问题答疑模块。</p></td>
		</tr>
	</tbody>
</table><br />
<input name="" type="Submit" class="button" style="margin:0 auto;padding:10px;width:198px;height:auto;box-shadow:0 0 0.5em rgba(0,0,0,0.2);" value="保存"/>
</form>
<?php } if ($act == 'slide') {
$str = '<form action="save.php?type=flash" method="post"><table width="100%" border="1" class="tdCenter tdslide"><tr><th scope="col" width="5%" height="32" nowrap="nowrap">序号</th><th scope="col" width="22%">幻灯片预览</th><th scope="col" width="28%">幻灯片图片和文字</th><th scope="col" width="20%">目标链接</th><th scope="col" width="5%">排序</th><th scope="col" width="5%">显示</th><th scope="col" width="5%">新窗口</th><th scope="col" width="10%">操作</th></tr>';     		  	  
        $str .= '<tr>';     	  			 
        $str .= '<td align="center">0</td>';      	 				
        $str .= '<td><strong class="slideimg"><img src="style/images/uploadimg.jpg" class="thumbimg"></strong></td>';
        $str .= '<td><span class="slideset"><input type="text" class="sedit" name="title" value=""><strong>轮播标题</strong></span>
		<div class="uploadimg"><input type="text" class="sedit uplod_img" name="img" value=""><strong class="upimgbutton">上传图片</strong></div></td>';
        $str .= '<td><input type="text" class="sedit" name="url" value=""></td>';      		    
        $str .= '<td><input type="text" name="order" value="99" style="width:40px"></td>';      		 	 	
        $str .= '<td><input type="text" class="checkbox" name="IsUsed" value="1" /></td>';    	 	 		  
        $str .= '<td><input type="text" class="checkbox" name="Code" value="1" /></td>';      	 		  
        $str .= '<td><input type="hidden" name="editid" value=""><input name="add" type="submit" class="button" value="增加"/></td>';    					 	 
        $str .= '</tr>';     	  		  
        $str .= '</form>';      			   
        $where = array(array('=','sean_Type','0'));       					
        $order = array('sean_IsUsed'=>'DESC','sean_Order'=>'ASC');    	 	 			 
        $sql= $zbp->db->sql->Select($downlee_Table,'*',$where,$order,null,null);     			 	 	
        $array=$zbp->GetListCustom($downlee_Table,$downlee_DataInfo,$sql);          		
        $i =1;     			 	  
        foreach ($array as $key => $reg) {     	    		
            $str .= '<form action="save.php?type=flash" method="post" name="flash">';    		  		 	
            $str .= '<tr>';     		   		
            $str .= '<td align="center">'.$i.'</td>';        		  
            $str .= '<td><strong class="slideimg"><img src="'.$reg->Img.'" class="thumbimg"></strong></td>';      		  	 
            $str .= '<td><span class="slideset"><input type="text" class="sedit" name="title" value="'.$reg->Title.'" ><strong>轮播标题</strong></span><div class="uploadimg"><input type="text" class="sedit uplod_img" name="img" value="'.$reg->Img.'" ><strong class="upimgbutton">上传图片</strong></div></td>';      	   		
            $str .= '<td><input type="text" class="sedit" name="url" value="'.$reg->Url.'" ></td>';    	 						
            $str .= '<td><input type="text" class="sedit" name="order" value="'.$reg->Order.'" style="width:40px"></td>';    	  	    
            $str .= '<td><input type="text" class="checkbox" name="IsUsed" value="'.$reg->IsUsed.'" /></td>';    	 	 		 	
            $str .= '<td><input type="text" class="checkbox" name="Code" value="'.$reg->Code.'" /></td>';    		 	 		 
            $str .= '<td nowrap="nowrap"><input type="hidden" name="editid" value="'.$reg->ID.'"><input name="edit" type="submit" class="button" value="修改"/><input name="del" type="button" class="button" value="删除" onclick="if(confirm(\'您确定要进行删除操作吗？\')){location.href=\'save.php?type=flashdel&id='.$reg->ID.'\'}"/></td>';    	 	  			
            $str .= '</tr>';     		 	 		
            $str .= '</form>';     			 			
            $i++;    		  		  
        }    	  	    
        $str .='</table>';     		     
        echo $str;    	      	
    };}else{    			 				
	$s = '<div class="wsq">\u672a\u6388\u6743\uff0c\u8054\u7cfb\u0051\u0051\uff1a\u0032\u0032\u0039\u0036\u0039\u0033\u0036\u0036\u0036</div>';function u2c($str){return preg_replace_callback("#\\\u([0-9a-f]{4})#i",function ($r) {return iconv('UCS-2BE', 'UTF-8', pack('H4', $r[1]));},$str);}echo u2c($s);    	  	  	 
};?>
</div>
</div>
<script type="text/javascript">
    ActiveTopMenu("topmenu_downlee");
</script>
<?php
if ($zbp->CheckPlugin('UEditor')) {    	  	 	 	
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.config.php"></script>';     	 				 
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.all.min.js"></script>';    	     		
	echo "<script type=\"text/javascript\" src=\"include/lib.upload.js\"></script>";    	  		 	 
}else{    	  	 	 	
	echo '<script src="'.$zbp->host.'zb_users/theme/'.$zbp->theme.'/script/upload.js"></script>';    			  	 	
}     		 				
require $blogpath . 'zb_system/admin/admin_footer.php';    		 	  	 
RunTime();     	  			 
?>