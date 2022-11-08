 <div id="comt-respond" class="commentpost<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown<?php } ?>">
	<h4>发表评论<span><a rel="nofollow" id="cancel-reply" href="#comment" style="display:none;"><small>取消回复</small></a></span></h4>
	<form id="frmSumbit" target="_self" method="post" action="<?php  echo $article->CommentPostUrl;  ?>" >
	<input type="hidden" name="inpId" id="inpId" value="<?php  echo $article->ID;  ?>" />
	<input type="hidden" name="inpRevID" id="inpRevID" value="0" />
	<?php if ($user->ID>0) { ?><input type="hidden" name="inpName" id="inpName" value="<?php  echo $user->StaticName;  ?>" />
	<input type="hidden" name="inpEmail" id="inpEmail" value="<?php  echo $user->Email;  ?>" />
	<input type="hidden" name="inpHomePage" id="inpHomePage" value="<?php  echo $user->HomePage;  ?>" />
	<?php }else{  ?><div class="comt-box">
		<div class="form-group liuyan form-name"><input type="text" name="inpName" id="inpName" class="text" value="<?php  echo $user->StaticName;  ?>" placeholder="昵称" size="28" tabindex="1" /></div>
		<div class="form-group liuyan form-email"><input type="text" name="inpEmail" id="inpEmail" class="text" value="<?php  echo $user->Email;  ?>" placeholder="邮箱" size="28" tabindex="2" /></div>
		<div class="form-group liuyan form-www"><input type="text" name="inpHomePage" id="inpHomePage" class="text" value="<?php  echo $user->HomePage;  ?>" placeholder="网址" size="28" tabindex="3" /></div>
	</div><?php } ?><!--verify-->
	<div id="comment-tools">
		<div class="tools_text">
			<textarea placeholder="<?php  echo $zbp->Config('downlee')->diyplwz;  ?>" name="txaArticle" id="txaArticle" class="text input-block-level comt-area" cols="50" rows="4" tabindex="5"></textarea>
		</div>
	</div>
	<div class="psumbit">
		<div class="tools_title">
			<span class="com-title com-reply">快捷回复：</span>
			<a class="psumbit-kjhf" href="javascript:addNumber('<?php  echo $zbp->Config('downlee')->diyubhao;  ?>')" title="<?php  echo $zbp->Config('downlee')->diyubhao;  ?>"><i class="icon font-thumbs-o-up"></i></a>
			<a class="psumbit-kjhf" href="javascript:addNumber('<?php  echo $zbp->Config('downlee')->diyubcai;  ?>')" title="<?php  echo $zbp->Config('downlee')->diyubcai;  ?>"><i class="icon font-thumbs-o-down"></i></a>
			<a class="psumbit-kjhf" href="javascript:addNumber('<?php  echo $zbp->Config('downlee')->diyubding;  ?>')" title="<?php  echo $zbp->Config('downlee')->diyubding;  ?>"><i class="icon font-xin"></i></a>
			<span class="com-title">表情：</span><a href="javascript:;" class="face-show"><i class="icon font-smile-o"></i></a>
			<div id="ComtoolsFrame" class="ComtoolsFrame" style="display: none;"><?php downlee_face_files() ?></div>
		</div>
		<input name="sumbit" type="submit" tabindex="6" value="提交" onclick="return zbp.comment.post()" class="button" />
		<?php if ($option['ZC_COMMENT_VERIFY_ENABLE']) { ?><div class="form-inpVerify"> 
			<div class="input-inpVerify">
				<input type="text" id="inpVerify" name="inpVerify" tabindex="4" placeholder="验证码">
				<div class="input-group-addon"><img src="<?php  echo $article->ValidCodeUrl;  ?>" alt="验证码" class="verifyimg" onclick="javascript:this.src='<?php  echo $article->ValidCodeUrl;  ?>&amp;tm='+Math.random();"/></div>
			</div>
		</div><?php } ?>
	</div>
	</form>
</div><?php $footer .='<script src="http://zbapp.com/zb_users/theme/downlee/script/qqinfo.js"></script>' ?>