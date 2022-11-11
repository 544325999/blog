<?php /* EL PSY CONGROO */ 	 		 	      	  	   
require '../../../../zb_system/function/c_system_base.php';       		 		    		 	 	  
require '../../../../zb_system/function/c_system_admin.php';    		   			    	 	   		
$zbp->Load();        				     		 	   
$action='root';    	           				   	
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}     					 	    						  
if (!$zbp->CheckPlugin('ZBlog_BaiDu_Push')) {$zbp->ShowError(48);die();}     			         			   	
$blogtitle='插件配置';    	    		 	    
	 	    		 				     						 
require $blogpath . 'zb_users/plugin/ZBlog_BaiDu_Push/plugin/header.php';      	    	    		  			 
   	
?> 

 <div class="wrapper">
	<?php 	
       require $blogpath . 'zb_users/plugin/ZBlog_BaiDu_Push/plugin/nav.php';
	?> 
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"></li>
                    <?php ZBlog_BaiDu_Push_SubMenu(1);?>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <ul class="breadcrumb">
                    <li><a href="<?php echo $zbp->host;?>zb_users/plugin/ZBlog_BaiDu_Push/plugin/info.php"><i class="icon icon-home"></i></a></li>
                    <li class="active">已推送</li>
                </ul>
            </div>
            <div class="content-body">
                <div class="container-fluid">
					<div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">已推送列表</div>
                        </div>
                        <div class="panel-body">
						<form method="get" action="post.php">
							<?php 
					$p=new Pagebar($zbp->host.'zb_users/plugin/ZBlog_BaiDu_Push/plugin/pushlist.php?act=list{&page=%page%}',false);    		   	  
							$p->PageCount='50';      		    
							$p->PageNow = (int) GetVars('page', 'GET') == 0 ? 1 : (int) GetVars('page', 'GET');     	 		 		
							$p->PageBarCount=$zbp->pagebarcount;    					 	 
     		 	 	 
							$where=array();     		 	   
							$where[] = array('=', 'log_Status', 0);    	  		  	
							$where[] = array('=', 'log_BdPush', $zbp->Config('ZBlog_BaiDu_Push')->post_push_key);      			  	
							$order = array('log_PostTime'=>'DESC');    			   	 
							$sql= $zbp->db->sql->Select(     		  			
								$table['Post'],     			 	  
								'*',    	      	
								$where,    	  		 		
								$order,     	 			  
								array(($p->PageNow-1) * $p->PageCount,$p->PageCount),     				   
								array('pagebar'=>$p)     		  	 	
							);     	 					
							$array=$zbp->GetListCustom($GLOBALS['table']['Post'],$GLOBALS['datainfo']['Post'],$sql);    		 		 	 
					$str ='';      	 	 		 
					?>
                    <table class="table table-bordered table-hover table-center" style="text-align: center;">
						<thead>
							<tr>
								<th>#</th>
								<th>标题</th>
								<th>状态</th>
								<th>操作</th>
								<th><a href="" onclick="BatchSelectAll();return false;"><?php echo $zbp->lang['msg']['select_all'] ?></a></th>
							</tr>
						</thead>
						<tbody>
					<?php 
						foreach ($array as $key => $artcle) {
							$str .='<tr>
								<td>'.($key+1).'</td>
								<td style="text-align: left;">'.$artcle->Title.'</td>
								<td><span class="label label-success">已推送</span></td>
								<td><a href="post.php?type=pushid&id='.$artcle->ID.'" class="btn btn-xs btn-warning">重新推送</a></td>
								<td>' . '<input type="checkbox" id="id' . $artcle->ID . '" name="id[]" value="' . $artcle->ID . '"/>' . '</td>
							</tr>';
						}	    	  		 		
						echo $str;           		 
						?>
							
							</tbody>
						</table>
						<?php 	
						echo '<p style="float:right;">';    	 	 				
				echo '<input class="btn btn-sm btn-primary" type="submit" onclick="return window.confirm(\'单击“确定”继续。单击“取消”停止。\');" value="手动重新推送所选项目"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';    	      	
				echo '</p>';     		   		
				if ($p->buttons){    				 	  
					echo '<ul class="pager">';     			 		 
					foreach ($p->buttons as $key => $value) {      		 	 	
						echo '<li class="previous"><a href="'. $value .'">' . $key . '</a></li>' ;        	 	 
					}    	     		
					echo '</ul>';    	       
				}    				   	
							?>
							
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