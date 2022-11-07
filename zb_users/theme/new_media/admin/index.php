<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */ /* EL PSY CONGROO */ /* EL PSY CONGROO */    	  	   	    	 				          			     	   			 
require '../../../../zb_system/function/c_system_base.php';    	    			    	   	         	   	       			 	 
require $blogpath . 'zb_users/theme/new_media/admin/header.php';    	 		 			     		    	       	 			    	 	  	  
?>

<!--主题配置开始-->
<div id="admin-header" class="SubMenu">
	<?php new_media_SubMenu(1);?>
<a href="https://app.zblogcn.com/?auth=4cd93505-441d-490b-ab33-db5a08e84702" target="_blank" ><span class="m-left" style="color:#f00;">作者更多应用</span></a>	
</div>
<div id="divMain2">
<!--基本设置-->
	<?php
	if(count($_POST)>0){     	  			     					       							      	 					
		$zbp->Config( 'new_media' )->logo = $_POST[ 'logo' ];//logo    	    		           	 	         	   		     						 
		$zbp->Config( 'new_media' )->favicon = $_POST[ 'favicon' ];//favicon    	    		 	 			
		$zbp->Config( 'new_media' )->uplod_qr = $_POST[ 'uplod_qr' ];//qr          		   	
		 	 	       		 						        	     						 	       	 	 	    	 		 			
		$zbp->Config( 'new_media' )->links_on = $_POST[ 'links_on' ];	    			  			    	     		    	 	  	 	
	 		 		     		 	       		  	  	       	        	       
		if(GetVars('noimgstyle')){//开关    		  	 		     			 	 	     		    	    			 				
			$zbp->Config('new_media')->noimgstyle = $_POST['noimgstyle'];    	   		 	     	 		 	     				 	      	 		   	
		}else{     	 	 			    	    	 	    	 	    	     			    
			$zbp->Config('new_media')->noimgstyle = '';    						 	    		 				        	  		       	 	 	
		}    			         					                    	 	 	  
		$zbp->Config( 'new_media' )->noimgpic = $_POST[ 'noimgpic' ];    	    	 	       	 	 	     	 				         				
		       	 			    	  		  	     		 			      	      
    			 		    	   	  	    	  			 	    	 		 		 
         	      		 		       		 		 	      	   	 	
		//$zbp->Config('new_media')->phone = $_POST['phone'];      	 			     	 		 		     				 	  
		 //$zbp->Config('new_media')->email = $_POST['email'];    				 	 	    		  	 		     				 		
		 //$zbp->Config('new_media')->QQ = $_POST['QQ'];     	  		          				        	 	 
      		  		       					       		  	
		 //$zbp->Config('new_media')->qr = $_POST['qr'];    	 	     				   	       		 	     			  			
		     	 		 	 	     		 			        		   
		    	  			 	     	       			  	 	 	        		 	 		      	  		 
		     		 	       				 			
		//$zbp->Config( 'new_media' )->login_on = $_POST[ 'login_on' ];	       	 		       		 				    	  		   
		//$zbp->Config('new_media')->ucenter = $_POST['ucenter'];     			   	    			  			    		  	   
		//$zbp->Config('new_media')->contribute = $_POST['contribute'];      	  			      	 				           	
		//$zbp->Config('new_media')->register = $_POST['register'];    	 		   	    		 		 		    	 	   		
		//$zbp->Config('new_media')->login = $_POST['login'];          	 						    	 		  	 
						     					 	     	  	 		    							 
       	$zbp->Config('new_media')->post_related = $_POST['post_related'];   		  		      	  		       	 		        	  	 		     		 	   	
		if(GetVars('relatedstyle')){//相关调用style    		 		 	     			 		             	     	 	  		
			$zbp->Config('new_media')->relatedstyle = $_POST['relatedstyle'];    	  	 	 	    		     	     	    		    		  	  	
		}else{    	  	 	      	   	       	   		 	    	 	  	  
			$zbp->Config('new_media')->relatedstyle = '';       		 		    	 			           		      				    
		}    	   	 		    	     		    	  	  	          	  
    			  		      					      		 		 	    		 				 
		$zbp->Config( 'new_media' )->foothtml = $_POST[ 'foothtml' ];//foothtml       		 	 	 	    		 	 	  
		$zbp->Config( 'new_media' )->copy_on = $_POST[ 'copy_on' ];                   	   	  
		$zbp->Config( 'new_media' )->foot_on = $_POST[ 'foot_on' ];     		  		       		 	 		
		$zbp->Config( 'new_media' )->copyright = $_POST[ 'copyright' ];      			 	       	   	 	     		 	   	
		$zbp->Config( 'new_media' )->beian = $_POST[ 'beian' ]; 	       	  		      			  	    			 	 	 
		$zbp->Config( 'new_media' )->tongji = $_POST[ 'tongji' ];      			 	      	 			 		
		    				 	      		 					
		    				   	      			  	
		$zbp->Config( 'new_media' )->code_on = $_POST[ 'code_on' ];     	  			       	 	   
		$zbp->Config( 'new_media' )->head_code = $_POST[ 'head_code' ];		     	 		 	        			 	
				       		       					 	     	 		  	       	  		 
		 CheckIsRefererValid();     	 		 	     	 			 	       				     	  	  		
		$zbp->SaveConfig( 'new_media' );    						      							      	               	  
		$zbp->ShowHint( 'good' );    	 	   		     		   	       	 				    						 	
	}    		  	 		     	  	 		    	  		          	 	  
	?>
	
