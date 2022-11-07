<?php $i = (int) ($zbp->modulesbyfilename['comments']->MaxLi ? $zbp->modulesbyfilename['comments']->MaxLi : 6);
$comments = $zbp->GetCommentList('*', array(array('=', 'comm_IsChecking', 0),array('<>', 'comm_AuthorID','1')), array('comm_PostTime' => 'DESC'), $i, null); ?>
<?php  foreach ( $comments as $comment) { ?><?php $commentinfo = preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($comment->Content,'[nohtml]'),58)).''); ?>
<li class="s-c">
	<a href="<?php  echo $comment->Post->Url;  ?>#cmt<?php  echo $comment->ID;  ?>" title="发表在：<?php  echo $comment->Post->Title;  ?>" rel="external nofollow"><img src="<?php  echo downlee_MemberAvatar($comment->Author);  ?>" class="avatar avatar-64" height="64" width="64" alt="<?php  echo $comment->Author->StaticName;  ?>"><span class="comment_author"><strong><?php  echo $comment->Author->StaticName;  ?>：</strong></span><span class="comment_author_text"><?php  echo $commentinfo;  ?></span>
	</a>
</li><?php }   ?>