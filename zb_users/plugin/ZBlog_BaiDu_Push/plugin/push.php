<?php /* EL PSY CONGROO */ 	 		 	        		   
require '../../../../zb_system/function/c_system_base.php';       		 		    	  	  	 
require '../../../../zb_system/function/c_system_admin.php';    		   			      	   		
$zbp->Load();        				     	  		  
$action='root';    	             	 		 	
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}     					 	    			 	  	
if (!$zbp->CheckPlugin('ZBlog_BaiDu_Push')) {$zbp->ShowError(48);die();}     			       		 	    		 				    			   	 
require $blogpath . 'zb_users/plugin/ZBlog_BaiDu_Push/plugin/header.php';      	    	       		 		
       			  
$osn = substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 6);    						  
if(count($_POST)>0){         					 
	if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();        	  		 
	if(GetVars('post_push_ck')){	    	 	   	 
		$zbp->Config('ZBlog_BaiDu_Push')->post_push_key = $osn;             	  	
		$zbp->SaveConfig('ZBlog_BaiDu_Push');    	 	 	 	           	 
		ZBlog_BaiDu_Push_ShowHint('good');  	    					  	
	}	       		  	
}     			 	  
    				  		
         	  

?> 

 <div class="wrapper">
	<?php 	
       require $blogpath . 'zb_users/plugin/ZBlog_BaiDu_Push/plugin/nav.php';
	?> 
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"></li>
                    <?php ZBlog_BaiDu_Push_SubMenu(7);?>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <ul class="breadcrumb">
                    <li><a href="<?php echo $zbp->host;?>zb_users/plugin/ZBlog_BaiDu_Push/plugin/info.php"><i class="icon icon-home"></i></a></li>
                    <li class="active">插件设置</li>
                </ul>
            </div>
            <div class="content-body">
                <div class="container-fluid">
                    
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">循环推送</div>
                        </div>
                        <div class="panel-body">
							<form id="form1" name="form1" method="post" class="form-horizontal">
								<div class="form-group" style="display: none;">
									<label class="col-sm-3 control-label">文章推送标识：</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="Data[post_push_key]" id="post_push_key" value="<?php echo $zbp->Config('ZBlog_BaiDu_Push')->post_push_key;?>">
									</div>
								</div>
                            
								<div class="form-group">
									<label class="col-sm-3 control-label">文章推送：</label>
										<div class="col-sm-8">
										<input type="checkbox" name="post_push_ck" id="post_push_ck" value="true" <?php if($zbp->Config('ZBlog_BaiDu_Push')->post_push_ck) echo 'checked="checked"'?> /> 勾选（文章继续重新推送一次）
											<input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken(); ?>">
											<button class="btn btn-danger" type="submit">在循环推送一次</button>
										</div>
									</div>
							
									<div class="alert alert-info alert-dismissable">
										<p><strong>说明：</strong></p>
										<p>循环推送：当文章全部推送完毕，还想继续重新推送一次，点击一次循环按钮后则可以再次重新提交。</p>
									</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>


<?php
require $blogpath . 'zb_users/plugin/ZBlog_BaiDu_Push/plugin/footer.php';           		         			 
RunTime();     		 				       		 	 
?>