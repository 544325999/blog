<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */ /* EL PSY CONGROO */ 	  				    	   	 	      		  	 	      			 	 
require '../../../../zb_system/function/c_system_base.php';     	     	    			 	 	      		 			       	 	  	
require $blogpath . 'zb_users/theme/new_media/admin/header.php';           	    	 	 		 	     	 	 			    			     
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php new_media_SubMenu(7);?>
<a href="https://app.zblogcn.com/?auth=4cd93505-441d-490b-ab33-db5a08e84702" target="_blank" ><span class="m-left" style="color:#f00;">作者更多应用</span></a>
</div>
<div id="divMain2">
<?php
if ($_POST && isset($_POST)) {      		 		      		 	 		     		  	 	     	 	  		
	if ($_GET && isset($_GET['type'])) {    			   		    			    	    	 	  		       						
		if ($_GET['type'] == 'add') {      	  			      	 				     	    		     		 		  
			if($zbp->Config('new_media')->HasKey('homeSliderArray')){    	  				     				 			       		  	     	 				 
				$homeSliderArray = json_decode($zbp->Config('new_media')->homeSliderArray,true);    			  	      			 		       	    		    	   		  
			}    					 	      	  			     		 	 		     		 			  
			$homeSliderArray[] = $_POST;     		  		     	   	 	            	      	 	  	
			foreach ($homeSliderArray as $key => $row) {      	    	    	     		                  	  			
			    $order[$key] = $row['order'];    	 					     			  	 	    	 			 	     			   		
			    $titles[$key]  = $row['title'];      	  		     			  	      					  	    	  			  
			}    	  	 			      	   	          		       	  		 
			array_multisort($order, SORT_ASC, $titles, SORT_DESC, $homeSliderArray);     		  	 	    	 	 	 	      	  	 		    	 	  		 
			$zbp->Config('new_media')->homeSliderArray = json_encode($homeSliderArray);      			 		      		 		     	 	 		      	       
			$zbp->SaveConfig('new_media');     					       	 	 	      				          	  			
		} elseif ($_GET['type'] == 'edit') {    		  	       	  					      	   		     	 				 
			$homeSliderArray = json_decode($zbp->Config('new_media')->homeSliderArray,true);    			 		       				  	     	  		 	     	 		 	 
			$editid = $_POST['editid'];    			 			      		 	  	      	 				      		 		 
			unset($_POST['editid']);    	  	 	 	    			 			     	  	        				  	 
			$homeSliderArray[$editid] =$_POST;    		          	   	  	     				 		     		 			 
			foreach ($homeSliderArray as $key => $row) {    				 		      		 	 		     			 	 	       		 		
			    $order[$key] = $row['order'];      	  	 	    				 		      		 	 		     	    	 
			    $titles[$key]  = $row['title'];    		 	  		      		 			     		 		 	    			  	 	
			}      					     		   			    	   		 	    	 			  	
			array_multisort($order, SORT_ASC, $titles, SORT_DESC, $homeSliderArray);    			 	 	     	 					     	   		      		 	    
			$zbp->Config('new_media')->homeSliderArray = json_encode($homeSliderArray);    	   	 	     		   		     	  		 	      				  	
			$zbp->SaveConfig('new_media');     		   		    	  					    	 	 		      		      
		}    				 			    				 	 	    	 			 	     	    		 
	}    		   		        			        			 		       			  
} elseif ($_GET && isset($_GET)) {    		  		                    	  	 	         	  
	if ($_GET['type'] == 'del') {    			  			         	 	    	 		 		     		   	 	
		$homeSliderArray = json_decode($zbp->Config('new_media')->homeSliderArray,true);    			 	 		    	  	 	       	 	 	 	    								
		$editid = $_GET['id'];      					       						    				 		       			  	
		unset($homeSliderArray[$editid]);    	 			  	    	 	   		    		  	 	     		     	
		$zbp->Config('new_media')->homeSliderArray = json_encode($homeSliderArray);    	   	       	 			 		    		  		 	    						 	
		$zbp->SaveConfig('new_media');        	  	         	 	    	   				    	 	  	 	
	}    	 	 	 	      	 	 	      		   			    	  		 		
}     				        		 	  	     		  			    	 	  	 	
if($zbp->Config('new_media')->HasKey('homeSliderArray')){        	 		     	 	  		      	    	    			 				
	$homeSliderArray = json_decode($zbp->Config('new_media')->homeSliderArray,true);    	  		 		    		 			      	   		 	    		 		   
}else{     			  		    	 		 	 	                		  	  	
	$homeSliderArray = array();       	   	    			 	 		      		 	      	 			 	 
}    			 	  	      			 		      	    	    	 			 		
?>
<!--UEditor提醒-->
<?php if (!$zbp->CheckPlugin('UEditor')) {echo '<div class="tixing"><p><b class="red">温馨提示：</b>您可以不使用<a href="'.$zbp->host.'zb_users/plugin/AppCentre/main.php?id=228" target="_blank">UEditor编辑器</a>，关闭它，但一定不要删除，否则可能影响图片上传。</p></div>';} ?>
<!--@ UEditor提醒-->
	<div class="lb_slider">
		<form action="?type=add" method="post">
		<?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
			<!--开始-->
			<div width="100%" >
				<div class="lb_li">
					<p align="center"></p>
					<p><span>标题：</span><input type="text" class="sedit" name="title" value=""></p>
					<p><span>网址：</span><input type="text" class="sedit" name="url" value=""></p>
					<p>
						<span>图片：</span>
						<span class="uploadimg"><input type="text" class="uplod_img" name="img" value=""><strong>浏览文件</strong></span>
					</p>
					<p><span>排序：</span><input type="text" name="order" value="" style="width:40px"><input type="submit" class="submit add" value="增加"/></p>
				</div>
		</form>
	<?php
foreach ($homeSliderArray as $key => $value) {    		  		        	  		       	 		 	       		 	 
	echo <<<eof
		<form action="?type=edit" method="post">
				<div class="lb_li">
					<p>{$key}</p>
					<input type="hidden" name="editid" value="{$key}">
					<p><span>标题：</span><input type="text" class="sedit" name="title" value="{$value['title']}" ></p>
					<p><span>网址：</span><input type="text" class="sedit" name="url" value="{$value['url']}" ></p>
					<p><span>图片：</span><span class="uploadimg"><input type="text" class="sedit uplod_img" name="img" value="{$value['img']}" ><strong>浏览文件</strong></span></p>
					<p><span>排序：</span><input type="text" class="sedit" name="order" value="{$value['order']}" style="width:40px"></p>
					<p>
						<input type="submit" class="submit revise" value="修改"/>
						<input type="button" class="submit delete" value="删除" onclick="if(confirm('您确定要进行删除操作吗？')){location.href='?type=del&id={$key}'}"/>
					</p>
					<div class="img"><img src="{$value['img']}" alt="{$value['title']}"></div>
				</div>
		</form>
eof;
	} ?>
			</div>
	</div>
</div>
<!--UEditor JS-->
<?php
echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.config.php"></script>';    	 	         	   	        		 	 	      			  		
echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.all.min.js"></script>';    			 		      			 				     	 		 		     	 	 		 
echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/theme/'.$zbp->theme.'/admin/js/lib.upload2.js"></script>';     	 					    	     	     	 		         	 			  
?>
<!--@ UEditor JS-->
<?php require $blogpath . 'zb_users/theme/new_media/admin/footer.php'; ?>