<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{if $zbp->CheckPlugin('CommentUA')}{$comment.CommentUA_GetUserAgent()}{/if}<div class="shadow-box msg noimg{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInRight" data-wow-delay="0.25s{/if}" id="cmt{$comment.ID}">
	<div class="msgimg">
		<img class="avatar" src="{downlee_MemberAvatar($comment->Author)}" alt="网友昵称：{$comment.Author.StaticName}" title="网友昵称：{$comment.Author.StaticName}"/>
	</div>
	<div class="msgtxt">
		<div class="msgname{if $zbp->CheckPlugin('LayCenter')} LayName{/if}">
			<a href="{$comment.Author.HomePage}" rel="nofollow" target="_blank">{$comment.Author.StaticName}</a>{if ($comment->AuthorID == $article->AuthorID )}<span class="autlv aut-{$comment.Author.Level} vs">V</span>{elseif $zbp->CheckPlugin('LayCenter')}<span class="autlv lay-{$comment.Author.VipType} vs">V</span>{else}<span class="autlv aut-{$comment.Author.Level} vs">V</span>{/if}{if ($comment->AuthorID == $article->AuthorID )}<span class="autlv autlvname aut-{$comment.Author.Level}">博主</span>{elseif $zbp->CheckPlugin('LayCenter')}<span class="autlv autlvname lay-{$comment.Author.VipType}">{$comment.Author.VipName}</span>{elseif ($comment->Author->Level < 5)}<span class="autlv autlvname aut-tf">铁粉</span>{else}<span class="autlv autlvname aut-{$comment.Author.Level}">{$comment.Author.LevelName}</span>{/if}
			{if $zbp->CheckPlugin('CommentUA')}<span class="WB-OS">
				<img src="{$comment.CommentUA['browser']['img_16']}" title="{$comment.CommentUA['browser']['title']}" alt="{$comment.CommentUA['browser']['title']}">
				<img src="{$comment.CommentUA['platform']['img_16']}" title="{$comment.CommentUA['platform']['title']}" alt="{$comment.CommentUA['platform']['title']}">
			</span>
			{/if}{if $comment.Level=='0'}{php}if (isset($commentRootFloor)) 
			switch ($commentRootFloor) {
			case 1:
			echo "<span class='dot shafa'>沙发</span>";
			break;  
			case 2:
			echo "<span class='dot yizi'>椅子</span>";
			break;
			case 3:
			echo "<span class='dot bandeng'>板凳</span>";
			break;
			case 4:
			echo "<span class='dot liangxi'>凉席</span>";
			break;
			case 5:
			echo "<span class='dot diban'>地板</span>";
			break;
			default:
			echo "<span class='dot'>{$commentRootFloor}楼</span>";
			}{/php}{/if}
		</div>
		<div class="interact-bar">
			<span class="interact-time" title="评论时间：{$comment.Time('Y年m月d日 H:i:s')}">{downlee_TimeAgo($comment.Time())}</span>
			{if ((int)$zbp->Config('iparealee')->Getipon) && ($zbp->CheckPlugin('iparealee'))}<span class="spot"></span><span class="interact-area" title="{if $user.Level == 1}IP地址：{$comment.IP}{/if}">来自{get_ipaddress($comment.IP)}</span>
			{/if}<span class="spot"></span><a href="#reply" onclick="zbp.comment.reply('{$comment.ID}')" class="comment-reply-link">回复</a>
		</div>
		<div class="msgarticle">
			{if $comment.ParentID!=0}{php}$newc=$zbp->GetCommentByID($comment->ParentID);$atid=$newc->ID;$atname=$newc->Author->StaticName;{/php}<a class="comment_at" href="#comment-{$atid}">@{$atname}</a>{/if}
			{$comment.Content}
			{foreach $comment.Comments as $key => $comment}
				{template:comment}
			{/foreach}
		</div>
	</div>
</div>