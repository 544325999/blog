<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */ /* EL PSY CONGROO */      	         				 	  
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions/RegBuildModule.php';    	  		  	       	  		    					 		       		   
RegisterPlugin("new_media","ActivePlugin_new_media");    					  	    	 				 	    	  	 			      	   		
function ActivePlugin_new_media(){     	    	         		 	    	  					    	  		 		
	global $zbp;          		 				     					   
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu','new_media_AddMenu');//主题配置选项     			   	     	 		       							     	 				  
	Add_Filter_Plugin('Filter_Plugin_Zbp_BuildModule','new_media_rebuild_Main');//重新加载边栏     	    		     	 	        		 	   	    	  		 		
	if ($zbp->Config('new_media')->seo=="true"){ // SEO    	 	  	      	 			 		    	 		  		     		 	 		
	Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response','new_media_cate_seo');       		  		       		  	    		 			 	    		 		   
	Add_Filter_Plugin('Filter_Plugin_Tag_Edit_Response','new_media_tag_seo');     	   	      		   		     	 						      			  	
	Add_Filter_Plugin('Filter_Plugin_Edit_Response5','new_media_article_seo');    				  		    		 		       	  					    	 	  		 
	}    	 	 		     		 	           				    	 				 	     		  	  
	Add_Filter_Plugin('Filter_Plugin_ViewList_Template','new_media_tags_set');//hdp    	 	   	     	 	 				       			      			 		 	
	Add_Filter_Plugin('Filter_Plugin_Edit_Response5','new_media_article_pic');//缩略图     	 	 	         	 	 	    		     	    		 	 			
}      		        					 	     			         	  				 
         			    	    		         		      	 	 	  	
//调取图片      	  		      	 		         					      	  		 	
function new_media_thumbnail($related) {      						     	   		      	 		 		    				 		 
    global $zbp;	    		  			      		  	 	     	 	 			    				 			
	$temp=mt_rand(1,10);    	 	  			    	  	 	       	 	  	     	 	    	
	$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";    	     		     	   		 
	$content = $related->Content;     		     	    	 	  	 	
	preg_match_all($pattern,$content,$matchContent);     	   		     		  	  	
	if(isset($matchContent[1][0])){          		    	 	  	 	
		$thumb=$matchContent[1][0];      	     	    			 	 		
	}else{		          		    	 	 	 		
		if($zbp->Config('new_media')->noimgstyle=='2'){     	  	 		    	 	 	 	 
            $thumb=$zbp->Config('new_media')->noimgpic;      				 	    	 	 	  	
        }else{     	 	 	 	    	    		 
            $thumb=$zbp->host . "zb_users/theme/" .$zbp->theme. "/include/random/" .$temp. ".jpg";    			 	  	     		  		 
        }    	  					    		  	  	
	}    	 	  	 	     						 
    return $thumb;      		 			    	 			   
}    	    		        	  	 
//摘要    					 	       		  	 
function new_media_intro($as,$type,$long,$other) {      	  			     				 		
    global $zbp;    	  	 	 	    		  			 
    $str = '';    			  		     	  		 		
    if ($type=='0') {        	          					
	$str .= trim(SubStrUTF8(TransferHTML($as->Intro,'[nohtml]'),$long)).$other;    			 				    				    
    } else {        	       					   
	$str .= trim(SubStrUTF8(TransferHTML($as->Content,'[nohtml]'),$long)).$other;    	 		 	 	     	   			
    }    	 	 				    		     	
    return $str;        		 	     		  	  
}      			        		 	   
//友好时间     		 	 	       	   	 
function new_media_TimeAgo( $ptime ) {     	 	  	     	 				 	
    $ptime = strtotime($ptime);         	 	    	   	 		
    $etime = time() - $ptime;    	 	    	    	 		 		 
    if($etime < 1) return '刚刚';    			 	  	    	    		 
    $interval = array (    			  	        	 		  
        //12 * 30 * 24 * 60 * 60  =>  '年前 ('.date('Y-m-d', $ptime).')',         	      		 	 		 
        //30 * 24 * 60 * 60       =>  '个月前 ('.date('m-d', $ptime).')',     	    		       			  
        //7 * 24 * 60 * 60        =>  '周前 ('.date('m-d', $ptime).')',    		  		 	     		 	  	
		12 * 30 * 24 * 60 * 60  =>  '年前',    					  	      				 	
        30 * 24 * 60 * 60       =>  '个月前',      	 		 	      				 	
        7 * 24 * 60 * 60        =>  '周前',    	   	         	  	  
        24 * 60 * 60            =>  '天前',       					    			  		 
        60 * 60                 =>  '小时前',    			 			     	  					
        60                      =>  '分钟前',    			    	      	   	 
        1                       =>  '秒前'    	 	  		      	   	  
    );       	  		     	 	   	
    foreach ($interval as $secs => $str) {    		 	 	      				 		 
        $d = $etime / $secs;    			 	           	 	 
        if ($d >= 1) {       			 	       		  	
            $r = round($d);    	 		  	       					 
            return $r . $str;       	 	 	     		 	 		
        }    			  	      	   	  	
    };    	 		  		      		 	  
}    	     		    	   	  	
     	    		    				 		 
