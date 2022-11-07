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
<!--首页设置-->
	<?php
	if(count($_POST)>0){     		 				   	   			    			   		    	   				      	 		 	
	  		 	 		 	   	     	  				   	 	          		     			   	     	 	  	 
		  $zbp->Config( 'new_media' )->site_avatar = $_POST[ 'site_avatar' ];	      				    
		  $zbp->Config( 'new_media' )->site_bg = $_POST[ 'site_bg' ];	     					  
		  $zbp->Config( 'new_media' )->site_title = $_POST[ 'site_title' ];	     					 	     	 	        		  				
		  $zbp->Config( 'new_media' )->site_intro = $_POST[ 'site_intro' ];	     	 	 	 	 	 	 	 	      					 	    	 	            	   	
    	CheckIsRefererValid();	 	 		     	 	 		 	     	 		  	    	   			 
		$zbp->SaveConfig( 'new_media' );    		   	      			    	     				 		    	 			  	
		$zbp->ShowHint( 'good' );          		    			 		        		 			    	 	  	  
	}    	 	 	        	    	      	   		       	 	   
	?>
	<form id="form2" name="form2" method="post">
	<?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>	
			<!--///-->
			<table width="100%" border="0" cellspacing="1">

  </tr>
      <tr>
    <td align="center" width="200"><h3>站长数据<br><small>模块管理 > shuju</small></h3></td>
    <td>
	 
			<div class="lbimport">
				<span>站长头像</span>
				<input type="text" name="site_avatar" class="uplod_img" placeholder="点我传站长头像..." value="<?php echo $zbp->Config('new_media')->site_avatar;?>">
				<i>建议80*80</i>
			</div>
			<div class="lbimport">
				<span>背景图</span>
				<input type="text" name="site_bg" class="uplod_img" placeholder="点我传背景..." value="<?php echo $zbp->Config('new_media')->site_bg;?>">
				<i>建议340*138</i>
			</div>			
			<div class="lbimport">
				<span>站点名称</span>
				<input type="text" name="site_title" value="<?php echo $zbp->Config('new_media')->site_title;?>">
				<i>网站的名称</i>
			</div>
			<div class="lbimport">
				<span>站点简介</span>
				<textarea type="text" name="site_intro" rows="4"><?php echo $zbp->Config('new_media')->site_intro;?></textarea>
				<i>网站的简介</i>
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