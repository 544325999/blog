<?php  /* Template Name:分页条 */  ?><?php if ($pagebar) { ?>
<?php  foreach ( $pagebar->buttons as $k=>$v) { ?>
<?php if ($pagebar->PageNow==$k) { ?>
<li class="active"><span><?php  echo $k;  ?></span></li>
<?php }elseif($k=='‹‹' and $pagebar->PageNow!=$pagebar->PageFirst) {  ?>
<li><a href="<?php  echo $pagebar->buttons['‹‹'];  ?>document.getElementById('comt-respond').scrollIntoView()" class="c-nav ease shouye" title="首页">首页</a></li>
<?php }elseif($k=='‹‹' and $pagebar->PageNow==$pagebar->PageFirst) {  ?>
<?php }elseif($k=='››' and $pagebar->PageNow==$pagebar->PageLast) {  ?>
<?php }elseif($k=='››' and $pagebar->PageNow!=$pagebar->PageLast) {  ?>
<li><a href="<?php  echo $pagebar->buttons['››'];  ?>document.getElementById('comt-respond').scrollIntoView()" class="c-nav ease moye" title="末页">末页 </a></li>
<?php }elseif($k=='‹') {  ?>
<li><a href="<?php  echo $v;  ?>document.getElementById('comt-respond').scrollIntoView()" title="上一页" class="c-nav prev ease a1">上一页</a></li>
<?php }elseif($k=='›') {  ?>
<li><a href="<?php  echo $v;  ?>document.getElementById('comt-respond').scrollIntoView()" title="下一页" class="c-nav next ease a1">下一页</a></li>
<?php }else{  ?>
<li><a href="<?php  echo $v;  ?>document.getElementById('comt-respond').scrollIntoView()" title="第<?php  echo $k;  ?>页" ><?php  echo $k;  ?></a></li>
<?php } ?>
<?php }   ?>
<li><span>共 <?php  echo $pagebar->PageAll;  ?> 页</span></li><?php } ?>