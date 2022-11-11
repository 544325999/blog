<?php /* EL PSY CONGROO */ 	 		 	        					
require '../../../../zb_system/function/c_system_base.php';       		 		    	 		   	
require '../../../../zb_system/function/c_system_admin.php';    		   			    			  	  
$zbp->Load();        				    	 		 			
$action='root';    	           	 	 	  	
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}     					 	       		 	 
if (!$zbp->CheckPlugin('ZBlog_BaiDu_Push')) {$zbp->ShowError(48);die();}     			       		 	    		 				      			 		
require $blogpath . 'zb_users/plugin/ZBlog_BaiDu_Push/plugin/header.php';      	    	    	 		 			
    	  		 		
if(count($_POST)>0){    	 	   		
	if(GetVars('dele')){    	 	  		 
		$s = $zbp->db->sql->DelTable($GLOBALS['table']['ZBlog_BaiDu_Push_Logs']);      	 				
			$zbp->db->QueryMulit($s);    				 			
		$s = $zbp->db->sql->CreateTable($GLOBALS['table']['ZBlog_BaiDu_Push_Logs'],$GLOBALS['datainfo']['ZBlog_BaiDu_Push_Logs']);    	 	   		
	    	$zbp->db->QueryMulit($s);    		  			 
	}    		  			 
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
                    <?php ZBlog_BaiDu_Push_SubMenu(3);?>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <ul class="breadcrumb">
                    <li><a href="<?php echo $zbp->host;?>zb_users/plugin/ZBlog_BaiDu_Push/plugin/info.php"><i class="icon icon-home"></i></a></li>
                    <li class="active">操作日志</li>
                </ul>
            </div>
            <div class="content-body">
                <div class="container-fluid">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">操作日志</div>
						</div>
                        <div class="panel-body">
							<?php
			$p=new Pagebar('{%host%}zb_users/plugin/ZBlog_BaiDu_Push/plugin/logs.php?act=list{&page=%page%}',false);     	 				 
			$p->PageCount=$option['ZC_MANAGE_COUNT'];       	  			
			$p->PageNow=(int)GetVars('page','GET')==0?1:(int)GetVars('page','GET');    	 		   	
			$p->PageBarCount=$zbp->pagebarcount;    	 			 	 
			$where = '';    		   			
			$order = array('Logs_Time'=>'DESC');    	 		 	  
			$sql= $zbp->db->sql->Select(    			  			
				$table['ZBlog_BaiDu_Push_Logs'],       		   
				'*',     			 	 	
				$where,    	 			 		
				$order,    	  	 	 	
				array(($p->PageNow-1) * $p->PageCount,$p->PageCount),     	 		  	
				array('pagebar'=>$p)        		  
			);    	    	  
			$array=$zbp->GetListCustom($GLOBALS['table']['ZBlog_BaiDu_Push_Logs'],$GLOBALS['datainfo']['ZBlog_BaiDu_Push_Logs'],$sql);
			$str = '<table class="table table-striped">
								<thead>
									<tr>
										<th width="55">序号</th>
										<th width="80">类型</th>
										<th width="80">标题</th>
										<th>详情</th>
										<th width="145" style="text-align:right;">时间</th>
									</tr>
								</thead>
								<tbody>';
				foreach ($array as $key => $Logs) {     	 		   
					$str .= '<tr>';    				    
					$str .= '<td>'.($key+1).'</td>';        				
					if ($Logs->Type == "1"){     	 	 	 	
						$str .= '<td><span class="label label-success">推送成功</span></td>';    						 	
					}elseif ($Logs->Type == "2"){     	   	  
						$str .= '<td><span class="label label-danger">推送失败</span></td>';      						
					}else{        	   
						$str .= '<td></td>';     	 			  
					}     	 		  	
					$str .= '<td style="width: 35%;">'.$zbp->GetPostByID($Logs->PostID)->Title.'</td>';    	 	 			 
					$str .= '<td style="width: 35%;">'.htmlspecialchars($Logs->Text).'</td>';      		 	  
					$str .= '<td style="text-align:right;">'.htmlspecialchars(date('Y-m-d H:i:s',$Logs->Time)).'</td>';    					 	 
					      	  	  
      				  
					$str .= '</tr>';    						  
					       		   
					      		 		 
				}
				$str .='</tbody>
							</table>';
				echo $str;    	     	 
				if ($p->buttons){    	   	 		
					echo '<ul class="pager">';       		   
					foreach ($p->buttons as $key => $value) {    	 		   	
						echo '<li class="previous"><a href="'. $value .'">' . $key . '</a></li>' ;    	 				 	
					}    	 	     
					echo '</ul>';    	  	  		
				}    						 	
				    			 		  
			      		 	  
        ?>
							<form id="form2" name="form2" method="post">
								<table class="table table-bordered">
									<tbody>
											<tr>
												<td>清除日志（注意：这项功能会清除所有的推送日志记录）</td>
												<td>
													<input type="checkbox" name="dele" id="dele" value="true" <?php if($zbp->Config('ZBlog_BaiDu_Push')->dele) echo 'checked="checked"'?> /> 勾选清除数据 <input onclick="return window.confirm('单击“确定”继续。单击“取消”停止。');" type="Submit" class="btn btn-mini btn-danger" value="提交"/>
												</td>
												
											</tr>
									</tbody>
								</table>
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