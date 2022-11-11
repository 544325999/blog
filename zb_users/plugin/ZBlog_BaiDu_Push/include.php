<?php /* EL PSY CONGROO */    					 	 
require dirname(__FILE__) . DIRECTORY_SEPARATOR . '/function/data.php';    		     	
require dirname(__FILE__) . DIRECTORY_SEPARATOR . '/function/push.php';          	 	 
require dirname(__FILE__) . DIRECTORY_SEPARATOR . '/function/function.php';          	 
require dirname(__FILE__) . DIRECTORY_SEPARATOR . '/function/verify.php';     	 		 	 
#注册插件     	    		
RegisterPlugin("ZBlog_BaiDu_Push","ActivePlugin_ZBlog_BaiDu_Push");    		  				
        	   
function ZBlog_BaiDu_Push_AddMenu(&$m){    		 	 			      			  	
	global $zbp;     	 		  	     			 			
	array_unshift($m, MakeTopMenu("root",'百度自动推送',$zbp->host . "zb_users/plugin/ZBlog_BaiDu_Push/plugin/info.php","","topmenu_ZBlog_BaiDu_Push"));    				   	      	     
}    				 	        	     
   	    			 				
        		 	
   /**     		 	 	 
     * 由提示消息获取HTML.    	    		 
     *      	    	
     * @param string $signal  提示类型（good|bad|tips）    		  			 
     * @param string $content 提示内容    	    	 	
     */    	 		  	 
function ZBlog_BaiDu_Push_ShowHint($signal, $content = '')     	  	   
    {     	  	 		
        if ($content == '') {    		 	 	  
            if (substr($signal, 0, 4) == 'good') {    	  	 		 
                $content = '操作成功';    								
				$type="success";     	     	
            }    	  	 	  
      	  		 
            if (substr($signal, 0, 3) == 'bad') {      		 			
                $content = '操作失败';       		   
				$type="danger";    		    	 
            }      		  	 
        }
        echo "<script>new $.zui.Messager('".$content."', {
    type: '".$type."',
	close: false
}).show();</script>";
    }     	 					
    	     		
        		   
     	 			  
//文章总数    			 			 
function ZBlog_BaiDu_Push_Total() {     	 	    
    global $zbp;    			   		
	$artiles = GetValueInArrayByCurrent($zbp->db->Query('SELECT COUNT(*) AS num FROM ' . $GLOBALS['table']['Post'] . ' WHERE log_Type=\'0\''), 'num');    		 	 		 
	return $artiles;       	 	  
}    			  		 
    	  		  	
//文章成功推送     				  	
function ZBlog_BaiDu_Push_Success() {       	  		
    global $zbp;    	 	     
	$post_push_key = $zbp->Config('ZBlog_BaiDu_Push')->post_push_key;     	     	
	$artiles = GetValueInArrayByCurrent($zbp->db->Query('SELECT COUNT(*) AS num FROM ' . $GLOBALS['table']['Post'] . ' WHERE log_BdPush='.$post_push_key.''), 'num');    		    	 
	return $artiles;    		  		 	
}    		 	 	 	
//文章推送失败    	 				  
function ZBlog_BaiDu_Push_Fail() {    	  	   	
    global $zbp;    			  			
	$post_push_key = $zbp->Config('ZBlog_BaiDu_Push')->post_push_key;     	 		 		
	$artiles = GetValueInArrayByCurrent($zbp->db->Query('SELECT COUNT(*) AS num FROM ' . $GLOBALS['table']['Post'] . ' WHERE log_BdPush=\'2\''), 'num');     					  
	return $artiles;    	    			
}      	 	  	
    	 			 	 
function UninstallPlugin_ZBlog_BaiDu_Push() {}       	 		 