//排行榜 随机 最新 热门 留言     	 		  	     		  	  
function new_media_Get_Links( $type, $num, $tblogcate ) {      	 	  	       				 
    global $zbp, $str, $order;    						 	    					 	 
    //$str = '';    	             	 	  	
    $str = '';     	 	   	    	       
    if ( $type == 'previous' ) {     	   			     				  	
        $order = array( 'log_PostTime' => 'DESC' );        			      	 					
    }    	 		  		    	 	 	   
    if ( $type == 'hot' ) {    		   	          		  
        $order = array( 'log_ViewNums' => 'DESC' );      					      			    
    }        	  	      		 			
    if ( $type == 'comm' ) {        		      		 					
        $order = array( 'log_CommNums' => 'DESC' );       	 		     	  	 	 	
    }      		 			    	   		  
    if ( $zbp->db->type == "sqlite" ) {      	 		      	 			   
    	  	 	 	     		 	   
        if ( $type == 'rand' ) {     			 	      	   	   
            $order = array( 'random()' => '' );    		   	 	    	 	 	  	
        }    		   	      			 	 	 
    } else {    				 	        				  
        if ( $type == 'rand' ) {    				 	 	      	 		  
            $order = array( 'rand()' => '' );    				  	       		  		
        }    				 	 	    	 				  
    }     	  	       	   		 	
    $stime = time();    	 	  		      	 		 	 
    $ytime = ( 30 ) * 30 * 24 * 60 * 60;//30天    		 					    		 		 		
    $ztime = $stime - $ytime;     	   	 	     	  				
    if ( empty( $tblogcate ) ) {    	 			  	    	 	   	 
        $where = array( array( '=', 'log_Status', '0' ), array( '>', 'log_PostTime', $ztime ) );     	 	   	     		  			
    } else {     		  		      			   	
        $where = array( array( '=', 'log_Status', '0' ), array( '>', 'log_PostTime', $ztime ), array( '=', 'log_CateID', $tblogcate ) );    	 		 		     	       
    }    	 	 			     	   	   
    $str = $zbp->GetArticleList( array( '*' ), $where, $order, array( $num ), '' ); //注意 $str       	 			       		   
     			 	      			 		  
    return $str;      			 	     		  	  	
}    	  			       	  			 
  	    	 	 	 	      	   		     	    			
      		  	 		     		 		 	     	 	  	 
//幻灯片    						       	 		       	   				    				 		 
function new_media_tags_set(&$template){     	  	       				   	     	  	 		     		  		 
	global $zbp,$blogversion;    	            		             	 	      	  	   
	if($blogversion>=150101){    	 		  	        			       			  		    			    	
		$array = $zbp->configs['new_media']->GetData();     	 				        	 	 	     		   		        			 
	}else{    	 	 		       		            			 	      	   		
		$array = $zbp->configs['new_media']->Data;    	   	 		        		 	    			 	  	     	   	  
	}    			 	 	     				 		      			 	 	      				 	
	foreach ($array as $key=>$val){    					 	      	 	  	     			   	     		 			  
			$template->SetTags($key,$val);     		 	         	  			    	 			 		      	     
	}      		  		      	         			  	 	     		 	   
}    			 		    	 			       	   			     	  		 		
function new_media_AddMenu(&$m){      	         	 	 	       		 	  	     	 	  			
	global $zbp;    	  	 			     						     	  	        	 	 	 		
	array_unshift($m, MakeTopMenu("root",'<span style="font-weight:700; color:#3a6ea5;">主题配置</span>',$zbp->host . "zb_users/theme/$zbp->theme/admin/index.php","","topmenu_new_media"));        	 		       	 	       		   		       		 	 
}      	 	  	      	 	 			    	 		   	
function new_media_GetArticleCategorys($Rows,$CategoryID,$hassubcate){    		  		           			      			  	
        global $zbp;      			  	    	  		 		    		    	 
    $ids = strpos($CategoryID,',') !== false ? explode(',',$CategoryID) : array($CategoryID);     		 		       			 		     			 	  	
    $wherearray=array();     	  	 	      	 	   		         	  
    foreach ($ids as $cateid){    		 	 			    			  			    	   	  	
      if (!$hassubcate) {      		 	 	     	  			     	 	  		 
        $wherearray[]=array('log_CateID',$cateid);      	  		 	        	 	       			 	 
      }else{    		   			    	  	  	     				   	
                $wherearray[] = array('log_CateID', $cateid);    			   		       					    			 			 
                foreach ($zbp->categorys[$cateid]->SubCategorys as $subcate) {     	 	 		      			         	 				 
                    $wherearray[] = array('log_CateID', $subcate->ID);    	  	 	      	    	       	   	 	
                }    		   	       	   			         	  
      }    				 	 	     		 			     		   	  
    }     					      	  	  	       		    
    $where=array(      					 	    		          				 	 	
                    array('array',$wherearray),       	 	 	     						 	        	   
                    array('=','log_Status','0'),       	  	      			 		 	    			   		
                    );     					       	  	   	     		 			 
      				  	    		 	 			          		
    $order = array('log_ViewNums'=>'DESC');      						      	  	 		    		   			
    $articles=    $zbp->GetArticleList(array('*'),$where,$order,array($Rows),'');         	 						    						       	 	 	  
      				 		     					 	    		 		 	 
        return $articles;    	 	            				        				 
}            				  	       	 	 		    	     	             
function new_media_SubMenu($id){     		 		      		          			 	 	        	 		 
	$arySubMenu = array(		    	 	           	   		 		 		    	 	 				    	  	 	      		 				 
	    1 => array('基本设置', 'index', 'left', false),    	  	         							       	 			     		  	 	
		3 => array('首页设置', 'home', 'left', false),    		  			       		   	     		 	   
		4 => array('侧栏设置', 'sider', 'left', false),        	 					          	     			 	 	     				 			      	 		 	
		7 => array('幻灯片', 'slide', 'left', false),    	 		             		      			 	 	    	   		  
		2 => array('SEO', 'seo', 'left', false),      	    	 	 	 	    	 	   	     	 	    	    						  
		5 => array('广告设置', 'ad', 'left', false),    				         	  		         				     			 			 
		      		 			    	  				     	   	         	  	 	
		    		   			    	  			 	     		         	 			 	 
	);      		   	    	 	 	       			 	  	       					
	foreach($arySubMenu as $k => $v){     	   	 	    	 	  	      		   		     	     	 
		echo '<a href="'.$v[1].'.php" '.($v[3]==true?'target="_blank"':'').'><span class="m-'.$v[2].' '.($id==$k?'m-now':'').'">'.$v[0].'</span></a>';     		  			    	 	  			       		 	      		  	  
	}      		 		      		  			    	 	 	 		    	 		  		
}     	 			        	  	 	    			  		       		 	 	
         	   		       		 		  
