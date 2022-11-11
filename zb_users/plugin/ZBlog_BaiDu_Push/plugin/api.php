<?php /* EL PSY CONGROO */ 	 		 	      	 		 		
require '../../../../zb_system/function/c_system_base.php';       		 		      		  		
require '../../../../zb_system/function/c_system_admin.php';    		   			        	   
$zbp->Load();        				     			  		
  	    		  				
if(empty($_GET['key']) || $_GET['key'] !== $zbp->Config('ZBlog_BaiDu_Push')->crontabkey){       	    	
	echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;">访问失败</h2>抱歉，沒有找到您需要的内容！！</div>';     	 				  
	die();       		   
}     	  			 
    				 	  
require $blogpath . 'zb_users/plugin/ZBlog_BaiDu_Push/plugin/header.php';       		 		   
   	    	     		  			
set_time_limit(0);    	 		 			
      	 			 
//2.4版本开始     	      
$zbp->Config('ZBlog_BaiDu_Push')->postnumber = '50';//推送数量 强制50     			 			
$zbp->Config('ZBlog_BaiDu_Push')->apinumber = '1';//推送次数 强制50    	  	 		 

?> 
<div class="wrapper">
	<div class="">
		<div class="content-header">
			<ul class="breadcrumb"></ul>
		</div>
		<div class="content-body" style="max-width: 700px;margin: 0 auto;">
			<div class="container-fluid">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title"><i class="icon icon-globe"></i> 数据推送</div>
					</div>
					<div class="panel-body">
					<div class="progress progress-striped active">
						<div class="progress-bar progress-bar-info" id="percent_txt2" style="width: 0%;"><span class="progressbar-value" id="percent_txt">0</span>%</span></div>
					</div>
						 <?php
							flush();    	   		  
							$p=new Pagebar('{%host%}zb_users/plugin/ZBlog_BaiDu_Push/plugin/api.php?act=list{&page=%page%}',false);    			 		 	
							$p->PageCount='50';     	 	  	 
							$p->PageNow = (int) GetVars('page', 'GET') == 0 ? 1 : (int) GetVars('page', 'GET');    			 	  	
							$p->PageBarCount=$zbp->pagebarcount;     	    	 
     				   
							$where=array();     			 	 	
							$where[] = array('=', 'log_Status', 0);    		 		 		
							$where[] = array('<>', 'log_BdPush', $zbp->Config('ZBlog_BaiDu_Push')->post_push_key);    	 			 		
							$order = array('log_ID'=>'ASC');    	  		 	 
							$sql= $zbp->db->sql->Select(    				 			
								$table['Post'],    					  	
								'*',    			   		
								$where,      				 	
								$order,    		 	  	 
								array(($p->PageNow-1) * $p->PageCount,$p->PageCount),     				   
								array('pagebar'=>$p)     	   			
							);     			 	  
							$array=$zbp->GetListCustom($GLOBALS['table']['Post'],$GLOBALS['datainfo']['Post'],$sql);    			  			
							 if( empty( $array ) ) {    				 		 
									    	 	   		
									echo '<div class="example no-padding borderless"><div class="alert alert-success alert-block with-icon"><i class="icon-ok-sign"></i><div class="content"><strong>太好了! 数据已全部推送完毕，暂无可推送数据。</strong></div></div></div>';    	  	    
									if ($zbp->Config('ZBlog_BaiDu_Push')->post_push_ck_ok){    								
										$osn = substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 6);     			  		
										$zbp->Config('ZBlog_BaiDu_Push')->post_push_key = $osn;    		 	   	
										$zbp->SaveConfig('ZBlog_BaiDu_Push');    				 	  
									}      	 	 		
									die();    		   			
								}    			 	 	 
							for($i = 0; $i < $zbp->Config('ZBlog_BaiDu_Push')->apinumber; $i++){ //循环n次     	 	 			
								    			   		
								foreach($array as $post){     						 
									if($zbp->Config('ZBlog_BaiDu_Push')->mode == 'a'){    	      	
										for($j=0;$j<100;$j++){       			 	
											echo '<script>console.log(' . json_encode($j) . ');</script>';    			    	
										}//空循环===        				
									}elseif($zbp->Config('ZBlog_BaiDu_Push')->mode == 'b'){     	 	 	 	
										for($j=0;$j<50;$j++){    					 	 
											echo '<script>console.log(' . json_encode($j) . ');</script>';       	 		 
										}//空循环===    		   			
									}     			 	  
									      						
									$url = $zbp->GetPostByID($post->ID)->Url;    				  	 
									$ZBlog_BaiDu_Push_Ajax = new ZBlog_BaiDu_Push_Ajax();      	  		 
									$result = json_decode($ZBlog_BaiDu_Push_Ajax->Post_Push($url));    	   		  
									$id = $post->ID;    						  
										if (isset($result->success) && $result->success !== 0) {    	  				 
											if (isset($result->remain)){    	     		    			 	   
												$data = array(    	 			       	  		
													'Logs_PostID'      	=> $id,    			  	 	    			    	
													'Logs_Type'         => '1',     		   	     		   	  
													'Logs_Text'         => '成功推送'.$result->success.'条数据，剩余'.$result->remain.'条数据可提交',      	 					 
													'Logs_Time' 	       => time(),    	    	 	        	  	
												);       	 			  
												$sql = $zbp->db->sql->Insert($GLOBALS['table']['ZBlog_BaiDu_Push_Logs'],$data);      		  		    			  	  
												$zbp->db->Insert($sql);     	  		 	
												        		 	
												$DataArr = array(    	   	  	
													'log_BdPush'=>$zbp->Config('ZBlog_BaiDu_Push')->post_push_key,      	     
												);    	 	  			
										    	   	 	 
												$where = array(array('=','log_ID',$id));     			  		
												$sqls= $zbp->db->sql->Update($table['Post'],$DataArr,$where);     		 			 
												$zbp->db->Update($sqls);	    						 	
													      	   		
											}     		 			    		 	    
										}elseif(isset($result->not_same_site)) {     	  				 
											$data = array(    	 			      			 		
												'Logs_PostID'      	=> $id,    			  	 	          		
												'Logs_Type'         => '2',     		   	     					   
												'Logs_Text'         => '推送失败，由于不是本站Url而未处理，Url:'.$result->not_same_site[0],      	  	 	  
												'Logs_Time' 	       => time(),    	    	 	      	 	   
											);      	  	 			
											$sql = $zbp->db->sql->Insert($GLOBALS['table']['ZBlog_BaiDu_Push_Logs'],$data);      		  		      		 			
											$zbp->db->Insert($sql);      						
															     	 		  	 
										}elseif(isset($result->not_valid)) {      	 	 	 	
											$data = array( 	 			    		 					
												'Logs_PostID'      	=> $id,    			  	 	    	 	  	 	
												'Logs_Type'         => '2',     		   	     				   	
												'Logs_Text'         => '推送失败，不合法的Url，Url:'.$result->not_valid[0],      	 	 	 	 
												'Logs_Time' 	       => time(),    	    	 	    	  		  	
											);      	 		 	  
											$sql = $zbp->db->sql->Insert($GLOBALS['table']['ZBlog_BaiDu_Push_Logs'],$data);      		  		      			  	
											$zbp->db->Insert($sql);    		    		
															       	  		 
										}elseif(isset($result->error)) {     	 			  	
											$data = array(  	 			    	 	 		  
												'Logs_PostID'      	=> $id,    			  	 	    	    			
												'Logs_Type'         => '2',     		   	      		  			
												'Logs_Text'         => '推送失败，错误代码：'.$result->error.'，错误描述：'.$result->message.'',      		 	  	 
												'Logs_Time' 	       => time(),    	    	 	    		 	    
											);       		  	  
											$sql = $zbp->db->sql->Insert($GLOBALS['table']['ZBlog_BaiDu_Push_Logs'],$data);      		  		    	 	 	 	 
											$zbp->db->Insert($sql);    	    	  
														       	 				
										}else {        	  	 	
											$data = array(  	 			    	 	 	 		
												'Logs_PostID'          => $id,    			  	 	    	 	  			
												'Logs_Type'         => '2',     		   	     		 	 		 
												'Logs_Text'         => '推送失败，未知错误!请检查推送接口是否正确、主机是否开启网络功能',      		 		   
												'Logs_Time' 	       => time(),    	    	 	    	 					 
											);      			  			
											$sql = $zbp->db->sql->Insert($GLOBALS['table']['ZBlog_BaiDu_Push_Logs'],$data);      		  		    		      
											$zbp->db->Insert($sql);    	 			 	 
											     		  	  
										}       	 	 	  
									}    		 		 		
								$speed = ($i+1) / $zbp->Config('ZBlog_BaiDu_Push')->apinumber * 100;    	 			 		
								echo "<script>";     	 	    
								echo "percent_txt.innerHTML='".$speed."';";    	 					 
								echo "document.getElementById(\"percent_txt2\").style['width']='".$speed."%';";    			  	 	
								echo "</script>";      		    		
								flush();	    	 		 		 
							}      	 		 	 
							echo "<script>";    			     
							echo "percent_txt.innerHTML='100';";        			 
							echo "document.getElementById(\"percent_txt2\").style['width']='100%';";      	 	   
							echo "</script>";     				 	 
							echo '<div class="alert alert-primary" style="text-align: center;">总执行'.$zbp->Config('ZBlog_BaiDu_Push')->apinumber.'次，每次数据'.$zbp->Config('ZBlog_BaiDu_Push')->postnumber.'条</div>';
						?> 
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