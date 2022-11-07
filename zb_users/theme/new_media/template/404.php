<?php echo'404';die();?>
{template:header}
<style>
.error{padding: 40px 0 50px;text-align: center;overflow: hidden;}
.error h2{margin: 10px 0;color: #494952;font-weight: 700;font-size: 100px;line-height: 150px;}
.error h3{margin: 10px 0;color: #494952;font-size: 20px;line-height: 35px;font-weight: normal;}
.btn{text-align: center;margin: 20px 0;}
.btn a{display: inline-block;padding: 8px 60px;color:#494952;background:#e6e7ee;box-shadow: 3px 3px 6px #b8b9be,-3px -3px 6px #fff;border-radius:0.35rem;border: 1px solid #d1d9e6;font-size: 16px;}
.btn a:hover{background-color: #e6e7ee;border-color: #e6e7ee;box-shadow: inset 2px 2px 5px #b8b9be,inset -3px -3px 7px #fff;}
@media screen and (max-width: 980px) {
	.error{padding: 0 0 0;}
}
</style>
<div class="container" style="margin-top:100px;">
	<div class="post">
		<div class="error">
			<h2>404</h2>
			<h3>嗷~页面不存在或已被删除！</h3>
			<div class="btn"><a class="iconfont icon-home-filling" href="{$host}" rel="nofollow">返回首页</a></div>
		</div>
	</div>
</div>
{template:footer}