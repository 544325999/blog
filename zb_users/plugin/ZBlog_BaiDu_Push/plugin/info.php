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
<script src="<?php echo $zbp->host;?>zb_users/plugin/ZBlog_BaiDu_Push/plugin/dist/lib/chart/zui.chart.min.js"></script>
 <div class="wrapper">
	<?php 	
       require $blogpath . 'zb_users/plugin/ZBlog_BaiDu_Push/plugin/nav.php';
	?> 
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"></li>
                    <?php ZBlog_BaiDu_Push_SubMenu(0);?>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <ul class="breadcrumb">
                    <li><a href="<?php echo $zbp->host;?>zb_users/plugin/ZBlog_BaiDu_Push/plugin/info.php"><i class="icon icon-home"></i></a></li>
                    <li class="active">仪表盘</li>
                </ul>
            </div>
            <div class="content-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-info">
                                <div class="info-box-icon">
                                    <i class="icon icon-newspaper-o"></i>
                                </div>
                                <div class="info-box-content">
                                    <span class="info-box-text">文章总数</span>
                                    <span class="info-box-number">
                                        <small><?php echo ZBlog_BaiDu_Push_Total(); ?>个</small>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-primary">
                                <div class="info-box-icon">
                                    <i class="icon icon-check-circle"></i>
                                </div>
                                <div class="info-box-content">
                                    <span class="info-box-text">成功推送</span>
                                    <span class="info-box-number">
                                        <small><?php echo ZBlog_BaiDu_Push_Success(); ?>个</small>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-warning">
                                <div class="info-box-icon">
                                    <i class="icon icon-remove-sign"></i>
                                </div>
                                <div class="info-box-content">
                                    <span class="info-box-text">失败推送</span>
                                    <span class="info-box-number">
                                        <small><?php echo ZBlog_BaiDu_Push_Fail(); ?>个</small>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-danger">
                                <div class="info-box-icon">
                                    <i class="icon icon-frown"></i>
                                </div>
                                <div class="info-box-content">
                                    <span class="info-box-text">未推送文章</span>
                                    <span class="info-box-number">
                                        <small><?php echo ZBlog_BaiDu_Push_Total()-ZBlog_BaiDu_Push_Success(); ?>个</small>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-title"><i class="icon icon-globe"></i><span class="title"> 最新推送详情</span></div>
                                </div>
                                <div class="panel-body">
							
									<?php
			$p=new Pagebar('{%host%}zb_users/plugin/ZBlog_BaiDu_Push/plugin/logs.php?act=list{&page=%page%}',false);    	 	  	 	
			$p->PageCount='5';     	 	    	
			$p->PageNow=(int)GetVars('page','GET')==0?1:(int)GetVars('page','GET');    	  		 		
			$p->PageBarCount=$zbp->pagebarcount;    	 			   
			$where = '';    		  	 		
			$order = array('Logs_ID'=>'DESC');    		   	  
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
				    	 		    
				       	 	 	
			    	 		 		 
        ?>
                                   
                                </div>
                            </div>
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