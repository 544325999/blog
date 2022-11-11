<?php /* EL PSY CONGROO */    	  		 	 
class ZBlog_BaiDu_Push_Ajax{      	 	 	 
	public function Post_Push($url){     	 					
		global $zbp;       		 		
		$api = $zbp->Config('ZBlog_BaiDu_Push')->baiduapi;    				   	    			 	 		
		$ajax = Network::Create();    	 		        	    		 
		if (!$ajax) {                	  	    
			throw new Exception('主机没有开启网络功能');    		 		         	   	 
		}    	  	  		        	 		
		$ajax->open('POST', $api);     		 				    	   				
		$ajax->setRequestHeader('Content-Type', 'text/plain');     	 	 			         			
		$ajax->send($url);    		    		     			 			
		$result = $ajax->responseText;      		 					
		return $result;	      	  	  
  	}    		 	 		 
}    				 		 