function new_media_article_pic() {      			 		    	 	   	         	 	     	 						
	global $zbp, $article;     	           	 		 		     	   	      		 	 			
       	  		      				         	  		    		   			
	if($article->Type=="0"){    			 			        	          	 			     		 		   
		if (!$zbp->CheckPlugin('UEditor')) {
		echo "<script type=\"text/javascript\" src=\"{$zbp->host}zb_users/plugin/UEditor/ueditor.config.php\"></script>
		<script type=\"text/javascript\" src=\"{$zbp->host}zb_users/plugin/UEditor/ueditor.all.min.js\"></script>";
		}    	               		      	 	 			      				  	
		echo "<script type=\"text/javascript\" src=\"{$zbp->host}zb_users/theme/{$zbp->theme}/admin/js/lib.upload2.js\"></script>";    	 	 			       		 		     	 	 		 	     				 	 
		echo "<link href=\"{$zbp->host}zb_users/theme/{$zbp->theme}/admin/css/article.css\" rel=\"stylesheet\" type=\"text/css\" />";      	  	 	    	 					     	  	        	 	     
		if (!$zbp->CheckPlugin('UEditor')) {echo '<p>您可以不使用UEditor编辑器，关闭它，但一定不要删除，否则可能影响图片上传。</p>';}
		echo '<div class="uploadimg">
			<input type="text" name="meta_pic" class="uplod_img" placeholder="请点击右侧上传按钮，上传缩略图片或输入图片地址..." value="' . $article->Metas->pic . '" /><strong style="">浏览文件</strong>
		</div>';
	}     	   	      		 	 	 	    	   	  	       	  		
}     	 	 			                				  	 
      	  	      	  					    	  		 		
    			 	  	     	 	 	 	     	 	 			
    	 			 	     	  				    				 			
  	 		      	 	 		       						       	 	  
//文章SEO    		 	 			     	 			 	       		          	 	 	
function new_media_article_seo() {        	 		       	   	    	 		 		            	
	global $zbp, $article;       		  	     		 	 	      	  	       	  		  	
	if($article->Type=="0"){      	 	 	          	 	    			 	  	     		  	  
		echo "<script type=\"text/javascript\" src=\"{$zbp->host}zb_users/theme/{$zbp->theme}/admin/js/seo.js\"></script><link href=\"{$zbp->host}zb_users/theme/{$zbp->theme}/admin/css/seo.css\" rel=\"stylesheet\" type=\"text/css\" />";      		   	    	 			 	     			 	 	        	  	 
		if ($article->Metas->new_media_articletitle || $article->Metas->new_media_articlekeywords || $article->Metas->new_media_articledescription){    	   	 		    	    			    	 		 		      	 			 	
			echo '<div class="articleseo articleseo_on">';    	   		 	     						       					     	 	  	  
		}else{    	      	           	       	  		      	 			 
			echo '<div class="articleseo">';     	  	 	         				     	  				    		      
		}
		echo '<span>点击优化本文ESO</span><input type="text" name="meta_new_media_articletitle" placeholder="标题" value="'.htmlspecialchars($article->Metas->new_media_articletitle).'"/>
    	<input type="text" name="meta_new_media_articlekeywords" placeholder="关键词" value="'.htmlspecialchars($article->Metas->new_media_articlekeywords).'"/>
    	<textarea type="text"  name="meta_new_media_articledescription" placeholder="描述文字" rows="3">'.htmlspecialchars($article->Metas->new_media_articledescription).'</textarea>
    	</div>

		
		
		';
	}    		  	 		    	 	 			     		 	 		     	 				  
};      		         		 	       	  		 		     		 		 	
     	  			     	 			 		     		 	 		     	  			 
