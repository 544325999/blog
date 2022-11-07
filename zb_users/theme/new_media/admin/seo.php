<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */ /* EL PSY CONGROO */ /* EL PSY CONGROO */    	 	 	         		        	 	  		     	  	  	 
require '../../../../zb_system/function/c_system_base.php';    		    	     	 	   	     				   	    		  		 	
require $blogpath . 'zb_users/theme/new_media/admin/header.php';         	        	   	        	 	      		    	 
?>
<!--主题配置开始-->
<div class="SubMenu">
<?php new_media_SubMenu(2);?>
<a href="https://app.zblogcn.com/?auth=4cd93505-441d-490b-ab33-db5a08e84702" target="_blank" ><span class="m-left" style="color:#f00;">作者更多应用</span></a>
</div>
<div id="divMain2">
<!--首页设置-->
	<?php
	if(count($_POST)>0){    	 	  			    			  	       	   		      		  	  
		$zbp->Config( 'new_media' )->index_title = $_POST[ 'index_title' ];      	   		      	   		     			 		     		 	 			
		$zbp->Config( 'new_media' )->index_keywords = $_POST[ 'index_keywords' ];    			  	      		  	       	      	    	   		 	
		$zbp->Config( 'new_media' )->index_description = $_POST['index_description'];    	   		 	    	    		     	    	 	    	  	   	
		if(GetVars('seo')){    		   	      				  	      	 	  	     	 	 	 	
			$zbp->Config('new_media')->seo = $_POST['seo'];       		       				 			     			 	 	         	  
		}else{    	 		   	    								        		 	    	  		 		
			$zbp->Config('new_media')->seo = '';    	 	 		 	    	 	 	 		        	 		    	 	 	  	
		}        	  	 		     	  	  	     			 	 	
		CheckIsRefererValid();  	  	           					     		   	        		 		
		$zbp->SaveConfig( 'new_media' );       	 	      	 	    	    			          				  	
		$zbp->ShowHint( 'good' );    		    	     					 	      			 			        				
	}    		 		       	     		    			 		 	    					  	
	?>
<table width="100%" border="0" cellspacing="1">   
  <tr>
    <td width="200" align="center"><h3>文章页、分类页 SEO</h3></td>
    <td>
	    <div class="lbimport">
            <p>文章页、分类页的SEO优化，请到文章发布页和分类编辑里设置</p>
		</div>
	</td>
  </tr>  
</table> 

	<form id="form2" name="form2" method="post">
	<?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>	
			<table width="100%" border="0" cellspacing="1">
  <tr>
    <td width="200" align="center"><h3>首页SEO</h3></td>
    <td>
	<div class="lbimport">
				<span>是否开启</span>
				<input type="checkbox" name="seo" id="seo" value="true" <?php if($zbp->Config('new_media')->seo) echo 'checked="checked"'?> />
				<i class="red">若使用了其他SEO插件，请关闭这里开关</i>
			</div>
			<div class="lbimport">
				<span>首页title【标题】</span>
				<input type="text" name="index_title" value="<?php echo $zbp->Config('new_media')->index_title;?>">
			</div>
			<div class="lbimport">
				<span>首页keyswords【关键词】</span>
				<input type="text" name="index_keywords" value="<?php echo $zbp->Config('new_media')->index_keywords;?>">
			</div>
			<div class="lbimport">
				<span>首页description【描述】</span>
				<textarea style="text" name="index_description" rows="4"><?php echo $zbp->Config('new_media')->index_description;?></textarea>
			</div>
		
	</td>
  </tr>
</table>
			<input name="" type="Submit" class="button" value="保存"/>
		
		
	</form>
</div>
<?php require $blogpath . 'zb_users/theme/new_media/admin/footer.php'; ?>