<table width="100%" border="0" cellspacing="1">   
  <tr>
    <td width="200" align="center"><h3>使用说明</h3></td>
    <td>
	    <div class="lbimport">
	        
            <p><span>侧栏规则：</span>[首页：默认侧栏]、[列表页：侧栏2]、[文章页：侧栏3]、[其它：侧栏4]</p>
            <p><span>模块管理：</span>[热门文章：remen]、[热评文章：reping]、[数据：shuju]、[作者：zuozhe]</p>
		</div>
	</td>
  </tr>  
</table> 

	<form id="form2" name="form2" method="post">
	<?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
		<table width="100%" border="0" cellspacing="1">
  <tr>
     
    <td width="200" align="center"><h3>图片上传</h3></td>
    <td>
	       <div class="lbimport">
				<span>LOGO图片</span>
				<input type="text" name="logo" id="logo" class="uplod_img" placeholder="点我上传LOGO" value="<?php echo $zbp->Config('new_media')->logo;?>">
				<i class="red">logo图高82px</i>
	  </div>
			

			<div class="lbimport">
				<span>favicon图标</span>
				<input type="text" name="favicon" id="favicon" class="uplod_img" placeholder="点我上传favicon图标" value="<?php echo $zbp->Config('new_media')->favicon;?>">
				<i>浏览器上显示的小图标</i>
			</div>
			
			<div class="lbimport">
				<span>底部二维码</span>
				<input type="text" name="uplod_qr" class="uplod_img" placeholder="点我上传底部二维码" value="<?php echo $zbp->Config('new_media')->uplod_qr;?>">
				<i>底部二维码上传</i>
			</div>			
	</td>
  </tr>
  <tr>
    <td align="center"><h3>缩略图设置</h3></td>
    <td>
	         <div class="lbimport">
				<span>选择一种方式</span>
				<div class="radio">
					<label>
						<input type="radio" name="noimgstyle" value="1" <?php if($zbp->Config('new_media')->noimgstyle == '1') echo 'checked'?> />随机图片（可FTP替换，路径为：/zb_users/theme/new_media/include/random）
					</label>
					<label>
						<input type="radio" name="noimgstyle" value="2" <?php if($zbp->Config('new_media')->noimgstyle == '2') echo 'checked'?> />默认图
					</label>
				</div>
			</div>
			<div class="lbimport">
				<span>上传默认图</span>
				<input type="text" name="noimgpic" id="favicon" class="uplod_img" placeholder="点我传默认图" value="<?php echo $zbp->Config('new_media')->noimgpic;?>">
				<i>选择第二种默认图，才有效。</i>
			</div>
	</td>
  </tr>
  <!--
  <tr>
    <td align="center"><h3>登录注册</h3></td>
    <td>
	        <div class="lbimport">
				<span>是否开启</span>
				<input name="login_on" type="text" value="<?php echo $zbp->Config('new_media')->login_on; ?>" class="checkbox" style="display:none;" />
			</div>
			<div class="lbimport">
				<span>注册地址</span>
				<input type="text" name="register" value="<?php echo $zbp->Config('new_media')->register;?>">
				<i>可以使用用户中心插件，获取注册网址输入在这里</i>
			</div>
			<div class="lbimport">
				<span>登录地址</span>
				<input type="text" name="login" value="<?php echo $zbp->Config('new_media')->login;?>">
				<i>可以使用用户中心插件，获取登录网址输入在这里</i>
			</div>
			<div class="lbimport">
				<span>用户中心地址</span>
				<input type="text" name="ucenter" value="<?php echo $zbp->Config('new_media')->ucenter;?>">
				<i>可搭配用户中心插件使用</i>
			</div>
			<div class="lbimport">
				<span>投稿地址</span>
				<input type="text" name="contribute" value="<?php echo $zbp->Config('new_media')->contribute;?>">
				<i>可搭配投稿插件使用</i>
			</div>
	</td>
  </tr>-->

  <tr>
    <td align="center"><h3>友链申请</h3></td>
    <td>
	        <div class="lbimport">
				<span>是否开启</span>
				<input name="links_on" type="text" value="<?php echo $zbp->Config('new_media')->links_on; ?>" class="checkbox" style="display:none;" />
				<i>灰色则关闭</i>
			</div>
	</td>
  </tr>
  <!--
  <tr>
    <td align="center"><h3>返回顶部</h3></td>
    <td>
			<div class="lbimport">
				<span>电话</span>
				<input type="text" name="phone" value="<?php echo $zbp->Config('new_media')->phone;?>">
				<i>电话号</i>
			</div>
			<div class="lbimport">
				<span>E-mail</span>
				<input type="text" name="email" value="<?php echo $zbp->Config('new_media')->email;?>">
				<i>电子邮箱</i>
			</div>
			<div class="lbimport">
				<span>QQ</span>
				<input type="text" name="QQ" value="<?php echo $zbp->Config('new_media')->QQ;?>">
				<i>QQ号</i>
			</div>
			<div class="lbimport">
				<span>二维码</span>
				<input type="text" name="qr" id="qr" class="uplod_img" placeholder="点击上传微信二维码..." value="<?php echo $zbp->Config('new_media')->qr;?>">
				<i>二维码图</i>
			</div>
	</td>
  </tr>-->
  <tr>
    <td align="center"><h3>相关文章</h3></td>
    <td>
			

			<div class="lbimport">
				<span>是否开启</span>
				
				<input name="post_related" type="text" value="<?php echo $zbp->Config('new_media')->post_related; ?>" class="checkbox" style="display:none;" />
				<i class="red">灰色则关闭</i>
			</div>
			<div class="lbimport">
				<span>调用形式</span>
				<div class="radio">
					<label style="display:inline-block">
						<input type="radio" name="relatedstyle" value="1" <?php if($zbp->Config('new_media')->relatedstyle == '1') echo 'checked'?> />同分类
					</label>
					<label style="display:inline-block">
						<input type="radio" name="relatedstyle" value="2" <?php if($zbp->Config('new_media')->relatedstyle == '2') echo 'checked'?> />同tag标签
					</label>
				</div>
			</div>
	</td>
  </tr>
  
  

  <tr>
    <td width="200" align="center"><h3>网站底部基础设置</h3></td>
    <td>
			<div class="lbimport">
				<span>官方版权开关</span>
				
				<input name="copy_on" type="text" value="<?php echo $zbp->Config('new_media')->copy_on; ?>" class="checkbox" style="display:none;" />
				<i>灰色则关闭</i>
			</div>
			<div class="lbimport">
				<span>版权信息</span>
				<textarea name="copyright" type="text" id="copyright" rows="1"><?php echo $zbp->Config('new_media')->copyright;?></textarea>
				<i>版权信息</i>
			</div>
			<div class="lbimport">
				<span>备案号</span>
				<textarea name="beian" type="text" id="beian" rows="1"><?php echo $zbp->Config('new_media')->beian;?></textarea>
				<i>备案信息</i>
			</div>
			<div class="lbimport">
				<span>统计代码</span>
				<textarea name="tongji" type="text" id="tongji" rows="3"><?php echo $zbp->Config('new_media')->tongji;?></textarea>
				<i>百度统计、cnzz等</i>
			</div>
	</td>
  </tr>
  <tr>
    <td align="center"><h3>页脚设置</h3></td>
    <td>
	<div class="lbimport">
				<span>是否开启</span>
				
				<input name="foot_on" type="text" value="<?php echo $zbp->Config('new_media')->foot_on; ?>" class="checkbox" style="display:none;" />
				<i>灰色则关闭</i>
			</div>
			<div class="lbimport">
				<span>自定义html</span>
				<textarea name="foothtml" type="text" id="foothtml" rows="6"><?php echo $zbp->Config('new_media')->foothtml;?></textarea>
				<i>支持html/css格式</i>
			</div>
	</td>
  </tr>
  <tr>
    <td align="center"><h3>页头插入js/css</h3></td>
    <td>
	<div class="lbimport">
				<span>是否开启</span>
				
				<input name="code_on" type="text" value="<?php echo $zbp->Config('new_media')->code_on; ?>" class="checkbox" style="display:none;" />
				<i>灰色则关闭</i>
			</div>
			<div class="lbimport">
				<span>填写js/css代码</span>
				<textarea name="head_code" type="text"  rows="6"><?php echo $zbp->Config('new_media')->head_code;?></textarea>
				<i>支持js/css格式</i>
			</div>
	</td>
  </tr>   
  
  
</table>

			<input name="" type="Submit" class="button" value="保存"/>
		
	</form>
	<!---->
</div>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/plugin/UEditor/ueditor.config.php"></script>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/plugin/UEditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/theme/new_media/admin/js/lib.upload.js"></script>
<?php require $blogpath . 'zb_users/theme/new_media/admin/footer.php'; ?>