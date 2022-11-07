<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{if $socialcomment}{$socialcomment}
{else}{if !$article.IsLock}{template:commentpost}
{/if}<div class="commentlist"><!--评论输出-->
	<div class="comment-tab">
		<div class="come-comt">评论列表 <span id="comment_count">{if $article.CommNums==0}（暂无评论，<span style="color:#E1171B">{$article.ViewNums}</span>人围观）{else}（有 <span style="color:#E1171B">{$article.CommNums}</span> 条评论，<span style="color:#E1171B">{$article.ViewNums}</span>人围观）{/if}</span></div>
	</div>
	{if $article.CommNums==0}<h2 class="comment-text-center"><i class="icon font-meiyou"></i> 还没有评论，来说两句吧...</h2>{/if}
	<label id="AjaxCommentBegin"></label>{php}
    if ($option['ZC_COMMENT_REVERSE_ORDER']=='1') {
        $where = array(array('=', 'comm_LogID', $article->ID),array('=', 'comm_RootID','0'),array('=', 'comm_IsChecking', 0));
        $_comments = $zbp->GetCommentList('*',$where,null,null,null);
        $commentsRootSum = count($_comments)+1;
    } else {
        $commentsRootSum = 0;
    }{/php}
	{foreach $comments as $key => $comment }
		{$commentRootFloor=abs($comment.FloorID-$commentsRootSum)}
		{template:comment}
	{/foreach}
	{if $article.CommNums>0 && $pagebar}<div id="com_pagination" class="pagination{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown{/if}"><!--评论翻页条输出-->
		<ul>
			{template:comment_pagebar}
		</ul>
	</div><label id="AjaxCommentEnd"></label>{/if}
</div>{/if}