//分类SEO    	  	   	      	   	         		 	    	 					 
function new_media_cate_seo(){     	   		     	      	     	 	 			      	  	  
    global $zbp,$cate;
	echo '<div id="alias" class="editmod">
       <span class="title">当前分类标题、关键词、描述<font color="#FF0000">(不填写则按主题默认显示,注：此功能为当前模板自带)</font></span><br />
       <strong>标题</strong><br>
       <input type="text" style="width:75%;" name="meta_new_media_catetitle" value="'.htmlspecialchars($cate->Metas->new_media_catetitle).'"/><br>
       <strong>关键词</strong><br>
       <input type="text" style="width:75%;" name="meta_new_media_catekeywords" value="'.htmlspecialchars($cate->Metas->new_media_catekeywords).'"/><br>
       <strong>描述</strong><br>
       <input type="text" style="width:75%;" name="meta_new_media_catedescription" value="'.htmlspecialchars($cate->Metas->new_media_catedescription).'"/>
       </div>';
}       	  			      	  	 		       			  
     		  	 	    	  	 			    		  		  
    				 	 	       					     	 				 
				          			 	     	  	 		       	  		
     	 	         	   	 	    	    		     	       
    	    	 	      	   		    	   		        	 	 		
//tag SEO     	  			     	   	       	 		 			         		 
function new_media_tag_seo(){      						      	 	       	 		 	         	 	  
    global $zbp,$tag;
	echo '<div id="alias" class="editmod">
       <span class="title">当前TAG标题、关键词、描述<font color="#FF0000">(不填写则按主题默认显示,注：此功能为当前模板自带)</font></span><br />
       <strong>标题</strong><br>
       <input type="text" style="width:75%;" name="meta_new_media_tagtitle" value="'.htmlspecialchars($tag->Metas->new_media_tagtitle).'"/><br>
       <strong>关键词</strong><br>
       <input type="text" style="width:75%;" name="meta_new_media_tagkeywords" value="'.htmlspecialchars($tag->Metas->new_media_tagkeywords).'"/><br>
       <strong>描述</strong><br>
       <input type="text" style="width:75%;" name="meta_new_media_tagdescription" value="'.htmlspecialchars($tag->Metas->new_media_tagdescription).'"/>
       </div>';
}    		 		  	    		  		      	 	 		 	    		    	 
                 	     		 	  	     							    	       
