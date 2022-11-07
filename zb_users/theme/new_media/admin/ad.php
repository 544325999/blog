<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */ /* EL PSY CONGROO */ /* EL PSY CONGROO */     	 	 			      	 				     		 				    			 				
require '../../../../zb_system/function/c_system_base.php';    				  		    		     	        	 		     			 	  
require $blogpath . 'zb_users/theme/new_media/admin/header.php';    							     		   	 	     	 			        	     
?>
<!--主题配置开始-->

<div class="SubMenu">
  <?php new_media_SubMenu(5);?>
  <a href="https://app.zblogcn.com/?auth=4cd93505-441d-490b-ab33-db5a08e84702" target="_blank" ><span class="m-left" style="color:#f00;">作者更多应用</span></a>
</div>
<div id="divMain2">
  <!---->
  <?php
	if(count($_POST)>0){       	        	  		           			     							 
		$zbp->Config( 'new_media' )->ad1 = $_POST[ 'ad1' ];     	 		  	    	 	 	 		    	  		   
		$zbp->Config( 'new_media' )->ad2 = $_POST[ 'ad2' ];    		    		     			 			    	 						
		$zbp->Config( 'new_media' )->ad3 = $_POST[ 'ad3' ];     	 	  		    				 		     						  
		$zbp->Config( 'new_media' )->ad4 = $_POST[ 'ad4' ];    	 		 			          	     	  	  		
			$zbp->Config('new_media')->ad1_on = $_POST['ad1_on'];    								    	 		        		 			 	     	 	  	 
			$zbp->Config('new_media')->ad2_on = $_POST['ad2_on'];    								      	 	 		     	   		        		   
			$zbp->Config('new_media')->ad3_on = $_POST['ad3_on'];    								      		 	        	 	       			  		 
			$zbp->Config('new_media')->ad4_on = $_POST['ad4_on'];    								    	 	          	 		       		 					
		 CheckIsRefererValid();    						      			 	       		 			            
		$zbp->SaveConfig( 'new_media' );    	 	  	 	      	 				     	  		           	 	
		$zbp->ShowHint( 'good' );     					        		 			       			      			 				
	}    	 	   		    			   		    		 	 			       					
	?>
<table width="100%" border="0" cellspacing="1">   
  <tr>
    <td width="200" align="center"><h3>图片代码示例： </h3></td>
    <td>
	    <div class="lbimport">
	        
            <p><pre class="prism-highlight prism-language-php">&lt;a href=&quot;广告链接地址&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;广告图片地址&quot; &gt;&lt;/a&gt;</pre></p>
            <p>也支持<b style="color:red;">联盟js广告</b>代码或<b style="color:red;">自定义html</b>代码</p>
		</div>
	</td>
  </tr>  
</table> 	
  <form id="form2" name="form2" method="post">
    <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
    <table width="100%" border="0" cellspacing="1">
      <tr>
        <td width="200" align="center" ><h3>导航下面广告位</h3></td>
        <td ><div class="lbimport"> <span>是否开启</span>
            <input name="ad1_on" type="text" value="<?php echo $zbp->Config('new_media')->ad1_on; ?>" class="checkbox" style="display:none;" />
          </div>
          <div class="lbimport"> <span>&nbsp;</span>
            <textarea style="text" name="ad1" rows="3"><?php echo $zbp->Config('new_media')->ad1;?></textarea>
            <i>图片宽度1220，高度看自己需求，亦支持联盟js广告代码和自定义html代码 </i> </div></td>
      </tr>
      <tr>
        <td align="center"><h3>底部广告</h3></td>
        <td><div class="lbimport"> <span>是否开启</span>
            <input name="ad2_on" type="text" value="<?php echo $zbp->Config('new_media')->ad2_on; ?>" class="checkbox" style="display:none;" />
          </div>
          <div class="lbimport"> <span>&nbsp;</span>
            <textarea style="text" name="ad2" rows="3"><?php echo $zbp->Config('new_media')->ad2;?></textarea>
            <i>图片宽度1220，高度看自己需求，亦支持联盟js广告代码和自定义html代码</i> </div></td>
      </tr>
      <tr>
        <td align="center"><h3>文章内容上方广告</h3></td>
        <td><div class="lbimport"> <span>是否开启</span>
            <input name="ad3_on" type="text" value="<?php echo $zbp->Config('new_media')->ad3_on; ?>" class="checkbox" style="display:none;" />
          </div>
          <div class="lbimport"> <span>&nbsp;</span>
            <textarea style="text" name="ad3" rows="3"><?php echo $zbp->Config('new_media')->ad3;?></textarea>
            <i>图片宽度1220，高度看自己需求，亦支持联盟js广告代码和自定义html代码</i> </div></td>
      </tr>
      <tr>
        <td align="center"><h3>文章内容下方广告</h3></td>
        <td><div class="lbimport"> <span>是否开启</span>
            <input name="ad4_on" type="text" value="<?php echo $zbp->Config('new_media')->ad4_on; ?>" class="checkbox" style="display:none;" />
          </div>
          <div class="lbimport"> <span>&nbsp;</span>
            <textarea style="text" name="ad4" rows="3"><?php echo $zbp->Config('new_media')->ad4;?></textarea>
            <i>图片宽度1220，高度看自己需求，亦支持联盟js广告代码和自定义html代码</i> </div></td>
      </tr>
    </table>
    <!--///-->
    <input name="" type="Submit" class="button" value="保存"/>
  </form>
  <!---->
</div>
<?php require $blogpath . 'zb_users/theme/new_media/admin/footer.php'; ?>
    		 	 	  