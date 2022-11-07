<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{php}$i = (int) ($zbp->modulesbyfilename['comments']->MaxLi ? $zbp->modulesbyfilename['comments']->MaxLi : 6);
$comments = $zbp->GetCommentList('*', array(array('=', 'comm_IsChecking', 0),array('<>', 'comm_AuthorID','1')), array('comm_PostTime' => 'DESC'), $i, null);{/php}
{foreach $comments as $comment}{php}$commentinfo = preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($comment->Content,'[nohtml]'),58)).'');{/php}
<li class="s-c">
	<a href="{$comment->Post->Url}#cmt{$comment->ID}" title="发表在：{$comment->Post->Title}" rel="external nofollow"><img src="{downlee_MemberAvatar($comment->Author)}" class="avatar avatar-64" height="64" width="64" alt="{$comment->Author->StaticName}"><span class="comment_author"><strong>{$comment->Author->StaticName}：</strong></span><span class="comment_author_text">{$commentinfo}</span>
	</a>
</li>{/foreach}