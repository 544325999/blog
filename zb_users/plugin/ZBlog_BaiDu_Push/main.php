<?php /* EL PSY CONGROO */     		 	 		
require '../../../zb_system/function/c_system_base.php';        	 		
require '../../../zb_system/function/c_system_admin.php';    					 		
$zbp->Load();    	 				 	
$action='root';    	  			 	
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}    		 	  		
if (!$zbp->CheckPlugin('ZBlog_BaiDu_Push')) {$zbp->ShowError(48);die();}         	 	
     	   			
if (count($_POST) > 0) {    			 			 
CheckIsRefererValid();    								
}    		 	    
     	    	 
$blogtitle='ZBlog百度自动推送';    	  		 	 
require $blogpath . 'zb_system/admin/admin_header.php';     			 	 	
require $blogpath . 'zb_system/admin/admin_top.php';    		 		 		
?>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
  </div>
  <div id="divMain2">
<!--代码-->
  </div>
</div>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';     			 	 	
RunTime();    			   	 
?>