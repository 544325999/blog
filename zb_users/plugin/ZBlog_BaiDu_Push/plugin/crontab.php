<?php /* EL PSY CONGROO */ 	 		 	       	 	 		
require '../../../../zb_system/function/c_system_base.php';       		 		        	  	
require '../../../../zb_system/function/c_system_admin.php';    		   			     			   	
$zbp->Load();        				    	    		 
$action='root';    	           				 	  
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}     					 	        		 	
if (!$zbp->CheckPlugin('ZBlog_BaiDu_Push')) {$zbp->ShowError(48);die();}     			       		 	    		 				    		  		  
require $blogpath . 'zb_users/plugin/ZBlog_BaiDu_Push/plugin/header.php';      	    	        			 
$osn = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);       					
if(count($_POST)>0){       		 			  
	if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();    	 		 	 			    		  	  	
	$zbp->Config('ZBlog_BaiDu_Push')->crontabkey = $osn;     	 	 			    				 			
    $zbp->SaveConfig('ZBlog_BaiDu_Push');      		 		      		   	 
	$zbp->ShowHint('good');    	 		 	      			 	 	 
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
                    <?php ZBlog_BaiDu_Push_SubMenu(4);?>
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
                            <div class="panel-title">插件设置</div>
                        </div>
                        <div class="panel-body">
							<form id="form1" name="form1" method="post" class="form-horizontal">
								<div class="form-group">
									<label for="crontabkey" class="col-sm-2">秘钥</label>
									<div class="col-md-6 col-sm-10">
										<input readonly="readonly" type="text" class="form-control" id="crontabkey" value="<?php echo $zbp->Config('ZBlog_BaiDu_Push')->crontabkey;?>">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken(); ?>">
										<button type="Submit" class="btn btn-primary">生成秘钥</button>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2">当前秘钥</label>
									<div class="col-sm-10" style="padding-top: 6px;">
										<?php echo $zbp->Config('ZBlog_BaiDu_Push')->crontabkey;?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2">定时推送API</label>
									<div class="col-sm-10" style="padding-top: 6px;">
										<?php echo $zbp->host;?>zb_users/plugin/ZBlog_BaiDu_Push/plugin/api.php?key=<?php echo $zbp->Config('ZBlog_BaiDu_Push')->crontabkey;?>
									</div>
								</div>
								<div class="alert alert-info alert-dismissable">
									<p><strong>说明：</strong></p>
									<p>首次安装使用，请点击生成API秘钥</p>
									<p>访问API地址即可自动推送，请根据自身情况设置定时任务</p>
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