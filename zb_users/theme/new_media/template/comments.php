<?php echo'404';die();?>
{if $socialcomment}
  {$socialcomment}
{else}
<!--评论框-->
{if !$article.IsLock}
  {template:commentpost}
{/if}
<!--评论框结束-->
<!--评论输出-->
<div class="commentlist">
{if !$article.CommNums==0}
<div class="comment-tab">
  <div class="come-comt">
    评论列表 <span id="comment_count">{if $article.CommNums==0}（暂无评论）{else}（有 <span style="color:#c81111">{$article.CommNums}</span> 条评论）{/if}</span>
  </div>
</div>
{/if}
<label id="AjaxCommentBegin"></label>
{php}
    if ($option['ZC_COMMENT_REVERSE_ORDER']=='1') {
        $where = array(array('=', 'comm_LogID', $article->ID),array('=', 'comm_RootID','0'),array('=', 'comm_IsChecking', 0));
        $_comments = $zbp->GetCommentList('*',$where,null,null,null);
        $commentsRootSum = count($_comments)+1;
    } else {
        $commentsRootSum = 0;
    }
{/php}
{foreach $comments as $key => $comment }
	{$commentRootFloor=abs($comment.FloorID-$commentsRootSum)}
	{template:comment}
{/foreach}
<!--评论输出结束-->
<!--评论翻页条输出-->
<div id="com_pagination" class="pagination">
  <div>
    {template:pagebar}
  </div>
</div>
<label id="AjaxCommentEnd"></label>
<!--评论翻页条输出结束-->
</div>
{/if}