<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */ /* EL PSY CONGROO */ /* EL PSY CONGROO */    						        	 				          	     	 	 		  
require '../../../../zb_system/function/c_system_base.php';    	    			     			 	 	    	 		  	      	 				 
require $blogpath . 'zb_users/theme/new_media/admin/header.php';    		  		      	    		     		   	      	 			 		
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php new_media_SubMenu(4);?>
<a href="https://app.zblogcn.com/?auth=4cd93505-441d-490b-ab33-db5a08e84702" target="_blank" ><span class="m-left" style="color:#f00;">作者更多应用</span></a>
</div>
<div id="divMain2">
<!---->
<?php
	if(count($_POST)>0){     		 				    		   		      	     	    	 				  
		$zbp->Config( 'new_media' )->sharehtml = $_POST[ 'sharehtml' ];//sharehtml     	 	  		     		 	 	       		   	     	 			 	
		$zbp->Config( 'new_media' )->post_related_side_num = $_POST[ 'post_related_side_num' ];//post_related_side_num    		  	 		     	  		      	  			 	      	 	 		
		$zbp->Config( 'new_media' )->post_related_num = $_POST[ 'post_related_num' ];//post_related_num    	    	 	     		  		     	  			        	 				
		//share      	   		       	  	        		 	     					 	 
		if(GetVars('share')){    	    	 	    		  		 	    			  	        		 			
			$zbp->Config('new_media')->share = $_POST['share'];       	 	 	    		  	  	     		  		     		 			  
		}else{        		      	  	  	      			 	      			 		  
			$zbp->Config('new_media')->share = '';    	   	 	       			           		 	       					
		}    			 		 	    	 	  	 	    	 	 	       				 		 
		      	 		      				 	 	    	 		 			    					  	
		if(GetVars('post_mate')){    	 	    	      		  		      		 			     			 	 	
			$zbp->Config('new_media')->post_mate = $_POST['post_mate'];     		 				         	 	    	 		 			         		 
		}else{     	 	  	     	 	   		     			 		     		   	  
			$zbp->Config('new_media')->post_mate = '';     	 	         	  		      	   				     					 	
		}     	     	      	 	 	       			 		       	 	 	
		     	 		 	     	   		 	    	   			     							 
		    			   		    		 	 	 	     		 		 	     	  	 		
     	 CheckIsRefererValid(); 	  	    			   	     		 				       	 	 		
		$zbp->SaveConfig( 'new_media' );    				  		       				        		  	    		 				 
		$zbp->ShowHint( 'good' );    	 	    	    				   	     	  			     	 		   	
	}    	 	 	  	    			 				    	  	         			    
?>
	<form id="form2" name="form2" method="post">
	<?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
		<div class="lbadmin">
			<h3>网页分享</h3>
			<div class="lbimport">
				<span>分享按钮</span>
				<input type="checkbox" name="share" id="share" value="true" <?php if($zbp->Config('new_media')->share) echo 'checked="checked"'?> />
			</div>
			<div class="lbimport">
				<span>第三方分享代码</span>
				<textarea type="text" name="sharehtml" id="sharehtml" rows="3"><?php echo $zbp->Config('new_media')->sharehtml;?></textarea>
				<i>粘贴第三方分享代码</i>
			</div>
			<!--///-->
			<h3>文章正文区</h3>
			<div class="lbimport">
				<span>时间、作者等一行</span>
				<input type="checkbox" name="post_mate" id="post_mate" value="true" <?php if($zbp->Config('new_media')->post_mate) echo 'checked="checked"'?> />
			</div>
			
			<!--///-->
			<h3>文章页相关推荐</h3>

			<div class="lbimport">
				<span>侧边栏相关推荐最多几个</span>
				<input type="text" name="post_related_side_num" id="post_related_side_num" value="<?php echo $zbp->Config('new_media')->post_related_side_num;?>" />
				<i class="red">填写数字即可，侧栏相关推荐设置：模块管理 - related_side模块 - 拖拽到侧栏3</i>
			</div>
			<div class="lbimport">
				<span>文章下相关推荐条数</span>
				<input type="text" name="post_related_num" id="post_related_num" value="<?php echo $zbp->Config('new_media')->post_related_num;?>" />
				<i>填写数字即可</i>
			</div>
			<!--///-->
			<input name="" type="Submit" class="button" value="保存"/>
		</div>
	</form>
<!---->
</div>
<?php require $blogpath . 'zb_users/theme/new_media/admin/footer.php'; ?>