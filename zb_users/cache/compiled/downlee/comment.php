<?php if ($zbp->CheckPlugin('CommentUA')) { ?><?php  echo $comment->CommentUA_GetUserAgent();  ?><?php } ?><div class="shadow-box msg noimg<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInRight" data-wow-delay="0.25s<?php } ?>" id="cmt<?php  echo $comment->ID;  ?>">
	<div class="msgimg">
		<img class="avatar" src="<?php  echo downlee_MemberAvatar($comment->Author);  ?>" alt="网友昵称：<?php  echo $comment->Author->StaticName;  ?>" title="网友昵称：<?php  echo $comment->Author->StaticName;  ?>"/>
	</div>
	<div class="msgtxt">
		<div class="msgname<?php if ($zbp->CheckPlugin('LayCenter')) { ?> LayName<?php } ?>">
			<a href="<?php  echo $comment->Author->HomePage;  ?>" rel="nofollow" target="_blank"><?php  echo $comment->Author->StaticName;  ?></a><?php if (($comment->AuthorID == $article->AuthorID )) { ?><span class="autlv aut-<?php  echo $comment->Author->Level;  ?> vs">V</span><?php }elseif($zbp->CheckPlugin('LayCenter')) {  ?><span class="autlv lay-<?php  echo $comment->Author->VipType;  ?> vs">V</span><?php }else{  ?><span class="autlv aut-<?php  echo $comment->Author->Level;  ?> vs">V</span><?php } ?><?php if (($comment->AuthorID == $article->AuthorID )) { ?><span class="autlv autlvname aut-<?php  echo $comment->Author->Level;  ?>">博主</span><?php }elseif($zbp->CheckPlugin('LayCenter')) {  ?><span class="autlv autlvname lay-<?php  echo $comment->Author->VipType;  ?>"><?php  echo $comment->Author->VipName;  ?></span><?php }elseif(($comment->Author->Level < 5)) {  ?><span class="autlv autlvname aut-tf">铁粉</span><?php }else{  ?><span class="autlv autlvname aut-<?php  echo $comment->Author->Level;  ?>"><?php  echo $comment->Author->LevelName;  ?></span><?php } ?>
			<?php if ($zbp->CheckPlugin('CommentUA')) { ?><span class="WB-OS">
				<img src="<?php  echo $comment->CommentUA['browser']['img_16'];  ?>" title="<?php  echo $comment->CommentUA['browser']['title'];  ?>" alt="<?php  echo $comment->CommentUA['browser']['title'];  ?>">
				<img src="<?php  echo $comment->CommentUA['platform']['img_16'];  ?>" title="<?php  echo $comment->CommentUA['platform']['title'];  ?>" alt="<?php  echo $comment->CommentUA['platform']['title'];  ?>">
			</span>
			<?php } ?><?php if ($comment->Level=='0') { ?><?php if (isset($commentRootFloor)) 
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
			} ?><?php } ?>
		</div>
		<div class="interact-bar">
			<span class="interact-time" title="评论时间：<?php  echo $comment->Time('Y年m月d日 H:i:s');  ?>"><?php  echo downlee_TimeAgo($comment->Time());  ?></span>
			<?php if (((int)$zbp->Config('iparealee')->Getipon) && ($zbp->CheckPlugin('iparealee'))) { ?><span class="spot"></span><span class="interact-area" title="<?php if ($user->Level == 1) { ?>IP地址：<?php  echo $comment->IP;  ?><?php } ?>">来自<?php  echo get_ipaddress($comment->IP);  ?></span>
			<?php } ?><span class="spot"></span><a href="#reply" onclick="zbp.comment.reply('<?php  echo $comment->ID;  ?>')" class="comment-reply-link">回复</a>
		</div>
		<div class="msgarticle">
			<?php if ($comment->ParentID!=0) { ?><?php $newc=$zbp->GetCommentByID($comment->ParentID);$atid=$newc->ID;$atname=$newc->Author->StaticName; ?><a class="comment_at" href="#comment-<?php  echo $atid;  ?>">@<?php  echo $atname;  ?></a><?php } ?>
			<?php  echo $comment->Content;  ?>
			<?php  foreach ( $comment->Comments as $key => $comment) { ?>
				<?php  include $this->GetTemplate('comment');  ?>
			<?php }   ?>
		</div>
	</div>
</div>