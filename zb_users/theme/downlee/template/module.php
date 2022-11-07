<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?><section class="widget{if $zbp->Config('downlee')->gdtxoff=='1'} wow fadeInDown{/if}" id="{$module.HtmlID}">
{if (!$module.IsHideTitle)&&($module.Name)}<h3 class="widget-title">{$module.Name}</h3>
{/if}{if $module.Type=='div'}<div class="widget-box {$module.HtmlID}">{$module.Content}</div>
{/if}{if $module.Type=='ul'}<ul class="widget-box {$module.HtmlID}">{$module.Content}</ul>
{/if}</section>