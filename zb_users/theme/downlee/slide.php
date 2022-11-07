<?php /* EL PSY CONGROO */       	    
$downlee_Table='%pre%downlee';    				  	        		       					 		
$downlee_DataInfo=array(    		 		 		    	 		  		     	 	    
    'ID'=>array('sean_ID','integer','',0),        	 	     		   			      		   	
    'Type'=>array('sean_Type','integer','',0),     			 			    		            	  		 
    'Title'=>array('sean_Title','string',255,''),     	   	 	    	 	 	 	     	 			 		
    'Url'=>array('sean_Url','string',255,''),      				 	     	 		 		    	  	  		
    'Img'=>array('sean_Img','string',255,''),      	  		      	 		 		    			  		 
    'Order'=>array('sean_Order','integer','',99),    		  	 	       		 	 	     	  			 
    'Code'=>array('sean_Code','string',255,''),    				 	        	 		      		  	  	
    'IsUsed'=>array('sean_IsUsed','boolean','',true),      	 				    		    	       				  
    'Intro'=>array('sean_Intro','string',255,''),        	       						        			  	
    'Addtime'=>array('sean_Addtime','integer','',0),       	 		      		   	      	 	 	 	
    'Endtime'=>array('sean_Endtime','integer','',0),       					     	   		      					 	
);    		     	        	 	     				 	 	
function downlee_Get_Flash($downlee_Table,$downlee_DataInfo){     		  			     		  			    	 	    	
    global $zbp;    	 		  		      						         			
    $where = array(array('=','sean_Type','0'),array('=','sean_IsUsed','1'));         			     	   	        	  	  
    $order = array('sean_IsUsed'=>'DESC','sean_Order'=>'ASC');     	  		      	 	 			      	      
    $sql= $zbp->db->sql->Select($downlee_Table,'*',$where,$order,null,null);    	 	   	     							     			 	  	
    $array=$zbp->GetListCustom($downlee_Table,$downlee_DataInfo,$sql);     	 	        	   	 		     	 		 		
    $i =1;    		 				      							      	  	 	
    $str = "";     	 		       	  			      		 	 	 	
    foreach ($array as $key => $reg) {    			 	 	 
        $str .= '<div class="swiper-slide"><a href="'.$reg->Url.'"';     	  				
        if ($reg->Code=="1"){$str .= ' target="_blank"';}    	  	 	  
        $str .= '><img src="'.$reg->Img.'" alt="'.$reg->Title.'"><span class="swiper-title">'.$reg->Title.'</span></a></div>';    	   	   
        //$i++;     	   	        		  	     		 				 
    }     			         					        		    
    @file_put_contents($zbp->usersdir . 'theme/'.$zbp->theme.'/include/slide.php', $str);    		   			
}    		  			     	 				 	    		   			
?>