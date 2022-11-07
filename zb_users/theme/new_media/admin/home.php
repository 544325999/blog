<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */ /* EL PSY CONGROO */ /* EL PSY CONGROO */      		        	  			 	     		 	         					 
require '../../../../zb_system/function/c_system_base.php';        		      	  	 		     	  	 		        	 			
require $blogpath . 'zb_users/theme/new_media/admin/header.php';     	  	  	    			 		 	    		  	 		    	 		 	  
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php new_media_SubMenu(3);?>
<a href="https://app.zblogcn.com/?auth=4cd93505-441d-490b-ab33-db5a08e84702" target="_blank" ><span class="m-left" style="color:#f00;">作者更多应用</span></a>
</div>
<div id="divMain2">
<!--首页设置-->
	<?php
	if(count($_POST)>0){     		 				    		  				     	 	 	 	     		 		  
		   	   			    	   			        	 	         				 
	        	 	 		     		  	        		  		       			  	
         $zbp->Config('new_media')->slider_on = $_POST['slider_on']; 	      	  	    			  			    		  				    	 		 	  
    	CheckIsRefererValid();	 	 		          		        	         				  	
		$zbp->SaveConfig( 'new_media' );    		   	      	   		 	    	  	 	 	     	  	 		
		$zbp->ShowHint( 'good' );          		    					 	     				 			    	 					 
	}    	 	 	       	 						     		 		      			 	 	 
	?>
	<form id="form2" name="form2" method="post">
	<?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>	
	<table width="100%" border="0" cellspacing="1">
			

			
  <tr>
    <td width="200" align="center"><h3>幻灯片开关</h3></td>
    <td>
	        <div class="lbimport">
				<span>是否开启</span>
				
				<input name="slider_on" type="text" value="<?php echo $zbp->Config('new_media')->slider_on; ?>" class="checkbox" style="display:none;" />
				<i class="red">灰色则表示关闭幻灯片。</i>
			</div>
	</td>
  </tr>
  
</table>
			


			
	<input name="" type="Submit" class="button" value="保存"/>
		
		
	</form>

</div>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/plugin/UEditor/ueditor.config.php"></script>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/plugin/UEditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/theme/new_media/admin/js/lib.upload.js"></script>
<?php require $blogpath . 'zb_users/theme/new_media/admin/footer.php'; ?>