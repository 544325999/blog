<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */ /* EL PSY CONGROO */ /* EL PSY CONGROO */     		 	 		     	 	 		     		 			            	 
require '../../../../zb_system/function/c_system_admin.php';     	 	 			    		 			        	 	        			 	  
$zbp->Load();       			    	    	  		 	 
$action = 'root';    		  		      	     		       		 	       	  	  
if ( !$zbp->CheckRights( $action ) ) {     	 	  	     					 		      	 		       	  				
	$zbp->ShowError( 6 );      	    	      		 	 	     	 	 	              
	die();    	  			      	 		 			    	      	    		 					
}    	  	  	     	 		  	     			 		 	    	 	 	   
if ( !$zbp->CheckPlugin( 'new_media' ) ) {      		  		    	 	  			    	 		         		  			
	$zbp->ShowError( 48 );    				   	     			  		    		 	 		      	  		 	
	die();    								    	 	 	       		  		       	    		
}           	    		   	       	 			 	      	 	  	
$blogtitle = '主题配置';     	   			    	 	  	          	       		   			
require $blogpath . 'zb_system/admin/admin_header.php';    	 	 			     		 	 	 	    		   		      	     	
require $blogpath . 'zb_system/admin/admin_top.php';    	 	  			      			 		      			 	     	   				
?>
<link rel="stylesheet" type="text/css" href="<?php echo $bloghost?>zb_users/theme/new_media/admin/css/style.css?v=2">
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/theme/new_media/admin/js/common.js"></script>
<div id="divMain">
	<div class="divHeader">
		<?php echo $blogtitle;?>
	</div>
	