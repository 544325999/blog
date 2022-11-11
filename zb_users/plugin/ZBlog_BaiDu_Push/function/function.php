<?php /* EL PSY CONGROO */       			 	
function ZBlog_BaiDu_Push_Post_Response3(){        		 	
    global $zbp,$article;    		  	   
	if ($zbp->Config('ZBlog_BaiDu_Push')->post_push_zd_ok != 'true'){     	   		 
		echo '<div id="alias" class="editmod"><label for="meta_post_push" class="editinputname">关闭百度推送</label><input type="text" name="meta_post_push" class="checkbox" value="'.htmlspecialchars($article->Metas->post_push).'"/></div>';    			 	   
	}    	 	 			 
}      	  			
     	 		 		
function ZBlog_BaiDu_Push_Post_Add($article){     				 	 
    global $zbp,$table;    		  		 	
	if ($zbp->Config('ZBlog_BaiDu_Push')->post_push_zd_ok != 'true'){     			 			
		if ($article->Metas->post_push!='1'){      		 			
			if ($article->Status == 0){     	 	  	 
				$id = $article->ID;    	 			 		
				$url=$article->Url;     	 	   	
				$ZBlog_BaiDu_Push_Ajax = new ZBlog_BaiDu_Push_Ajax();    	  	  		
				$result = json_decode($ZBlog_BaiDu_Push_Ajax->Post_Push($url));      				  
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
						$zbp->SetHint('good','推送成功');          		    
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
					$zbp->SetHint('bad','推送失败');       	 		        	 		 
				}elseif(isset($result->not_valid)) {     	 			  	
					$data = array( 	 			        	   
						'Logs_PostID'      	=> $id,    			  	 	    							 
						'Logs_Type'         => '2',     		   	       				  
						'Logs_Text'         => '推送失败，不合法的Url，Url:'.$result->not_valid[0],        		   	
						'Logs_Time' 	       => time(),    	    	 	       	 		 
					);       	   			
					$sql = $zbp->db->sql->Insert($GLOBALS['table']['ZBlog_BaiDu_Push_Logs'],$data);      		  		    	 	 	 	 
					$zbp->db->Insert($sql);    	  		  	
					$zbp->SetHint('bad','推送失败');       	 		      		 	 		
				}elseif(isset($result->error)) {     		 	 			
					$data = array(  	 			    	 		 			
						'Logs_PostID'      	=> $id,    			  	 	     		  		 
						'Logs_Type'         => '2',     		   	      	  				
						'Logs_Text'         => '推送失败，错误代码：'.$result->error.'，错误描述：'.$result->message.'',      	 		 			
						'Logs_Time' 	       => time(),    	    	 	        				
					);       	   	 	
					$sql = $zbp->db->sql->Insert($GLOBALS['table']['ZBlog_BaiDu_Push_Logs'],$data);      		  		     	 					
					$zbp->db->Insert($sql);    	   		 	
					$zbp->SetHint('bad','推送失败');       	 		     		  				
				}else {        		   	
					$data = array(  	 			    		  	  	
						'Logs_PostID'       => $id,    			  	 	     	 	 	  
						'Logs_Type'         => '2',     		   	       	  	  
						'Logs_Text'         => '推送失败，未知错误!请检查推送接口是否正确、主机是否开启网络功能',      			    	
						'Logs_Time' 	       => time(),    	    	 	    	  	   	
					);       		   	 
					$sql = $zbp->db->sql->Insert($GLOBALS['table']['ZBlog_BaiDu_Push_Logs'],$data);      		  		        	 		
					$zbp->db->Insert($sql);    				 			
					$zbp->SetHint('bad','推送失败');      	 	 			
				}          	   
			}     		  	  
		}     	 					
	}    		 		 		
}	    	  	 	 	
		      		 		 
		          		
		    	   	 	 