<?php if ($socialcomment) { ?><?php  echo $socialcomment;  ?>
<?php }else{  ?><?php if (!$article->IsLock) { ?><?php  include $this->GetTemplate('commentpost');  ?>
<?php } ?><div class="commentlist"><!--评论输出-->
	<div class="comment-tab">
		<div class="come-comt">评论列表 <span id="comment_count"><?php if ($article->CommNums==0) { ?>（暂无评论，<span style="color:#E1171B"><?php  echo $article->ViewNums;  ?></span>人围观）<?php }else{  ?>（有 <span style="color:#E1171B"><?php  echo $article->CommNums;  ?></span> 条评论，<span style="color:#E1171B"><?php  echo $article->ViewNums;  ?></span>人围观）<?php } ?></span></div>
	</div>
	<?php if ($article->CommNums==0) { ?><h2 class="comment-text-center"><i class="icon font-meiyou"></i> 还没有评论，来说两句吧...</h2><?php } ?>
	<label id="AjaxCommentBegin"></label><?php 
    if ($option['ZC_COMMENT_REVERSE_ORDER']=='1') {
        $where = array(array('=', 'comm_LogID', $article->ID),array('=', 'comm_RootID','0'),array('=', 'comm_IsChecking', 0));
        $_comments = $zbp->GetCommentList('*',$where,null,null,null);
        $commentsRootSum = count($_comments)+1;
    } else {
        $commentsRootSum = 0;
    } ?>
	<?php  foreach ( $comments as $key => $comment ) { ?>
		<?php  $commentRootFloor=abs($comment->FloorID-$commentsRootSum);  ?>
		<?php  include $this->GetTemplate('comment');  ?>
	<?php }   ?>
	<?php if ($article->CommNums>0 && $pagebar) { ?><div id="com_pagination" class="pagination<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown<?php } ?>"><!--评论翻页条输出-->
		<ul>
			<?php  include $this->GetTemplate('comment_pagebar');  ?>
		</ul>
	</div><label id="AjaxCommentEnd"></label><?php } ?>
</div><?php } ?>