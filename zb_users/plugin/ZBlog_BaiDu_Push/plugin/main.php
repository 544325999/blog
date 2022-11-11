<?php /* EL PSY CONGROO */ 	 		 	      	  	  	
require '../../../../zb_system/function/c_system_base.php';       		 		    	  	 		 
require '../../../../zb_system/function/c_system_admin.php';    		   			         	 	
$zbp->Load();        				    	  		 	 
$action='root';    	           		   	  
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}     					 	      	  	 	
if (!$zbp->CheckPlugin('ZBlog_BaiDu_Push')) {$zbp->ShowError(48);die();}     			       		 	    		 				    	 		   	
require $blogpath . 'zb_users/plugin/ZBlog_BaiDu_Push/plugin/header.php';      	    	    	 				  
     	  		  
if(isset($_POST['Data'])){     			  	        	 	  
    if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();    		 	 	       	  		 	
	foreach($_POST['Data'] as $key=>$val){        	        	 	  	 
	   $zbp->Config('ZBlog_BaiDu_Push')->$key = $val;      	  		        	    
	}    	 	    	    				    
	if(GetVars('post_push_ck_ok')){       	 	 	
        $zbp->Config('ZBlog_BaiDu_Push')->post_push_ck_ok = $_POST['post_push_ck_ok'];    	 	 				
    }else{      			  	
        $zbp->Config('ZBlog_BaiDu_Push')->post_push_ck_ok = '';    								
    }    		  				
	if(GetVars('post_push_zd_ok')){     	 	 	  
        $zbp->Config('ZBlog_BaiDu_Push')->post_push_zd_ok = $_POST['post_push_zd_ok'];     	 	 	 	
    }else{    	 			   
        $zbp->Config('ZBlog_BaiDu_Push')->post_push_zd_ok = '';    		  	 		
    }    		 			  
	$zbp->SaveConfig('ZBlog_BaiDu_Push');    	 	 	 	     		 	    
	ZBlog_BaiDu_Push_ShowHint('good');    			         	 	  		 
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
                    <?php ZBlog_BaiDu_Push_SubMenu(5);?>
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
									<label for="baiduapi" class="col-sm-2">推送接口</label>
									<div class="col-md-6 col-sm-10">
										<input type="text" class="form-control" name="Data[baiduapi]" id="baiduapi" value="<?php echo $zbp->Config('ZBlog_BaiDu_Push')->baiduapi;?>">
									</div>
								</div>
								<div class="form-group" style="display: none;">
									<label for="crontabkey" class="col-sm-2">推送数量</label>
									<div class="col-md-6 col-sm-10">
										<input readonly="readonly" type="text" class="form-control" name="Data[postnumber]" id="postnumber" value="<?php echo $zbp->Config('ZBlog_BaiDu_Push')->postnumber;?>">
									</div>
								</div>
								<div class="form-group" style="display: none;">
									<label for="crontabkey" class="col-sm-2">推送次数</label>
									<div class="col-md-6 col-sm-10">
										<input type="text" class="form-control" name="Data[apinumber]" id="apinumber" value="<?php echo $zbp->Config('ZBlog_BaiDu_Push')->apinumber;?>">
									</div>
								</div>
								
								<div class="form-group">
									<label for="baiduapi" class="col-sm-2">推送模式</label>
									<div class="col-md-6 col-sm-10">
										<label class="radio-inline">
											<input type="radio" id="mode" name="Data[mode]" value="a" <?php if($zbp->Config('ZBlog_BaiDu_Push')->mode == 'a') echo 'checked'?>> 稳定模式
										</label>
										<label class="radio-inline">
											<input type="radio" id="mode" name="Data[mode]" value="b" <?php if($zbp->Config('ZBlog_BaiDu_Push')->mode == 'b') echo 'checked'?>> 高速模式
										</label>
										<label class="radio-inline">
											<input type="radio" id="mode" name="Data[mode]" value="c" <?php if($zbp->Config('ZBlog_BaiDu_Push')->mode == 'c') echo 'checked'?>> 极速模式
										</label>
									</div>
								</div>
								<div class="form-group">
                                    <label for="crontabkey" class="col-sm-2">自动循环推送：</label>
                                    <div class="col-md-6 col-sm-10">
                                        <input type="checkbox" name="post_push_ck_ok" id="post_push_ck_ok" value="true" <?php if($zbp->Config('ZBlog_BaiDu_Push')->post_push_ck_ok) echo 'checked="checked"'?> /> 勾选
                                     </div>
                                </div>
								<div class="form-group">
                                    <label for="crontabkey" class="col-sm-2">关闭发布文章自动推送：</label>
                                    <div class="col-md-6 col-sm-10">
                                        <input type="checkbox" name="post_push_zd_ok" id="post_push_zd_ok" value="true" <?php if($zbp->Config('ZBlog_BaiDu_Push')->post_push_zd_ok) echo 'checked="checked"'?> /> 勾选后关闭发布文章自动推送
                                     </div>
                                </div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken(); ?>">
										<button type="Submit" class="btn btn-primary">提交</button>
									</div>
								</div>
								<div class="alert alert-info alert-dismissable">
									<p><strong>说明：</strong></p>
									<p>为了有效保障推送成功，推送数量固定50篇；</p>
									<!--
									<p>每次执行API最终推送数量=推送数量x推送次数（例：推送数量50x推送次数3次=最终推送150篇文章）</p>
									<p>如网站文章数据量过大，打开图表统计卡顿，可关闭图表按钮；</p>
									-->
									<p>用户可酌情设置定时执行时间；例：每天一次，每小时一次等</p>
									<p>推送模式：数据量小（每次推送几千数据）默认使用稳定模式，数据量大时（每次推送几万数据）可酌情选择其它模式；</p>
                                    <p>自动循环推送：勾选后，网站所有文章定时推送完毕，自动循环继续推送文章</p>
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