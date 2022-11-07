<?php echo'404';die();?>
{if $zbp->Config( 'new_media' )->ad2_on=='1'}
<div class="ad-zone ad2">
    {$zbp->Config( 'new_media' )->ad2}
</div>
{/if}		   
		
<footer id="footer">
	<div class="footer container-w cl">
		{if $zbp->Config( 'new_media' )->foot_on=='1'}
		<div class="fnav">
			{$zbp->Config( 'new_media' )->foothtml}
		</div>
		{/if}
		<span class="copy">Powered By {if $zbp->Config('new_media')->copy_on=='1'}
		{$zblogphpabbrhtml}{/if}{$zbp->Config('new_media')->copyright} | {$zbp->Config('new_media')->beian} {$zbp->Config('new_media')->tongji}</span>
        <div class="flogo"><img src="{if $zbp->Config( 'new_media' )->uplod_qr}{$zbp->Config( 'new_media' )->uplod_qr}{else}{$host}zb_users/theme/{$theme}/style/images/qr.png{/if}" alt="{$name}二维码">
        </div>	
	</div>
</footer>

<script src="{$host}zb_users/theme/{$theme}/script/common.min.js?v=1.1"></script>
<script src="{$host}zb_users/theme/{$theme}/script/custom.js?v=1.0"></script>
<script> 
function goTop() {
    var obj = document.getElementById("goTopBtn");
    function getScrollTop() {
        return document.documentElement.scrollTop || document.body.scrollTop;
    }
    function setScrollTop(value) {
        if (document.documentElement.scrollTop) {
            document.documentElement.scrollTop = value;
        } else {
            document.body.scrollTop = value;
        }

    }
    window.onscroll = function() {
        getScrollTop() > 0 ? obj.style.display = "": obj.style.display = "none";
        var h = document.body.scrollHeight - getScrollTop() - obj.offsetTop - obj.offsetHeight;
        obj.style.bottom = 0 + "px";
        if (h < 350) {
            obj.style.bottom = 340 + "px";
            obj.style.top = "auto";
        }

    }
    obj.onclick = function() {

        var goTop = setInterval(scrollMove, 10);
        function scrollMove() {
            setScrollTop(getScrollTop() / 1.1);
            if (getScrollTop() < 1) clearInterval(goTop);

        }
    }
}
</script>
<script>
    var s = document.location;
	$(".navbar a").each(function() {
		if (this.href == s.toString().split("#")[0]) {
			$(this).addClass("active");
			return false;
		}
	});
</script>
<div id="gotop" >
  <div style="display: none; margin-bottom:5px;" id="goTopBtn" ><a title="返回顶部" class="gotopa"><span class="iconfont icon-rocket-fill"></span></a></div>
  <script>goTop();</script>
</div> 
{$footer}
</body>
</html>