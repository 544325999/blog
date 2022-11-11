<?php /* EL PSY CONGROO */    	 		 		 
      		  		
//日志      	  		 
$table['ZBlog_BaiDu_Push_Logs'] = '%pre%ZBlog_BaiDu_Push_Logs';    			  		 
$datainfo['ZBlog_BaiDu_Push_Logs'] = array(     		 			 
    'ID'             	   => array('Logs_ID','integer','',0),      	  			
	'PostID'                  => array('Logs_PostID','integer','',0),//文章ID    			 		 	
	'Type'     		       => array('Logs_Type','integer', '', 0), //日志类型 1推送成功 2推送失败      	   	 
	'Text'                 => array('Logs_Text','string',255,''),//日志详情    	 		 	 	
	'Time'     			   => array('Logs_Time','integer', '', 0), //日志时间    		 	 	  
);     		 	 	 
    			   		
    	 	 		 	
function ZBlog_BaiDu_Push_DB_ADD($a_table,$add,$dbtype){             		  	 		
    global $zbp;        			    
    if (!$a_table || !$add)return;         		  	 		
    $s = "ALTER TABLE $a_table ADD COLUMN $add $dbtype;";             	    	  
    $zbp->db->QueryMulit($s);                	 		 			
}        		 		 
    	 	  			
function ZBlog_BaiDu_Push_create_database() {    				 		 
    global $zbp,$table;     		  			
	if(!$zbp->db->ExistTable($GLOBALS['table']['ZBlog_BaiDu_Push_Logs'])){    			 		  
		$s = $zbp->db->sql->CreateTable($GLOBALS['table']['ZBlog_BaiDu_Push_Logs'],$GLOBALS['datainfo']['ZBlog_BaiDu_Push_Logs']);     						 
		$zbp->db->QueryMulit($s);    				  		
		ZBlog_BaiDu_Push_DB_ADD($table['Post'],"log_BdPush","int(11) NOT NULL DEFAULT 0");      	 		   
	}          		
}    	  		   
      		  	 
function ZBlog_BaiDu_Push_del_database() {      		 	 	
	global $zbp;       	 	 	
	if ($zbp->db->ExistTable($GLOBALS['table']['ZBlog_BaiDu_Push_Logs']) == true) {     		 			 
		$s = $zbp->db->sql->DelTable($GLOBALS['table']['ZBlog_BaiDu_Push_Logs']);    	 			  	
		$zbp->db->QueryMulit($s);     	    	 
	}     	 	   	
}      		  		