function InstallPlugin_new_media(){    	 	 	         	 		 	    	             	  			
	global $zbp;     			   	    	 	 				     	  				    	  		  	
	if(!$zbp->Config('new_media')->HasKey('Version')){  			      	 	 		    		   	      	  		   
		$zbp->Config('new_media')->Version = '1.0';       	 	 		    	   	 		
		       	  		       		 		
		    	 	  	      		 		   
		$zbp->Config('new_media')->noimgstyle = '1';        						    					  	
		$zbp->Config('new_media')->links_on = '1'; 	    		  		 	    	 	 		      	    	  
		$zbp->Config('new_media')->post_related = '1';     					 	     	  	   	
		$zbp->Config('new_media')->slider_on = '1';    				         	 	    
		//$zbp->Config('new_media')->login_on = '1';        	       	   	  	      	  		 
		//$zbp->Config('new_media')->register = '{#ZC_BLOG_HOST#}zb_system/login.php';       	  	  	      				      	 		 	 	
		//$zbp->Config('new_media')->login = '{#ZC_BLOG_HOST#}zb_system/login.php';      		 		 	    				         				  	
		//$zbp->Config('new_media')->ucenter = '{#ZC_BLOG_HOST#}zb_system/admin/index.php?act=admin';      	 		 	     	 	 	 		    		  		 	
		//$zbp->Config('new_media')->contribute = '{#ZC_BLOG_HOST#}zb_system/cmd.php?act=logout';  		      		   	       		   
		$zbp->Config('new_media')->copy_on = '1';    		  	       	 		 			
		$zbp->Config('new_media')->copyright = '非零博客设计制作';     					       					 	     		    		
		$zbp->Config('new_media')->beian = '京ICP备77777777';        			              
		$zbp->Config('new_media')->foot_on ='1';
		$zbp->Config('new_media')->foothtml = '<a href="#" target="_blank">联系站长</a>
<a href="#" target="_blank">关于本站</a>
<a href="#" target="_blank">投稿须知</a>
<a href="#" target="_blank">申请友链</a>
<a href="#" target="_blank">广告合作</a>
<a href="#" target="_blank">商务洽谈</a>'; 		    			   		
		    	  	   	     							         	  
  				  	      		 		 	      			 	 
		$zbp->Config('new_media')->seo = 'true';      			 	       	   	 	     	 	 	 		        		 	
		$zbp->Config('new_media')->index_title = '非零自媒体';    								     		 				
		    		 				     						 	
		    	  			      	  	 		 
		$zbp->Config('new_media')->site_title = '非零自媒体';        			     	  	   	
		$zbp->Config('new_media')->site_intro = '日拱一卒，功不唐捐';     	 	 			     					  
	 	     	  	 	 	    		 		          			  
		   	  	  	    	  	 			    	 	           	 		 	
		$zbp->SaveConfig('new_media');    		          	    	        	   	         		  
	}     		         	    			      	   		     			 	 	
}    	  		 		    		   	 	         	      	 	  	  
       			      	 				      	 		             			
function UninstallPlugin_new_media(){    	    			          	          	       				  	
	global $zbp;      	 			         			    		   			      						
}      	 	  	    			 	 	     		  		 	    				  		
     	 	         		           		   	            
         	      			 				       	 			    		   		 
?>