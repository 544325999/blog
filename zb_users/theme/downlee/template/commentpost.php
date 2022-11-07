 <?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?><div id="comt-respond" class="commentpost{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown{/if}">
	<h4>发表评论<span><a rel="nofollow" id="cancel-reply" href="#comment" style="display:none;"><small>取消回复</small></a></span></h4>
	<form id="frmSumbit" target="_self" method="post" action="{$article.CommentPostUrl}" >
	<input type="hidden" name="inpId" id="inpId" value="{$article.ID}" />
	<input type="hidden" name="inpRevID" id="inpRevID" value="0" />
	{if $user.ID>0}<input type="hidden" name="inpName" id="inpName" value="{$user.StaticName}" />
	<input type="hidden" name="inpEmail" id="inpEmail" value="{$user.Email}" />
	<input type="hidden" name="inpHomePage" id="inpHomePage" value="{$user.HomePage}" />
	{else}<div class="comt-box">
		<div class="form-group liuyan form-name"><input type="text" name="inpName" id="inpName" class="text" value="{$user.StaticName}" placeholder="昵称" size="28" tabindex="1" /></div>
		<div class="form-group liuyan form-email"><input type="text" name="inpEmail" id="inpEmail" class="text" value="{$user.Email}" placeholder="邮箱" size="28" tabindex="2" /></div>
		<div class="form-group liuyan form-www"><input type="text" name="inpHomePage" id="inpHomePage" class="text" value="{$user.HomePage}" placeholder="网址" size="28" tabindex="3" /></div>
	</div>{/if}<!--verify-->
	<div id="comment-tools">
		<div class="tools_text">
			<textarea placeholder="{$zbp->Config('downlee')->diyplwz}" name="txaArticle" id="txaArticle" class="text input-block-level comt-area" cols="50" rows="4" tabindex="5"></textarea>
		</div>
	</div>
	<div class="psumbit">
		<div class="tools_title">
			<span class="com-title com-reply">快捷回复：</span>
			<a class="psumbit-kjhf" href="javascript:addNumber('{$zbp->Config('downlee')->diyubhao}')" title="{$zbp->Config('downlee')->diyubhao}"><i class="icon font-thumbs-o-up"></i></a>
			<a class="psumbit-kjhf" href="javascript:addNumber('{$zbp->Config('downlee')->diyubcai}')" title="{$zbp->Config('downlee')->diyubcai}"><i class="icon font-thumbs-o-down"></i></a>
			<a class="psumbit-kjhf" href="javascript:addNumber('{$zbp->Config('downlee')->diyubding}')" title="{$zbp->Config('downlee')->diyubding}"><i class="icon font-xin"></i></a>
			<span class="com-title">表情：</span><a href="javascript:;" class="face-show"><i class="icon font-smile-o"></i></a>
			<div id="ComtoolsFrame" class="ComtoolsFrame" style="display: none;">{php}downlee_face_files(){/php}</div>
		</div>
		<input name="sumbit" type="submit" tabindex="6" value="提交" onclick="return zbp.comment.post()" class="button" />
		{if $option['ZC_COMMENT_VERIFY_ENABLE']}<div class="form-inpVerify"> 
			<div class="input-inpVerify">
				<input type="text" id="inpVerify" name="inpVerify" tabindex="4" placeholder="验证码">
				<div class="input-group-addon"><img src="{$article.ValidCodeUrl}" alt="验证码" class="verifyimg" onclick="javascript:this.src='{$article.ValidCodeUrl}&amp;tm='+Math.random();"/></div>
			</div>
		</div>{/if}
	</div>
	</form>
</div>