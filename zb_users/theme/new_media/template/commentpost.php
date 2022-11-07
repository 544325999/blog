<?php echo'404';die();?>
<div id="comt-respond" class="commentpost">
	<h4>发布评论<span><a rel="nofollow" id="cancel-reply" href="#comment" style="display:none;"><small>取消回复</small></a></span></h4>
	<form id="frmSumbit" target="_self" method="post" action="{$article.CommentPostUrl}" >
	<input type="hidden" name="inpId" id="inpId" value="{$article.ID}" />
	<input type="hidden" name="inpRevID" id="inpRevID" value="0" />
	{if $user.ID>0}<input type="hidden" name="inpName" id="inpName" value="{$user.Name}" />
	<input type="hidden" name="inpEmail" id="inpEmail" value="{$user.Email}" />
	<input type="hidden" name="inpHomePage" id="inpHomePage" value="{$user.HomePage}" />
	{else}<div class="comt-box">
		<div class="form-group liuyan form-name">
		    <input type="text" id="inpName" class="text" value="{GetVars('username', 'COOKIE')}" name="inpName" tabindex="1" placeholder="用户名：">
		    <span class="b-line"></span>
		    <span class="b-line-under"></span>
		</div>
    	{if $option['ZC_COMMENT_VERIFY_ENABLE']}<div class="form-inpVerify"> 
    		<div class="input-inpVerify">
    			<input type="text" id="inpVerify" name="inpVerify" tabindex="4" placeholder="验证码：">
                <span class="b-line"></span>
                <span class="b-line-under"></span>
    			<div class="input-group-addon"><img src="{$article.ValidCodeUrl}" alt="验证码" class="verifyimg" onclick="javascript:this.src='{$article.ValidCodeUrl}&amp;tm='+Math.random();"/>
    			</div>
    		</div>
    	</div>
    	{/if}			
		<div class="form-group liuyan form-email"><input type="text" id="inpEmail" class="text" name="inpEmail" tabindex="2" placeholder="邮箱："> </div>
		<div class="form-group liuyan form-www"><input type="text" id="inpHomePage" name="inpHomePage" class="text" tabindex="3" placeholder="网址："></div>
	</div>{/if}<!--verify-->
	<div id="comment-tools">
		<div class="tools_text">
			<textarea placeholder="请留言：" name="txaArticle" id="txaArticle" class="text input-block-level comt-area" cols="50" rows="4" tabindex="5"></textarea>
			<span class="b-line"></span>
			<span class="b-line-under"></span>
		</div>
	</div>
	<div class="psumbit">
		<input name="sumbit" type="submit" tabindex="6" value="发布" onclick="return zbp.comment.post()" class="button" />
	</div>

	</form>
</div>