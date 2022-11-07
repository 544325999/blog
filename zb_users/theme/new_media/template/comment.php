<?php echo'404';die();?>
<div class="shadow-box msg noimg" id="cmt{$comment.ID}">
	<div class="msgimg">
	{if $zbp->CheckPlugin('Gravatar') || $zbp->CheckPlugin('ggravatar')}<img src="{$comment.Author.Avatar}">{else}{php}$randimg=rand(1,10);$randimg=$zbp->host."zb_users/theme/$theme/include/avatar/$randimg.png";{/php}<img src="{if $comment.Author.Level<4}{$comment.Author.Avatar}{else}{$randimg}{/if}">{/if}
	</div>
	<div class="msgtxt">
		<div class="msgname">
		    <a href="{$comment.Author.HomePage}" rel="nofollow" target="_blank">{$comment.Author.StaticName}</a>
		    <span class="time">{$comment.Time('Y-m-d')}
		{if $comment.Level=='0'}
        {php}
        if (isset($commentRootFloor)) 
        switch ($commentRootFloor) {
          case 1:
            echo "<span class='dot shafa'>1#</span>";
            break;  
          case 2:
            echo "<span class='dot yizi'>2#</span>";
            break;
          case 3:
            echo "<span class='dot bandeng'>3#</span>";
            break;
          case 4:
            echo "<span class='dot liangxi'>4#</span>";
            break;
          case 5:
            echo "<span class='dot diban'>5#</span>";
            break;
          default:
            echo "<span class='dot'>{$commentRootFloor}#</span>";
        }{/php}
        {/if}
		    <a href="#reply" onclick="zbp.comment.reply('{$comment.ID}')" class="comment-reply-link">回复</a></span>
		</div>
	</div>	
	<div class="msgarticle">
	{if $comment.ParentID!=0}{php}$newc=$zbp->GetCommentByID($comment->ParentID);$atid=$newc->ID;$atname=$newc->Author->StaticName;{/php}<a class="comment_at" href="#comment-{$atid}">@{$atname}</a>{/if}
	{$comment.Content}
    {foreach $comment.Comments as $key => $comment}
		{template:comment}
    {/foreach}
	</div>
</div>