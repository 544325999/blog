{* Template Name:分页条 *}<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{if $pagebar}
{foreach $pagebar.buttons as $k=>$v}
{if $pagebar.PageNow==$k}
<li class="active"><span>{$k}</span></li>
{elseif $k=='‹‹' and $pagebar.PageNow!=$pagebar.PageFirst}
<li><a href="{$pagebar.buttons['‹‹']}document.getElementById('comt-respond').scrollIntoView()" class="c-nav ease shouye" title="首页">首页</a></li>
{elseif $k=='‹‹' and $pagebar.PageNow==$pagebar.PageFirst}
{elseif $k=='››' and $pagebar.PageNow==$pagebar.PageLast}
{elseif $k=='››' and $pagebar.PageNow!=$pagebar.PageLast}
<li><a href="{$pagebar.buttons['››']}document.getElementById('comt-respond').scrollIntoView()" class="c-nav ease moye" title="末页">末页 </a></li>
{elseif $k=='‹'}
<li><a href="{$v}document.getElementById('comt-respond').scrollIntoView()" title="上一页" class="c-nav prev ease a1">上一页</a></li>
{elseif $k=='›'}
<li><a href="{$v}document.getElementById('comt-respond').scrollIntoView()" title="下一页" class="c-nav next ease a1">下一页</a></li>
{else}
<li><a href="{$v}document.getElementById('comt-respond').scrollIntoView()" title="第{$k}页" >{$k}</a></li>
{/if}
{/foreach}
<li><span>共 {$pagebar.PageAll} 页</span></li>{/if}