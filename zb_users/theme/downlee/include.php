<?php /* EL PSY CONGROO */    				 	 	
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'slide.php';    	   		  
#注册插件    	    	 	
RegisterPlugin("downlee","ActivePlugin_downlee");    			 	 	 
function ActivePlugin_downlee() {    	 	 			 
    global $zbp;     		 				
    Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu','downlee_AddMenu');      				 	
    Add_Filter_Plugin('Filter_Plugin_Admin_Header', 'downlee_Header');          	 
    Add_Filter_Plugin('Filter_Plugin_Index_Begin','downlee_moduleContent');    		 		 		
    Add_Filter_Plugin('Filter_Plugin_Search_Begin','downlee_moduleContent');        	 	 
    Add_Filter_Plugin('Filter_Plugin_Index_Begin','downlee_UrldeCode_Index_Begin');     		     
    Add_Filter_Plugin('Filter_Plugin_ViewPost_Template','downlee_Change_Url');    		 	  	 
    Add_Filter_Plugin('Filter_Plugin_Cmd_Begin','downlee_Set_Url');    	  					
	Add_Filter_Plugin('Filter_Plugin_Edit_Response5','downlee_Custommeta2');    		 				 
	Add_Filter_Plugin('Filter_Plugin_Edit_Response','downlee_resources');    	 	   	 
	Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response','downlee_cate_diyseo');     	 			  
	Add_Filter_Plugin('Filter_Plugin_Tag_Edit_Response','downlee_tags_diyseo');    			 		 	
	Add_Filter_Plugin('Filter_Plugin_Edit_Response3','downlee_Custommeta3');        			 
	Add_Filter_Plugin('Filter_Plugin_ViewList_Core','downlee_Shield_Category');    	  	 			
	Add_Filter_Plugin('Filter_Plugin_LargeData_Article', 'LargeData_Article');        		 		
	if($zbp->Config('downlee')->loginbgon=='1'){    				  		
		Add_Filter_Plugin('Filter_Plugin_Login_Header', 'downlee_LoginHeader');      	 	 	 
	}      		  	 
    if ($zbp->CheckPlugin('UEditor')) {    					   
        Add_Filter_Plugin('Filter_Plugin_Edit_Response','downlee_Edit_Response');    	 			   
    }else{     		     
		Add_Filter_Plugin('Filter_Plugin_Cmd_Ajax','downlee_Cmd_Ajax'); //挂载接口       				 
	}     	    	 
	if($zbp->Config('downlee')->imgbox=="1"){     						 
		Add_Filter_Plugin('Filter_Plugin_ViewPost_Template','downlee_Content');    	     	 
	}       			  
	if($zbp->Config('downlee')->updownoff=="1"){    	 		 		 
		Add_Filter_Plugin('Filter_Plugin_Post_Prev', 'downlee_Post_Prev');    	 		 	 	
        Add_Filter_Plugin('Filter_Plugin_Post_Next', 'downlee_Post_Next');     		 	 	 
	}     		  	  
	if($zbp->Config('downlee')->sRegRoute=='1'){     	 	  		
		Add_Filter_Plugin('Filter_Plugin_Zbp_PreLoad', 'downlee_RegRoute');     	  				
	}        		  
	if ($zbp->Config('downlee')->listree=='1') {    		      
        Add_Filter_Plugin('Filter_Plugin_ViewPost_Template', 'downlee_ViewPost');    	 				  
    }    		     	
	Add_Filter_Plugin('Filter_Plugin_Zbp_BuildTemplate', 'downlee_qqinfo_Temp');    	  				 
	Add_Filter_Plugin('Filter_Plugin_Cmd_Ajax', 'downlee_Ajax');     		    	
	//编辑模块成功时执行接口：     		     
	Add_Filter_Plugin('Filter_Plugin_CheckComment_Succeed', 'downlee_CreateModule');//审核评论成功时执行接口    				 	 	
	Add_Filter_Plugin('Filter_Plugin_PostComment_Succeed', 'downlee_CreateModule');//评论成功时执行接口    					  	
	Add_Filter_Plugin('Filter_Plugin_DelComment_Succeed', 'downlee_CreateModule');//评论删除时执行接口    		    	 
    $zbp->option['ZC_SEARCH_TYPE'] = 'single';//兼容1.6搜索    		 	 	  
}     	 		 	 
function downlee_AddMenu(&$m) {    	 	   		
    global $zbp;     	      
	array_unshift($m,MakeTopMenu("root",'主题配置',$zbp->host . "zb_users/theme/downlee/main.php?act=config","","topmenu_downlee", "icon-layers-fill"));     	  	 		
}    		  	   
function downlee_CreateModule(){       		   
	global $zbp;      	 		 	
	$zbp->AddBuildModule('comments');    	       
}    	  			 	
//主题自带的登陆页面样式，来自拓源；      	 		 	
function downlee_LoginHeader(){    					 	 
    global $zbp;        	 		
    $logo = $zbp->Config('downlee')->weblogo && $zbp->Config('downlee')->logintxt == 0 ? $zbp->Config('downlee')->weblogo : $zbp->name;    	    	 	
	$loginbg = $zbp->Config('downlee')->loginbg;    			     
    echo <<<CSSJS
		<style>input:-webkit-autofill{-webkit-text-fill-color:#000 !important;background-color:transparent;background-image:none;transition:background-color 50000s ease-in-out 0s;}.bg{height:100%;background:url({$loginbg}) no-repeat center top;background-size:cover;background-color:rgb(75 192 195 / 88%);padding-bottom:30%;}.logo{width:100%;height:auto;margin:0;padding:20px 0 10px;text-align:center;border-bottom:1px solid #eee;}.logo img{width:auto;height:50px;margin:auto;background:none;display:block;}#wrapper{width:440px;min-height:400px;height:auto;border-radius:8px;background:#fff;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);}.login{width:auto;height:auto;padding:30px 40px 20px;}.login input[type="text"],.login input[type="password"]{width:100%;height:42px;float:none;padding:0 14px;font-size:14px;line-height:42px;border:1px solid #e4e8eb;outline:0;border-radius:3px;box-sizing:border-box;}.login input[type="password"]{font-size:24px;}.login input[type="text"]:focus,.login input[type="password"]:focus{color:#0188fb;background-color:#fff;border-color:#aab7c1;outline:0;box-shadow:0 0 0 0.2rem rgba(31,73,119,0.1);}.login dl{height:auto;}.login dd{margin-bottom:14px;}.login dd.submit,.login dd.password,.login dd.username{width:auto;float:none;overflow:visible;}.login dd.checkbox{width:170px;float:none;margin:0 0 10px;}.login dd.checkbox input[type="checkbox"]{width:16px;height:16px;margin-right:6px;}.login label{width:auto;margin-bottom:5px;padding:0;font-size:16px;text-align:left;}.logintitle{padding:0 70px;font-size:24px;color:#0188fb;line-height:40px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;position:relative;display:block;}.logintitle:before,.logintitle:after{content:"";width:40px;height:0;border-top:1px solid #ddd;position:absolute;top:20px;right:30px;}.logintitle:before{right:auto;left:30px;}.button{width:100%;height:42px;float:none;font-size:16px;line-height:42px;border-radius:3px;outline:0;box-shadow:1px 3px 5px 0 rgba(72,108,255,0.3);background:#0188fb;}.button:hover{background:#0188fb;}@media only screen and (max-width:768px){.login{padding:30px 30px 10px;}.login dd{float:left;margin-bottom:14px;padding:0;}.login dd.checkbox{width:auto;padding:0;}.login dd.submit{margin-right:0;}}@media only screen and (max-width:520px){#wrapper{width:96%;margin:0 auto;}}</style>
        <script>
        $(function(){
        function check_is_img(url) {
            return (url.match(/\.(jpeg|jpg|gif|png|svg)$/) != null)
        }
        if(check_is_img("{$logo}")){
            $(".logo").find("img").replaceWith('<img src="{$logo}"/>').end().wrapInner("<a href='"+bloghost+"'/>");
        }else{
            $(".logo").find("img").replaceWith('<span class="logintitle">{$logo}<span>').end().wrapInner("<a href='"+bloghost+"'/>");
        }
        });
    </script>
CSSJS;
}    						 	
//获取QQ昵称，邮箱，空间主页    		 	    
function downlee_qqinfo_Temp(&$templates) {     		     
    global $zbp;    		 	 			
    $script = '<script src="' . $zbp->host . 'zb_users/theme/downlee/script/qqinfo.js"></script>';      	   	 
    if (isset($templates[' comments '])) {          	 
        $templates['comments'] .= '{php}$footer .=\'' . $script . '\'{/php}';    	 	     
    } else {    	 			   
        $templates['commentpost'] .= '{php}$footer .=\'' . $script . '\'{/php}';     	 		 		
    }    	 	  		 
}     	  			 
function downlee_Ajax($src) {     	 				 
    global $zbp;    	 	 		  
    if ($src === "qqinfo") {    	 		  	 
        $data = array();    	 	 	 	 
        $qq = GetVars('qq', 'GET');    						 	
        $data["QQ"] = $qq;    					  	
        $data2 = json_decode(downlee_http($qq));    	 	 				
        $data["info"] = $data2->$qq;        	  	
        JsonReturn($data);    	   	   
    }     			 			
}    	 	 	 		
function downlee_http($qq) {     				 		
    $http_post = Network::Create();     	   			
    $http_post->open('GET', "https://r.qzone.qq.com/fcg-bin/cgi_get_portrait.fcg?g_tk=&uins=" . $qq);    		  		  
    $http_post->send();     		 		  
    return iconv('GBK', 'UTF-8', trim($http_post->responseText, "portraitCallBack()"));      	  	 	
}    			  	 	
//创建搜索伪静化的规则，并挂在 Filter_Plugin_Zbp_PreLoad 接口     				   
function downlee_RegRoute() {    	 		 		 
	global $zbp;     	   			
	$route = array (      	  			
		'posttype' => 0,//文章类型    	 		  		
		'type' => 'rewrite',     				 		
		'name' => 'post_article_search', //名称     	   			
		'call' => 'ViewSearch', //呼叫的函数，匹配成功后call之，并传入一个含有各种匹配参数的数组       		   
		'urlrule' => '{%host%}search/{%q%}_{%page%}.html',//规则主体     	 	  	 
		'args' => array (     	   			
			'q' => '[^\\/_]+',//q是搜索的关键字，支持正则匹配      	  	 	
			'page',//page是页码     		  		 
		),     				  	
		'only_match_page' => false,//为假表示可以匹配没有{%page%}参数的url    			     
	);      	     
	$zbp->RegRoute($route);    		  		  
}    		  	 	 
//获取顶级分类      	  	  
function downlee_GetRootCategory(){    					 		
	global $zbp;           	
	$cate = array();       		 		
	foreach ($zbp->categorys as $category){    			  	  
		if (!$category->Level){    	  		 		
			$cate[] = $category;    	  					
		}     		     
	}      			 	 
	return $cate;        	 		
}    			 				
//排序    		  	 		
function LargeData_Article($select, $w, &$order, $limit, $option, $type=''){    					 		
    global $zbp;    		   			
    switch($type){    	  					
		case 'category':       	    
			$pagebar = $option['pagebar'];     		   	 
            $sort = GetVars('sort','GET') ? 'ASC' : 'DESC';    	     		
            switch($o = GetVars('order','GET')){    	 	 	   
                case 'view':     		    	
                    $order = array('log_ViewNums' => $sort);      	   	 
                    break;    			 			 
                case 'comment':    	  	  		
                    $order = array('log_CommNums' => $sort);    	   	 	 
                    break;       	  	 
                case 'newest':     		   	 
                default:       			 	
                    $order = array('log_PostTime' => $sort);    		 			 	
                    $sort == 'DESC' && $o = null;    		 		  	
                    break;     	  	   
            }    		 	 			
            if ($o){     		 	   
                $pagebar->UrlRule->__construct($zbp->option['ZC_CATEGORY_REGEX'] .($zbp->Config('system')->ZC_STATIC_MODE != 'REWRITE' ? '&' : '?'). 'order={%order%}&sort={%sort%}');    				   	
                $pagebar->UrlRule->Rules['{%order%}'] = $o;    	 			   
                $pagebar->UrlRule->Rules['{%sort%}'] = (int)GetVars('sort','GET');    		 	 	  
            }     		  			
            break;    		 	   	
    }     		 	 		
}    					 		
//热门标签    	   		 	
function downlee_hot_Tags($num) {    	   		 	
    global $zbp,$str;     		  	 	
    $str = '';    	      	
    $array = $zbp->GetTagList('','',array('tag_Count' => 'DESC'),array($num),'');      					 
    foreach ($array as $k => $tags) {    		 					
        $str .= "<a href=\"{$tags->Url}\" title=\"{$tags->Name}\">{$tags->Name}</a>";    	     	 
    }    	 	 	   
    return $str;    	 	 		 	
}     			 	 	
//站点信息    					   
function downlee_all_views() {//总访问量      			  	
    global $zbp;     		   		
    $all_views = GetValueInArrayByCurrent($zbp->db->Query('SELECT SUM(log_ViewNums) AS num FROM ' . $GLOBALS['table']['Post']), 'num');    	  	 	 	
    return $all_views;    	  	 	 	
}     		     
//后台顶部图片     	   			
function downlee_Header() {       			  
    global $bloghost;    					   
    echo '<style>header.header{background:url('.$bloghost.'zb_users/theme/downlee/style/images/index_bg.jpg) no-repeat center center;background-size:cover;}</style>';     					  
}     	 	    
//PC端和移动端显示不同广告    	  		 		    	  		 	     	  	 	  
function downlee_is_mobile(){    			     
    global $zbp;    	 	  		 
    if (isset($_GET['must_use_mobile'])) {          		
        return true;    		  		  
    }      	 				
    $is_mobile = false;       			 	
    $regex = '/android|adr|iphone|ipad|linux|windows\sphone|kindle|gt\-p|gt\-n|rim\stablet|opera|meego|Mobile|Silk|BlackBerry|opera\smini/i';       	 			
    if (preg_match($regex, GetVars('HTTP_USER_AGENT', 'SERVER'))) {    		   	 	
        $is_mobile = true;    				 			
    }     			   	
    return $is_mobile;    	 						
}      	  	 	
//Uditor按钮    			 	   
function downlee_Edit_Response() {     				 		
    global $zbp,$downlee;     		 	 		
    echo '<script src="'.$zbp->host.'zb_users/theme/downlee/include/uebuttons-editor.js"></script>'."\r\n";      	 	 	 
}    	 		 		 
//可风大佬图片上传功能       	   	
function downlee_Cmd_Ajax($src){    			  		 
    global $zbp;     	  		 	
    if ($src == 'downlee_upload'){        	 		
        if (!$zbp->CheckRights('UploadPst')) {     	 			 	
            $zbp->ShowError(6);    	 	    	
        }    		   			
        Add_Filter_Plugin('Filter_Plugin_Upload_SaveFile','downlee_Upload_SaveFile_Ajax');        	 	 
        $_POST['auto_rename'] = 1;    			 				
        PostUpload();    	  		 	 
        echo json_encode(array('url' => $GLOBALS['tmp_ul']->Url));    						  
        exit;         			
    }     					 	
}function downlee_Upload_SaveFile_Ajax($tmp, $ul){     	 		  	
    $GLOBALS['tmp_ul'] = $ul;      		 		 
}    		  	  	
//友好阅读     	   	 	
function downlee_ViewNums($article) {    		 	   	
    global $zbp;      				  
	$num = $article->ViewNums; 	     	  				
	if ($num >= 10000) {        		  
		$num = round($num / 10000 * 100) / 100 .' W';     		  	  
	}elseif($num >= 1000){    		  	 	 
		$num = round($num / 1000 * 100) / 100 . ' K';      	 		 	
	}else {      	   		
		$num = $num;    	  	    
	}           	
	return $num;    	 			  	
}     		 	 	 
//友好时间         	  
function downlee_TimeAgo($ptime) {     		 				
    global $zbp;    	 	    	
	if ($zbp->Config('downlee')->postime == '1' || $zbp->Config('downlee')->postime == null) {    		  		  
		$now=time();     	  				
		$ptime = strtotime($ptime);     		 				
		$day=date('Y-m-d',$ptime);    	 			   
		$today=date('Y-m-d');      	 	 	 
		$dayArr=explode('-',$day);     	 			  
		$todayArr=explode('-',$today);      	 				
		//距离的天数，这种方法超过30天则不一定准确，但是30天内是准确的，因为一个月可能是30天也可能是31天     		 	 		
		$days=($todayArr[0]-$dayArr[0])*365+(($todayArr[1]-$dayArr[1])*30)+($todayArr[2]-$dayArr[2]);    			 		  
		//距离的秒数    		  	 	 
		$secs=$now-$ptime;       			  
		if($todayArr[0]-$dayArr[0]>0 && $days>3){//跨年且超过3天    	 		    
			return date('Y-m-d',$ptime);      		 	 	
		}else{      		  		
			if($days<1){//今天      						
				if($secs<60)return $secs.'秒前';      			 		
				elseif($secs<3600)return floor($secs/60)."分钟前";    			   		
				else return "今天";     		  	 	
			}else if($days<2){//昨天    	 	    	
				return "昨天";       		 	 
			}elseif($days<3){//前天    		 		  	
				return "前天";    		 				 
			}else{//三天前    					   
				return date('m-d',$ptime);    			 		  
			}      		 	  
		}    	 	  		 
	}else{      		  		
		$ptime = strtotime($ptime);     	 	    
		if ($zbp->Config('downlee')->postime == '3') {          	 
			$etime = date('Y-m-d H:i:s', $ptime);    		 	 	  
		}else{    	   	 	 
			$etime = date('Y-m-d', $ptime);    	 		 	 	
		}       	    
		return $etime;    					   
	}     	  			 
}    		    		
//默认缩略图      				  
function downlee_firstimg($article) {    	 		 			
    global $zbp;    	  				 
    if ((ZC_VERSION_COMMIT >= 2800) && ($zbp->Config('downlee')->thumbqoff=='1')){     			  	 
        return downlee_Thumb_new($article);       		 	 
    }    	    			
    $randnum = mt_rand(1,9);    	 	    	
	$diytesetu = $article->Metas->tesetu;        	   
    $pattern = "/<img.*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/i";      					 
    $content = $article->Content;    	  	  		
    preg_match_all($pattern,$content,$matchContent);      		  		
	if ($diytesetu != ''){    		  		  
		$temp = $diytesetu;    	 				  
    } else if (isset($matchContent[1][0])) {        		 	
        $temp = $matchContent[1][0];      			 		
    } else {     	    		
        $temp = $zbp->host."zb_users/theme/downlee/style/noimg/" . $randnum . ".jpg";    	 	  		 
    }    					 	 
    return $temp;    	 				 	
}    	  		   
//Z-Blog1.7版本缩略图     	 				 
function downlee_Thumb_new($article){     		 	 	 
    global $zbp;     			  	 
	$ThumbSrc = '';    		  			 
    $randnum = mt_rand(1, 9);     	 					
	$Thumb_w= $zbp->Config('downlee')->thumbw ? $zbp->Config('downlee')->thumbw : 320;    							 
    $Thumb_h= $zbp->Config('downlee')->thumbh ? $zbp->Config('downlee')->thumbh : 240;    	 		 		 
	$diytesetu = $article->Metas->tesetu;     	 		  	
	if ($diytesetu != ''){     	   	  
		$temp = $diytesetu;     			  		
	}elseif($article->ImageCount >= 1 && (count($thumbs = $article->Thumbs($Thumb_w, $Thumb_h, 1)) > 0)){     	 	    
		$temp = $thumbs[0];    	 	     
	}else{     				 	 
		$temp = $zbp->host."zb_users/theme/".$zbp->theme."/style/noimg/".$randnum.".jpg";    					 	 
	}     	 			 	
    $ThumbSrc = $temp;      	     
    return $ThumbSrc;    		  				
}    	    		 
//灯箱插件     	    	 
function downlee_Content(&$template) {      				 	
    global $zbp;    	 						
    $article = $template->GetTags('article');    				    
    if (!empty($article)) {    	  	  	 
		$pattern = "/<img(.*?)src=('|\")([^>]*).(bmp|gif|jpeg|jpg|png|webp|svg)('|\")(.*?)>/i";      	 	 		
		$replacement = '<a href=$2$3.$4$5 data-fancybox="gallery"><img class="ue-image" src=$2$3.$4$5$6 ></a>';    		 	 			
        $content = preg_replace($pattern, $replacement, $article->Content);      	  	 	
        $article->Content = $content;     	 	 	 	
        $template->SetTags('article', $article);    	  					
    }     	  	  	
}     		 		  
//评论表情    		 		 	 
function downlee_face_files() {    				  		
    global $zbp;      		 		 
    $dir = $zbp->usersdir . 'theme/downlee/include/emotion/'.$zbp->Config('downlee')->com_face_dir.'/';    	  			  
    if (!file_exists($dir))return null;           	
    $files = GetFilesInDir($dir,'png');     		 	 	 
    foreach ($files as $key => $name) {     				 		
        $n = basename($name,'.png');    	 		    
        echo '<img class="comment_ubb" src="'.$zbp->host.'zb_users/theme/downlee/include/emotion'.$zbp->Config('downlee')->com_face_dir.'/'.$n.'.png" alt="'.$n.'" onclick="InsertText(objActive,\'[\'+this.alt+\']\',false);">';     						 
    }      	 	 	 
}     		 			 
//屏蔽分类      	 	  	
function downlee_Shield_Category(&$type,&$page,&$category,&$author,&$datetime,&$tag,&$w,&$pagebar){    		   	  
	global $zbp;    			  		 
    if ($type == 'index' && $filter = $zbp->Config('downlee')->shield) {     	    		
        $w[] = array('NOT IN', 'log_CateID', explode(',',$filter));    		 					
        $pagebar->Count = null;    				  	 
    }     			   	
}     	 				 
//文章页实现同一分类上下篇；（来自拓源）     					  
//挂接口：Add_Filter_Plugin('Filter_Plugin_Post_Prev', 'downlee_Post_Prev');       					
function downlee_Post_Prev(&$thispage){    	   	 		
    global $zbp;    	 	     
    $prev=$thispage;        			 
    $articles = $zbp->GetPostList(      			  	
        array('*'),     	    	 
        array(array('=', 'log_Type', 0), array('=', 'log_CateID', $prev->Category->ID),array('=', 'log_Status', 0), array('<', 'log_PostTime', $prev->PostTime)),     	  	 	 
        array('log_PostTime' => 'DESC'),    	    	 	
        array(1),     					  
        null    	  	  	 
    );    		 		 	 
    if (count($articles) == 1) {        	   
        return $articles[0];    				 		 
    }else{     	   			
        return null;    	  		   
    }    		  			 
}    		 	  	 
//文章页实现同一分类上下篇；     		    	
//挂接口：Add_Filter_Plugin('Filter_Plugin_Post_Next', 'downlee_Post_Next');        		 	
function downlee_Post_Next(&$thispage){     	  				
    global $zbp;      						
    $prev=$thispage;    			 			 
    $articles = $zbp->GetPostList(    				   	
        array('*'),    		      
        array(array('=', 'log_Type', 0), array('=', 'log_CateID', $prev->Category->ID),array('=', 'log_Status', 0), array('>', 'log_PostTime', $prev->PostTime)),     				   
        array('log_PostTime' => 'ASC'),      	 		 	
        array(1),       	  	 
        null      	     
    );    				 		 
    if (count($articles) == 1) {       	 	 	
        return $articles[0];     		     
    }else{    	 						
        return null;      	  	 	
    }      	 				
}        	 		
//头像优先级，来自拓源        	   
function downlee_MemberAvatar($member,$email=null){     				   
    global $zbp;        	 		
	$avatar = '';    	   		 	
    //自定义头像优先级最高    		  		 	
    if(isset($email)){    	 	  	 	
        preg_match_all('/((\d)*)@qq.com/', $email, $vai);       	 	  
        if (empty($vai['1']['0'])) {        	 		
            if($zbp->CheckPlugin('Gravatar')){     	  	 		
                $avatar = str_replace("{%emailmd5%}",md5($email),$zbp->Config('Gravatar')->default_url);      	  			
            }else{    						 	
                $avatar = $member->Avatar;    		   	 	
            }    		  	 	 
        }else{     	 	    
            $avatar = 'https://q2.qlogo.cn/headimg_dl?dst_uin='.$vai['1']['0'].'&spec=100';       	 		 
        }    	 					 
    }elseif($member->Email){    				 	  
        preg_match_all('/((\d)*)@qq.com/', $member->Email, $vai);    	  	   	
        if (empty($vai['1']['0'])) {      	 		  
            $avatar = $member->Avatar;    	 	  			
        }else{     	 		 	 
            $avatar = 'https://q2.qlogo.cn/headimg_dl?dst_uin='.$vai['1']['0'].'&spec=100';     	   		 
        }    	 	   	 
    }elseif(is_file($zbp->usersdir . 'avatar/' . $member->ID . '.png')){    	  		   
        $avatar = $zbp->host . 'zb_users/avatar/' . $member->ID . '.png';    		  		 	
    }else{    	  	  		
		if($zbp->CheckPlugin('Gravatar')){         		 
			$avatar = str_replace("{%emailmd5%}",md5($email),$zbp->Config('Gravatar')->default_url);    	   				
		}else{        		 	
			$avatar = $zbp->host . 'zb_users/avatar/' . $member->ID . '.png';      	 			 
		}    	   	   
	}     					  
    return $avatar;      	 			 
}    	  	   	
//目录      	   		
function downlee_ViewPost(&$template) {    			  			
    global $zbp;    			  	 	
    $content = '';    		 		  	
    $article = $template->GetTags('article');    			    	
    if (!empty($article)) {    			    	
        $content .= '';     	  			 
        $article->Content = $content .'<div id="listree-bodys">'. $article->Content .'</div>';    				 	  
        $template->SetTags('article', $article);    	 	   		
    }    					 		
}     		 	   
//登陆信息       	   	
function downlee_Plugin_Html_login() {     	 	 			
    global $zbp;     	 			 	
    $str = '';    		 		 		
    $str.= '';    				    
    if ($zbp->user->Level == 1) {     	  		 	
        $str.= '<a target="_blank" href="'.$zbp->host.'zb_system/admin/edit.php?act=ArticleEdt">新建文章</a><a target="_blank" href="'.$zbp->host.'zb_system/admin/index.php?act=admin">管理后台</a><i class="icon font-sign-out"></i><a href="'.BuildSafeCmdURL('act=logout').'">登出</a>';    	  			  
    } elseif ($zbp->user->ID > 0) {      			 		
        $type = GetVars('type','GET');    		 	 	 	
        $id = GetVars('id','GET');    		    		
        $str.= '<a target="_blank" href="'.$zbp->host.'zb_system/admin/index.php?act=admin">后台</a><i class="icon font-sign-out"></i><a href="'.BuildSafeCmdURL('act=logout').'">登出</a>';    	 	     
    } else {    				  	 
        if ($zbp->Config('downlee')->qqloginoff == "1") {       	    
            $str.= '<a href="'.$zbp->Config('downlee')->qqlogin.'" target="_self">QQ登陆</a><i class="icon font-sign-in"></i><a href="'.$zbp->Config('downlee')->topregister.'">注册/登录</a>';     					 	
        } else {       		  	
            $str.= '<a href="'.$zbp->Config('downlee')->topregister.'">注册/登录</a>';       			  
        }    	 	 		 	
    }    			   	 
    //echo $str;    							 
    $str = str_replace("\n", "", $str);    	 		 	  
    $str = str_replace("\r", "", $str);     				 	 
    ?>
    <?php echo addcslashes($str,'');
    ?>
    <?php
}      			 		
//自定义图片    						      		 			 	    		 			  
function downlee_Custommeta3(){     	 		 	 
    global $zbp,$article; ?>
    <link rel="stylesheet" href="<?php echo $zbp->host; ?>zb_users/theme/<?php echo $zbp->theme; ?>/style/libs/admin.css?v=<?php echo $zbp->themeinfo['modified'] ?>">
    <?php
    $s = <<<js
        <script type="text/javascript">
            var EditorIntroOption2 = {
	            toolbars:[['insertimage']],
	            initialFrameWidth:600,
	            autoHeightEnabled:false,
	            initialFrameHeight:800
            }
            UE.getEditor('meta_tesetu',EditorIntroOption2);
        </script>
js;
if ($zbp->CheckPlugin('UEditor')) {        	 	 
    echo "<script src=\"{$zbp->host}zb_users/theme/downlee/include/lib.upload.js\"></script>";       	  		
}else{     		 		 	
	echo '<script src="'.$zbp->host.'zb_users/theme/'.$zbp->theme.'/script/upload.js"></script>';    			    	
}
	echo '<div id="alias" class="editmod" style="margin: 1em 0 0.5em 0;"><label class="editinputname" style="color: red;">推荐:</label>
	<input type="text" id ="meta_recommend" name="meta_recommend" style="display: none;" value="'.htmlspecialchars($article->Metas->recommend).'" class="checkbox"/><label class="editinputname" style="margin-left:6px;">亲测可用:</label>
	<input type="text" id ="meta_usable" name="meta_usable" style="display: none;" value="'.htmlspecialchars($article->Metas->usable).'" class="checkbox"/>
	</div>';
if ($zbp->CheckPlugin('YtUser')) {}else{
	echo '<div id="alias" class="editmod" style="margin: 1em 0 0.5em 0;"><label class="editinputname">商品售价：</label>
	<input type="text" name="meta_price" style="width: 35%;" value="'.htmlspecialchars($article->Metas->price).'"/>
	</div>';
}
	echo '<div id="alias" class="editmod" style="margin: 1em 0 0.5em 0;"><label class="editinputname">演示地址：</label>
	<input type="text" name="meta_showhow" style="width: 53%;" value="'.htmlspecialchars($article->Metas->showhow).'"/>
	</div>';
	echo'<div id="alias"><p align="right" class="uploadimg"><strong class="upimgbutton" style="color: #ffffff;font-size: 14px;height: 29px;margin-left: 15px;padding: 2px;background: #3a6ea5;border: 1px solid #3399cc;cursor: pointer;">缩略图</strong><input name="meta_tesetu" id="customLogo" type="text" class="uplod_img" style="width: 65%;" value="'.$article->Metas->tesetu.'" /></p></div></div>';    	 		 	  
	if ($article->Metas->tesetu) {    	  	  	 
		echo '<p style="padding: 0;"><img id="upload123" src="'.$article->Metas->tesetu.'" width="88px" height="58px"></p>';      			 	 
	}     		 	 	 
}    	  	   	
//文章SEO      	   	 
function downlee_Custommeta2() {       	 			
    global $zbp,$article;     	 					
	echo '<div class="introbox"><div class="aliaslabel"><a href="javascript:aliaslabel()" target="_self">+++++ 文章页面SEO设置 +++++</a></div>';    	 	 		  
	if($article->Type == 1){     		  			
		echo '<div id="alias2" class="editmod"><label for="meta_specialid" class="editinputname">专题目录，设置标签ID：</label><input style="width:28%" type="text" name="meta_specialid" id="inputype"  placeholder="专题模板，右侧模板选择“special”，设置标签ID，多个ID用,隔开" value="'.htmlspecialchars($article->Metas->specialid).'"><label for="meta_specialbg" class="editinputname">专题背景图：</label><input style="width:38%" type="text" name="meta_specialbg" id="inputype"  placeholder="专题模板顶部背景图" value="'.htmlspecialchars($article->Metas->specialbg).'"></div>';    	 		 	  
	}    					   
	echo '<div id="alias2" class="editmod"><label for="meta_ArticleTitle" class="editinputname">文章页标题：</label><input style="width:60%;margin-right:10px;" type="text" name="meta_ArticleTitle" id="inputype" placeholder="SEO标题，为空则显示文章标题" value="'.htmlspecialchars($article->Metas->ArticleTitle).'">SEO标题，为空则显示文章标题</div>';    	    	 	
	echo '<div id="alias2" class="editmod"><label for="meta_Articlekey" class="editinputname">文章关键字：</label><input style="width:60%;margin-right:10px;" type="text" name="meta_Articlekey" id="inputype" placeholder="SEO关键词，为空则调用标签" value="'.htmlspecialchars($article->Metas->Articlekey).'">SEO关键词，为空则调用标签</div>';            
	echo '<div id="alias2" class="editmod"><label for="meta_Articledesc" class="editinputname">文章页描述：</label><input style="width:60%;margin-right:10px;" type="text" name="meta_Articledesc" id="inputype" placeholder="文章页描述，为空则显示文章摘要" value="'.htmlspecialchars($article->Metas->Articledesc).'">文章页描述，为空则显示文章摘要</div>';    			 	   
	if (($zbp->Config('downlee')->tougaoff == "1") && ($article->Type == "0")) {     	    	 
        echo '<div class="editmod"><label for="meta_originalauthor" class="editinputname">原文作者：</label><input type="text" name="meta_originalauthor" value="'.htmlspecialchars($article->Metas->originalauthor).'" style="width:50%;margin-right: 10px;"/>原文作者（为空则不显示）</div><div class="editmod"><label for="meta_originalurl" class="editinputname">原文链接：</label><input type="text" name="meta_originalurl" value="'.htmlspecialchars($article->Metas->originalurl).'" style="width:50%;margin-right: 10px;"/>文章来源（为空则不显示）</div>';    	 		 	  
    }    		   		 
    /*echo '<div id="alias2" class="editmod">插入视频：<input style="margin-right: 10px;" type="text" name="meta_videolee" id="edtAlias" value="'.htmlspecialchars($article->Metas->videolee).'">自动播放：<input type="text" id ="meta_videoff" name="meta_videoff" style="display: none;" value="'.htmlspecialchars($article->Metas->videoff).'" class="checkbox"/></div>';*/    	 		    
	echo '</div>';    	 	    	
}       		   
//资源接口    	  	   	
function downlee_resources() {    	 		  		
    global $zbp,$article;     			 		 
    if ($article->Type == "0") {
        echo '<table style="width:99%"><tbody><tr>
		<td style="width:58%"><div id="alias" class=""><label for="meta_resname" class="editinputname">资源名称：</label><input style="width:77%;" type="text" name="meta_resname" id="inputype" value="'.htmlspecialchars($article->Metas->resname).'"></div>
		</td><td><div id="alias" class=""><label for="meta_dpcode" class="editinputname">解压密码：</label><input type="text" style="margin-right:10px;width:25%;" name="meta_dpcode" id="inputype" value="'.htmlspecialchars($article->Metas->dpcode).'"><label for="meta_filesize" class="editinputname">文件大小：</label><input type="text" style="width:25%;" name="meta_filesize" id="inputype" value="'.htmlspecialchars($article->Metas->filesize).'"></div></td>
		</tr></tbody></table>';
		echo '<table style="width:99%"><tbody>
		<tr><td style="width: 33.333%;"><label>下载地址1</label></td><td style="width: 33.333%;"><label>下载地址2</label></td><td style="width: 33.333%;"><label>下载地址3</label></td>
		</tr>
		<tr>
			<td><div id="alias" class="downstyle"><label for="meta_bdresurl" class="editinputname">网盘链接：</label><input style="width:auto;" type="text" name="meta_bdresurl" id="inputype" value="'.htmlspecialchars($article->Metas->bdresurl).'"></div></td>
			<td><div id="alias" class="downstyle"><label for="meta_lzresurl" class="editinputname">网盘链接：</label><input style="width:auto;" type="text" name="meta_lzresurl" id="inputype" value="'.htmlspecialchars($article->Metas->lzresurl).'"></div></td>
			<td><div id="alias" class="downstyle"><label for="meta_qtresurl" class="editinputname">网盘链接：</label><input style="width:auto;" type="text" name="meta_qtresurl" id="inputype" value="'.htmlspecialchars($article->Metas->qtresurl).'"></div></td>
		</tr>
		<tr>
			<td><div id="alias" class="downstyle"><label for="meta_bdycode" class="editinputname">网盘密码：</label><input style="width:auto;" type="text" name="meta_bdycode" id="inputype" value="'.htmlspecialchars($article->Metas->bdycode).'"></div></td>
			<td><div id="alias" class="downstyle"><label for="meta_lzycode" class="editinputname">网盘密码：</label><input style="width:auto;" type="text" name="meta_lzycode" id="inputype" value="'.htmlspecialchars($article->Metas->lzycode).'"></div></td>
			<td><div id="alias" class="downstyle"><label for="meta_qtcode" class="editinputname">网盘密码：</label><input style="width:auto;" type="text" name="meta_qtcode" id="inputype" value="'.htmlspecialchars($article->Metas->qtcode).'"></div></td>
		</tr>
		</tbody></table>';
    }    					 	 
}    		 		 		
//分类SEO    		  		 	
function downlee_cate_diyseo() {     		    	
    global $zbp,$cate;
    echo '<div id="edit" class="edit category_edit"><p><strong>设置分类背景图片：</strong><br>
     <input type="text" style="width: 293px;" name="meta_catalog_bgimg" value="'.htmlspecialchars($cate->Metas->catalog_bgimg).'"/><br></p>
     <p><strong>设置分类标题：</strong>当前分类seo标题<br>
     <input type="text" style="width: 293px;" name="meta_Categorytitle" value="'.htmlspecialchars($cate->Metas->Categorytitle).'"/><br></p>
     <p><strong>设置分类关键词：</strong>当前分类关键词<br>
     <input type="text" style="width: 293px;" name="meta_Categorykey" value="'.htmlspecialchars($cate->Metas->Categorykey).'"/><br></p>
     </div>';
}    						 	
//标签SEO    	 			 	 
function downlee_tags_diyseo() {    					   
    global $zbp,$tag;
    echo '<div id="tags" class="edit tag_edit">
    <p><span class="title">标签页SEO标题：</span>（标签页SEO标题）<br><input id="meta_Tagstitle" class="edit" size="40" name="meta_Tagstitle" type="text" value="'.htmlspecialchars($tag->Metas->Tagstitle).'"></p>
    <p><span class="title">标签页关键词：</span>（用","隔开）<br><input id="meta_Tagskey" class="edit" size="40" name="meta_Tagskey" type="text" value="'.htmlspecialchars($tag->Metas->Tagskey).'"></p></div>';
}     	   	  
//外链跳转    	 				 	
function downlee_UrldeCode_Index_Begin() {      		 			
    global $zbp;     		 		  
    if (isset($_GET['urldecode'])) {    				    
        $urldecode = trim(htmlspecialchars(GetVars('urldecode', 'GET')));    			 				
        $url = base64_decode($urldecode);      		  	 
        //downlee_UrldeCode_Url_Page($url);     		     
        die;    		 	 	 	
    }      	 	  	
}    		     	
function downlee_Set_Url() {      	    	
    if (isset($_GET['hk_url'])) {    		   			
        global $zbp;    	 		   	
        if (!$zbp->CheckPlugin('downlee')) {    		    		
            $zbp->ShowError(48);    	 						
            die();    		    	 
        }    		 		 	 
        if (isset($_SERVER['HTTP_REFERER']) && substr($_SERVER['HTTP_REFERER'],0,strlen($zbp->host)) == $zbp->host) {    		  	 		
            if (trim($_GET['hk_url']) != "") {    	    	  
                Redirect(base64_decode($_GET['hk_url']));     	 	   	
            }      				 	
        }      			   
        Redirect($zbp->host);    	 			 		
    }    	 	 				
}      				 	
//评论外链转内链    		 	  		
function downlee_UrldeCode_ViewComments_Template(&$template) {     	 		 		
    global $zbp;    	 			  	
    $comments = $template->GetTags('comments');    		 					
    foreach ($comments as $key => $comment) {    	 	 			 
        $commentPage = $zbp->host."zb_system/cmd.php?act=ajax&hk_url=".base64_encode($comment->HomePage);      						
    }      	 				
}    	  	    
function downlee_Change_Url(&$t) {    		 					
    global $zbp;     		   		
    $comments = $t->GetTags('comments');    			   	 
    for ($i = 0;$i < count($comments);$i++) {    		 	    
        $comments[$i]->HomePage = $zbp->host."zb_system/cmd.php?act=ajax&hk_url=".base64_encode($comments[$i]->HomePage);     				 		
    }         		 
    $t->SetTags('comments', $comments);        		  
}          		
//热评文章     	 		 		
function downlee_side_con() {    		 	  		
    global $zbp,$str,$order;    	 	 		  
    $str = '';    			 	 	 
    $irp = "{$zbp->Config('downlee')->clrpsl}";    	 	     
    $nowtime = time();    	 	  	 	
    $settime = "{$zbp->Config('downlee')->clrpnum}"*24*60*60;       	 			
    $gettime = $nowtime-$settime;          		
    $array = $zbp->GetArticleList(array('*'),array(array('=','log_Status','0'),array('>','log_PostTime',$gettime)),array('log_CommNums' => 'DESC'),array($irp),'');      	 	 		
    foreach ($array as $n => $related) {      	 	 	 
        $ol = $n+1;     	 		  	
        $str .= '<li><a href="'.$related->Url.'" title="'.$related->Title.'（评论：'.$related->CommNums.'次）"';    			  	  
        if ($zbp->Config("downlee")->blankoff == "1") {     					  
            $str .= ' target="_blank"';           	
        }    		  				
        $str .= '><div class="hotcom-img"><img src="'.downlee_firstimg($related).'" alt="'.$related->Title.'"></div><div class="hotcom-left"><h4 class="hot-com-title"><span class="num'.$ol.'">'.$ol.'</span>'.$related->Title.'</h4><div class="hot-com-clock">评论：'.$related->CommNums.'</div></div></a></li>';    		  		 	
    }       					
    return $str;      	 				
}    					   
//热门文章    	    	  
function downlee_side_hot() {      	 	   
    global $zbp,$str,$settime;    		 	 		 
    $str = '';     	 	   	
    $irm = "{$zbp->Config('downlee')->clrmsl}";    	     	 
    $nowtime = time();    	 	 				
    $settime = "{$zbp->Config('downlee')->clrmnum}"*24*60*60;    		     	
    $gettime = $nowtime-$settime;    	 	 		  
    $array = $zbp->GetArticleList(array('*'),array(array('=','log_Status','0'),array('>','log_PostTime',$gettime)),array('log_ViewNums' => 'DESC'),array($irm),'');         	  
    foreach ($array as $n => $related) {      	 	   
        $ol = $n+1;    		 	 		 
        $str .= '<div class="list-media"><a class="media-content" href="'.$related->Url.'"';    		 		 		
        if ($zbp->Config("downlee")->blankoff == "1") {    			 		  
            $str .= ' target="_blank"';     	     	
        }    	  				 
        $str .= ' style="background-image:url('.downlee_firstimg($related).')"><span class="list-overlay"></span></a><div class="list-content"><a href="'.$related->Url.'" class="list-title h-2x">'.$related->Title.'</a><p class="list-footer"><span class="text-read">'.$related->ViewNums.' 阅读 ，</span><time class="d-inline-block">'.$related->Time('m-d').'</time></p></div></div>';    		 		  	
    }        				
    return $str;    	 	 	 	 
}       	 	  
//随机文章    			  	 	
if (ZC_VERSION_COMMIT >= 2800) {function downlee_side_random() {    			 			 
    global $zbp,$srd;    	  	 			
	$count = (int) ($zbp->modulesbyfilename['side_random']->MaxLi ? $zbp->modulesbyfilename['side_random']->MaxLi : 6);     	 				 
	$articles = $zbp->GetArticleList('*',array(array('=','log_Status','0')),array(mt_rand(0,1)?'log_ViewNums':'log_PostTime'=>mt_rand(0,1)?'DESC':'ASC'),100);       	  	 
	shuffle($articles);    	  	  	 
	$posts = count($articles) > $count ? array_chunk($articles,$count)[0] : $articles;    	 				 	
	foreach ($posts as $n => $post){          		 		 
        $sn = $n+1;    		   	 	
        $srd .= '<li class="r-item"><div class="r-item-wrap"><a class="r-thumb" href="'.$post->Url.'"';    		 			  
        if ($zbp->Config("downlee")->blankoff == "1") {     		  	  
            $srd .= ' target="_blank"';     				 	 
        }     		 	 	 
        $srd .= '><img width="480" height="300" src="'.downlee_firstimg($post).'" alt="'.$post->Title.'"></a><h4 class="r-title"><a href="'.$post->Url.'" title="'.$post->Title.'"';    			 		  
        if ($zbp->Config("downlee")->blankoff == "1") {     		   	 
            $srd .= ' target="_blank"';     	 					
        }     	   			
        $srd .= '>'.$post->Title.'</a></h4></div></li>';      						
    }     	 	 		 
    return $srd;     	  			 
}}     					  
//侧栏倒计时    	 			   
function downlee_countdown() {       		 		
    global $zbp,$djs;     				   
	$djs .= '<div class="item"id="dayProgress"><div class="title">今日已经过去<span></span>小时</div><div class="progress"><div class="progress-bar"><div class="progress-inner progress-inner-1"></div></div><div class="progress-percentage"></div></div></div><div class="item"id="weekProgress"><div class="title">这周已经过去<span></span>天</div><div class="progress"><div class="progress-bar"><div class="progress-inner progress-inner-2"></div></div><div class="progress-percentage"></div></div></div><div class="item"id="monthProgress"><div class="title">本月已经过去<span></span>天</div><div class="progress"><div class="progress-bar"><div class="progress-inner progress-inner-3"></div></div><div class="progress-percentage"></div></div></div><div class="item"id="yearProgress"><div class="title">今年已经过去<span></span>个月</div><div class="progress"><div class="progress-bar"><div class="progress-inner progress-inner-4"></div></div><div class="progress-percentage"></div></div></div>';     		  	 	
    return $djs;    	  	 	 	
}      						
//插入模块    		     	    				 	  
function downlee_buildModulediv() {    	 		    
    global $zbp;    		 	 	  
    if (!isset($zbp->modulesbyfilename['side_con'])) {    		 		  	
        $t = new Module();     		 				
        $t->Name = "热评文章";     		   		
        $t->FileName = "side_con";    	   	   
        $t->Source = "side_con";         		 
        $t->SidebarID = 0;        			 
        $t->IsHideTitle = false;    	 	 	  	
        $t->HtmlID = "side_con";    			  		 
        $t->Type = "ul";      				  
        $t->MaxLi = 9;    	   	 		
        $t->Content = '自动获取，无需修改！';     	  	  	
        $t->Save();      	 		 	
    }        	   
    if (!isset($zbp->modulesbyfilename['side_hot'])) {    	 	  		 
        $t = new Module();          	 
        $t->Name = "热门文章";    			 		  
        $t->FileName = "side_hot";     	      
        $t->Source = "side_hot";    			 			 
        $t->SidebarID = 0;     	 					
        $t->IsHideTitle = false;     			 		 
        $t->HtmlID = "side_hot";     		 		 	
        $t->Type = "div";       		 		
        $t->MaxLi = 9;          		
        $t->Content = '自动获取，无需修改！';    		  		 	
        $t->Save();     				   
    }if (ZC_VERSION_COMMIT >= 2800) {       	  		
	if (!isset($zbp->modulesbyfilename['side_random'])) {    	  	   	
        $t = new Module();    			 		  
        $t->Name = "随便看看";    	   		  
        $t->FileName = "side_random";      	 		 	
        $t->Source = "side_random";    			 		  
        $t->SidebarID = 0;      			 	 
        $t->IsHideTitle = false;    		 				 
        $t->HtmlID = "side_random";    						 	
        $t->Type = "ul";    	 	    	
        $t->MaxLi = 6;    	 		 	  
        $t->Content = '自动获取，无需修改！';     			  		
        $t->Save();     	 		   
    }}    							 
	if (!isset($zbp->modulesbyfilename['side_countdown'])) {      	   	 
        $t = new Module();     			 		 
        $t->Name = "似水流年";    	 			   
        $t->FileName = "side_countdown";    					  	
        $t->Source = "side_countdown";     	   	  
        $t->SidebarID = 0;     	   		 
        $t->IsHideTitle = false;    		 	 			
        $t->HtmlID = "side_countdown";    	 			 		
        $t->Type = "div";    	   	  	
        $t->MaxLi = 6;     		   	 
        $t->Content = '自动获取，无需修改！';     			  	 
        $t->Save();            
    }    		  	   
}     	      
function downlee_moduleContent() {       		   
    global $zbp;    	  	    
    if (isset($zbp->modulesbyfilename['side_con'])) {    		 	   	
        $i = $zbp->modulesbyfilename['side_con']->MaxLi;        	  	
        $zbp->modulesbyfilename['side_con']->Content = downlee_side_con($i);         			
    }       			  
    if (isset($zbp->modulesbyfilename['side_hot'])) {     	   		 
        $i = $zbp->modulesbyfilename['side_hot']->MaxLi;    		  				
        $zbp->modulesbyfilename['side_hot']->Content = downlee_side_hot($i);         			
    }if (ZC_VERSION_COMMIT >= 2800) {if (isset($zbp->modulesbyfilename['side_random'])) {    			     
        $i = $zbp->modulesbyfilename['side_random']->MaxLi;     	    	 
        $zbp->modulesbyfilename['side_random']->Content = downlee_side_random($i);    	 						
    }}    	  				 
	if (isset($zbp->modulesbyfilename['side_countdown'])) {    	 	     
        $zbp->modulesbyfilename['side_countdown']->Content = downlee_countdown();    	 	  			
    }    	 				  
}      					 
//SubMenu     		 				
function downlee_SubMenu($id) {     		 		 	
    $arySubMenu = array(    	       
        0 => array('基本设置', 'config', 'left', false),    	 			  	
        1 => array('首页设置', 'sysz', 'left', false),      					 
		2 => array('分类文章', 'flsz', 'left', false),    		 	 			
        3 => array('轮播背景', 'slide', 'left', false),     	    	 
        4 => array('广告设置', 'ads', 'left', false),     			  	 
        5 => array('功能开关', 'gn', 'left', false),    	  	  		
		6 => array('会员单页', 'svip', 'left', false),    				  	 
    );    	 			  	
    foreach ($arySubMenu as $k => $v) {       			 	
        echo '<a href="?act='.$v[1].'" '.($v[3] == true?'target="_blank"':'').'><span class="m-'.$v[2].' '.($id == $v[1]?'m-now':'').'">'.$v[0].'</span></a>';    	  	    
    }    	  		   
}     			 			
//初始化模块      	 	   
function InstallPlugin_downlee() {      			 		
    global $zbp;    	 	 			 
    if (!$zbp->Config('downlee')->HasKey('Version')) {     	    		
        $zbp->Config('downlee')->Version = '1.0';    		 			  
        $zbp->Config('downlee')->weblogo = '/zb_users/theme/downlee/style/images/logo.png';    	 		   	
        $zbp->Config('downlee')->yjlogo = '/zb_users/theme/downlee/style/images/logo.png';    	     	 
        $zbp->Config('downlee')->favicon = '/zb_users/theme/downlee/style/images/favicon.ico';    	 	 	 	 
		$zbp->Config('downlee')->bodybg = '/zb_users/theme/downlee/style/images/down_bg.png';    					 	 
        $zbp->Config('downlee')->webtitle = '网站标题';    	 		 			
        $zbp->Config('downlee')->websubtitle = '网站副标题(后台修改)';      		  		
        $zbp->Config('downlee')->Keywords = '设置网站关键词';    	  	 			
        $zbp->Config('downlee')->Description = '填写站点描述';       	   	
        $zbp->Config('downlee')->qicq = 'QQ';    		 		   
        $zbp->Config('downlee')->wxqrcode = '/zb_users/theme/downlee/style/images/wxqrcode.jpg';      	 		  
        $zbp->Config('downlee')->qqlogin = 'qq登录链接';         	  
        $zbp->Config('downlee')->qqloginoff = '0';    		 	   	
        $zbp->Config('downlee')->topregister = '/zb_system/login.php';    		  	  	
        $zbp->Config('downlee')->toploginoff = '1';    	    	  
		$zbp->Config('downlee')->linksub = '友情链接副标题文字';       	 		 
		$zbp->Config('downlee')->linkurl = '/';    		 	 		 
		$zbp->Config('downlee')->linkoff = '1';     					 	
		$zbp->Config('downlee')->ftwenzi = 'Copyright<i class="icon font-banquan"></i>2020<a href="/">后台修改文字</a>. 基于<a href="http://www.zblogcn.com/" rel="nofollow" title="Z-BlogPHP" target="_blank">Z-BlogPHP</a>搭建 ';    	 			  	
        $zbp->Config('downlee')->diystyle = '';    	      	
		$zbp->Config('downlee')->Displayds1 = '1';     				  	
		$zbp->Config('downlee')->sstitlebg = '/zb_users/theme/downlee/style/images/banner_top.jpg';      	   	 
		$zbp->Config('downlee')->sstitle = '国内最专业网站模板开发中心！';      			  	
		$zbp->Config('downlee')->sstext = '找不到想要的资源就来搜索一下';    	 		  	 
		$zbp->Config('downlee')->ssfrtext = '发布需求';    			 		  
		$zbp->Config('downlee')->ssfrurl = '/';     			   	
		$zbp->Config('downlee')->sstagnum = '12';     		    	
		$zbp->Config('downlee')->suggestt = '网站搭建';     		 	 	 
		$zbp->Config('downlee')->suggestu = '/';    		 				 
		$zbp->Config('downlee')->suggesti = '高品质技术人员，为您和企业提供互联网信息化定制服务';     					  
		$zbp->Config('downlee')->suggestt2 = '网站优化';     	   	 	
		$zbp->Config('downlee')->suggestu2 = '/';     		  			
		$zbp->Config('downlee')->suggesti2 = '整站质量、权重、排名提升，打造适合您的SEO优化方案';    	  			 	
		$zbp->Config('downlee')->suggestt3 = '高端定制';     		    	
		$zbp->Config('downlee')->suggestu3 = '/';    		 	    
		$zbp->Config('downlee')->suggesti3 = '专注高效率、高质量的模板主题，实现最短时间内搭建更好的网站！';      		    
		$zbp->Config('downlee')->suggestt4 = '专业团队';     	 	 		 
		$zbp->Config('downlee')->suggestu4 = '/';      	     
		$zbp->Config('downlee')->suggesti4 = '专业提供质优、品精的主题模板，搭建高质量站点!';    	  	 		 
		$zbp->Config('downlee')->suggesttoff = '1';    			  		 
		$zbp->Config('downlee')->toptextid = '1,1,1,1';     	 	  		
		$zbp->Config('downlee')->toptextoff = '1';     	  				
		$zbp->Config('downlee')->shield = '';    				  	 
		$zbp->Config('downlee')->latestitle = '最新资源';    	 	 			 
		$zbp->Config('downlee')->latestext = '关注前沿设计风格，紧跟行业趋势，精选优质好资源！';     				 	 
		$zbp->Config('downlee')->syshowid = '1,1,1';    				  	 
		$zbp->Config('downlee')->sytextidoff = '1';    	 		 		 
		$zbp->Config('downlee')->syshownum = '8';        			 
		$zbp->Config('downlee')->vipmodule = 'VIP会员尊享专属特权，真正的海量，无套路，无限量下载';       	 	 	
		$zbp->Config('downlee')->viptext1 = '年卡VIP会员';     	   	  
		$zbp->Config('downlee')->vipurl1 = '/';    		  	  	
		$zbp->Config('downlee')->viptext2 = '永久VIP会员';    	  	 	 	
		$zbp->Config('downlee')->vipurl2 = '/';    		 		 	 
		$zbp->Config('downlee')->sygoods = '1';    	 		 	 	
		$zbp->Config('downlee')->sygoodsnum = '4';       	   	
		$zbp->Config('downlee')->sygoodsoff = '1';    			  		 
		$zbp->Config('downlee')->syspecial = '1,1';       	 		 
		$zbp->Config('downlee')->syspecialnum = '9';     		  			
		$zbp->Config('downlee')->syspecialon = '1';     					 	
		$zbp->Config('downlee')->svipmodule = 'VIP会员常见问题说明';    		 	 	 	
		$zbp->Config('downlee')->svipsub = '开通会员常见问题说明，如又不懂可以联系本站客服咨询';    		 	 			
		$zbp->Config('downlee')->sviptext = '加入SVIP';     	      
		$zbp->Config('downlee')->svipurl = '/';     	 			  
		$zbp->Config('downlee')->categorybg = '/zb_users/theme/downlee/style/images/categorybg.jpg';     			   	
		$zbp->Config('downlee')->fltagnum = '12';      					 
		$zbp->Config('downlee')->toportrait = '/zb_users/avatar/1.png';     	  	   
		$zbp->Config('downlee')->mnavtopbg = '/zb_users/theme/downlee/style/images/m_nav_top_bg.jpg';    		 		   
		$zbp->Config('downlee')->clrmnum = '365';    	 	 	 		
		$zbp->Config('downlee')->clrmsl = '4';    				 		 
		$zbp->Config('downlee')->clrpnum = '365';    				 			
		$zbp->Config('downlee')->clrpsl = '4';    	  				 
		$zbp->Config('downlee')->timeout = '30';     			    
		$zbp->Config('downlee')->timeoutoff = '1';        				
		$zbp->Config('downlee')->footpage = '3';    		 	    
		$zbp->Config('downlee')->readnum = '4';    	   	   
		$zbp->Config('downlee')->readapi = '2';       		   
		$zbp->Config('downlee')->relatedoff = '1';    	 	 	 		
		$zbp->Config('downlee')->weipay = '/zb_users/theme/downlee/style/images/weixin.jpg';     	 	  	 
		$zbp->Config('downlee')->alipay = '/zb_users/theme/downlee/style/images/alipay.jpg';     	 		 		
		$zbp->Config('downlee')->wzzsoff = '1';       	 		 
		$zbp->Config('downlee')->diyubhao = '文章不错,写的很好！';      	 				
		$zbp->Config('downlee')->diyubding = '赞、狂赞、超赞、不得不赞、史上最赞！';    	  		 		
		$zbp->Config('downlee')->diyubcai = 'emmmmm……看不懂怎么破？';     	 	 		 
		$zbp->Config('downlee')->diyplwz = '请遵守相关法律与法规，文明评论。O(∩_∩)O~~';      		 	 	
		$zbp->Config('downlee')->dbnavjs = '李洋个人博客（www.liblog.cn）一个基于建站技术分享交流，博客推广，网络服务的一站式博客发展：致力于打造一个经典博客网，为网民提供更方便的一站式网上冲浪服务。希望可以和站长朋友们一起学习交流！';     		 	 		
		$zbp->Config('downlee')->dbnavbq = '<li><a rel="nofollow" href="/" target="_blank">底部导航1</a></li><li><a rel="nofollow" href="/" target="_blank">底部导航2</a></li><li><a rel="nofollow" href="/" target="_blank">底部导航3</a></li><li><a rel="nofollow" href="/" target="_blank">底部导航4</a></li>';      					 
		$zbp->Config('downlee')->icpbeian = '<a class="ico-ico" href="http://beian.miit.gov.cn" rel="nofollow" target="_blank" title="京ICP备11000001号"><img src="/zb_users/theme/downlee/style/images/icp.png" alt="京ICP备11000001号">京ICP备11000001号</a>';        		  
		$zbp->Config('downlee')->gabbeian = '<a class="beian-ico" target="_blank" href="/" rel="nofollow" title="京公网安备11000000000001号"><img src="/zb_users/theme/downlee/style/images/beian.png" alt="京公网安备11000000000001号">京公网安备11000000000001号</a>';     		 	  	
		$zbp->Config('downlee')->tongji = '网站统计代码';      				 	
        $zbp->Config('downlee')->webtime = '2000/01/01';     		    	
		$zbp->Config('downlee')->slideoff = '1';     				 	 
		$zbp->Config('downlee')->instant = '/zb_users/theme/downlee/script/instantpage.min.js';     		 	  	
		$zbp->Config('downlee')->blankoff = '1';    	       
		$zbp->Config('downlee')->sideberon = '1';    	  		  	
		$zbp->Config('downlee')->gdtxoff = '1';    	  					
		$zbp->Config('downlee')->zdywzseo = '1';    			  	 	
		$zbp->Config('downlee')->nocatitle = '0';      	    	
		$zbp->Config('downlee')->footaioff = '0';      	  			
		$zbp->Config('downlee')->tougaoff = '1';      	 	  	
		$zbp->Config('downlee')->viptop = '/zb_users/theme/downlee/style/images/vip-banner-top.jpg';       	   	
		$zbp->Config('downlee')->viptqcz = '#User/Invest/VIP';     	 	 	 	
		$zbp->Config('downlee')->viptoptq = '<span>高质量精品Z-BlogPHP主题</span><span>售后群保障</span><span>超级VIP免费使用</span><span>不限域名数量</span><span>永久免费更新</span>';    		 	  	 
		$zbp->Config('downlee')->vipcostbg = 'https://cn.bing.com/th?id=OHR.Cholula_ZH-CN9284459784_1920x1080.jpg&rf=LaDigue_1920x1080.jpg&pid=hp';     	  			 
		$zbp->Config('downlee')->vipmcost = '30';      			   
		$zbp->Config('downlee')->vipmcostj = '<li>平均每天仅需 1元</li><li>享受月卡VIP所有特权</li><li>文件下载速度最高可达 100 KB/秒</li><li>用户推广奖励佣金比例高达 10%</li>';    				    
		$zbp->Config('downlee')->vipycost = '120';    	 		  		
		$zbp->Config('downlee')->vipycostj = '<li>平均每天仅需 0.3元</li><li>享受月卡VIP所有特权</li><li>文件下载速度最高可达 100 KB/秒</li><li>用户推广奖励佣金比例高达 10%</li>';    		 	  	 
		$zbp->Config('downlee')->vipscost = '999';     	 		 		
		$zbp->Config('downlee')->vipscostj = '<li>平均每天仅需 0.27元</li><li>享受月卡VIP所有特权</li><li>文件下载速度最高可达 100 KB/秒</li><li>用户推广奖励佣金比例高达 10%</li>';    	 	   		
		$zbp->Config('downlee')->vipcosturl = '#User/Invest/VIP';    	 	 	  	
		$zbp->Config('downlee')->viptqxq = '<p>本站开发所有资源，无限量下载</p><p>真正的海量，无套路，诚意满满</p>';     	 		 		
		$zbp->Config('downlee')->viptqxq2 = '<p>VIP技术支持</p><p>协助安装、解决ZBP程序问题。</p>';      						
		$zbp->Config('downlee')->viptqxq3 = '<p>看上喜欢的，加入收藏</p><p>文件夹式收藏，方便快捷，精确查到</p>';    		  			 
		$zbp->Config('downlee')->viptqxq4 = '<p>20+原创精品，专享下载</p><p>严格审核原创版权作品，VIP任性下载！</p>';     				  	
		$zbp->Config('downlee')->viptqxq5 = '<p>全体在线客服，技术支持</p><p>尊贵特权，极速响应，为你提供保障！</p>';     	  		 	
		$zbp->Config('downlee')->viptqxq6 = '<p>VIP标示，彰显尊贵身份</p><p>点亮尊贵身份标示，散发与众不同气质</p>';      				  
		$zbp->Config('downlee')->vipfaqbg = '/zb_users/theme/downlee/style/images/shouhou.jpg';    		  		  
		$zbp->Config('downlee')->vipfaq = '赞助会员所有主题都可以用吗？';    			    	
		$zbp->Config('downlee')->vipfaq2 = '本站所有主题，现有的，或者以后发布的新款主题、只要是赞助VIP、即可享受正版权限、无需另外其他任何费用、无套路！';     			   	
		$zbp->Config('downlee')->vipfaq3 = '主题不限制域名数量吗？';      	 		 	
		$zbp->Config('downlee')->vipfaq4 = '本站所开发的Z-BlogPHP主题，不限制域名，数量，但仅限赞助会员本人使用，外泄主题包或授权将取消授权资格。';    	   		  
		$zbp->Config('downlee')->vipfaq5 = '主题新版本是免费更新的吗？';     			  	 
		$zbp->Config('downlee')->vipfaq6 = '本站所有在维护更新的主题，发布新版本后可直接免费同步下载，下载后覆盖主题包即可升级，无任何费用！';    			  	  
		$zbp->Config('downlee')->vipfaq7 = '主题支持自己修改美化二次开发吗？';      				  
		$zbp->Config('downlee')->vipfaq8 = '本站所发布的主题用户可以自行修改，美化等，并且提供了必要的子主题支持，不用担心更新覆盖问题，技术党无忧！';          	 
		$zbp->Config('downlee')->vipfaqps = '本站（www.talklee）唯一官方正版渠道并有软件著作权保护，任何其他渠道，淘宝，其他网站均为盗版，请谨防被骗，我们正在向更好的方向无限进步，作者开发不易，真诚的呼吁和希望您支持正版作者，这将为您提供更加保障的Z-BlogPHP网站驱动力。';    						 	
        $zbp->SaveConfig('downlee');     	      
    }     				   
    downlee_CreateTable();    		 		 	 
    downlee_buildModulediv();     	 	 	 	
}     		     
//卸载插件    	      	
function UninstallPlugin_downlee() {    	 		 	 	
    global $zbp;        			 
    $sql1 = $zbp->db->sql->Delete($zbp->table['Module'],array(array('=','mod_Source','side_hot')));     	 	 			
    $sql2 = $zbp->db->sql->Delete($zbp->table['Module'],array(array('=','mod_Source','side_con')));    		     	
	if (ZC_VERSION_COMMIT >= 2800) {$sql3 = $zbp->db->sql->Delete($zbp->table['Module'],array(array('=','mod_Source','side_random')));}      		    
	$sql4 = $zbp->db->sql->Delete($zbp->table['Module'],array(array('=','mod_Source','side_countdown')));      	 	 		
    $zbp->db->Delete($sql1);    	 	 	   
    $zbp->db->Delete($sql2);    	   	 	 
	if (ZC_VERSION_COMMIT >= 2800) {$zbp->db->Delete($sql3);}      	  		 
	$zbp->db->Delete($sql4);    	  		  	
}     	 		  	
//幻灯片    			     
function downlee_CreateTable() {    	  	 	 	
    global $zbp;      						
	$sqlite_Table = str_replace('%pre%',$zbp->db->dbpre,$GLOBALS['downlee_Table']);     		  		 
	if ($zbp->db->ExistTable($sqlite_Table) == false) {    	 		  	 
		$s = $zbp->db->sql->CreateTable($GLOBALS['downlee_Table'],$GLOBALS['downlee_DataInfo']);          	 
		$zbp->db->QueryMulit($s);      	    	
	}    	 						
}      		    
?>