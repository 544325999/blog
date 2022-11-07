<?php echo'404';die();?>

{if $module.FileName=='zuozhe'}
<div class="widget widget_author"> {if $type=='article'}
  <div class="title" style="background:url('{if $zbp->Config( 'new_media' )->site_bg}{$zbp->Config( 'new_media' )->site_bg}{else}{$host}zb_users/theme/{$theme}/style/images/side-bg.jpg{/if}')"> 
    <img src="{if $zbp->Config('new_media')->site_avatar}{$zbp->Config('new_media')->site_avatar}{else}{$host}zb_users/theme/{$theme}/include/0.png{/if}">
    <div class="info">
      <h5>{$zbp->Config('new_media')->site_title}</h5>
      <p>{$zbp->Config('new_media')->site_intro}</p>
    </div>
  </div>
  <ul class="list2">
    {php}
    $w=array();
    $w[]=array('=','log_AuthorID',$article->Author->ID);
    $w[] = array('=', 'log_Status', 0);
    $s='';
    $or=array('log_PostTime'=>'DESC');
    $newlist_array=$zbp->GetArticleList($s,$w,$or,array(5),null,false);
    {/php}
    {if $newlist_array}
    {foreach $newlist_array as $mynew}
    <li><a href="{$mynew.Url}" target="_blank">{$mynew.Title}</a></li>
    {/foreach}
    {else}
    <li>尚未发布任何文章~</li>
    {/if}
  </ul>
  {else}
  <p>作者侧边栏仅能在文章页显示，请拖到对应侧栏！</p>
  {/if} </div>
<div class="clear"></div>
{elseif $module.FileName=='shuju'}
{php}
$strwen = GetValueInArrayByCurrent($zbp->db->Query('SELECT COUNT(*) AS num FROM ' . $GLOBALS['table']['Post'] . ' WHERE log_Type=\'0\''), 'num');     	  	   
$strping = $zbp->cache->all_comment_nums;    			  	 	
$strliu = $zbp->option['ZC_VIEWNUMS_TURNOFF'] == true ? 0 : GetValueInArrayByCurrent($zbp->db->Query('SELECT SUM(log_ViewNums) AS num FROM ' . $GLOBALS['table']['Post']), 'num');
{/php}
<section id="aside_about" class="widget widget_aside_about sb br mb">
  <div class="avatar" style="background:url('{if $zbp->Config( 'new_media' )->site_bg}{$zbp->Config( 'new_media' )->site_bg}{else}{$host}zb_users/theme/{$theme}/style/images/side-bg.jpg{/if}')">
      <img class="img" src="{if $zbp->Config('new_media')->site_avatar}{$zbp->Config('new_media')->site_avatar}{else}{$host}zb_users/theme/{$theme}/include/0.png{/if}" alt="{$name}"/></div>
  <div class="wrap pd">
    <p class="title">{$zbp->Config('new_media')->site_title}</p>
    <p class="info">{$zbp->Config('new_media')->site_intro}</p>
    <ul class="ul clearfix">
      <li class="li fl liness" ><span class="num">{$strwen}</span><small>文章数</small></li>
      <li class="li fl liness"><span class="num">{$strliu}</span><small>阅读数</small></li>
      <li class="li fl"><span class="num">{$strping}</span><small>评论数</small></li>
    </ul>
  </div>
</section>
<div class="clear"></div>
{elseif $module.FileName=='reping'}
<div class="widget widget_previous">
  <h4 class="bar">热评文章</h4>
  <ul>
    {$array = new_media_Get_Links( 'comm', '10', '' );}
    {foreach $array as $post}
    <li><a href="{$post.Url}" target="_blank">{$post.Title}</a></li>
    {/foreach}
  </ul>
</div>
<div class="clear"></div>

{elseif $module.FileName=='remen'}
  <div class="widgets">
      <h4 class="bar">热门文章</h4>
      <div class="hot-post">
        <ul>
          {$array = new_media_Get_Links( 'hot', '6', '' );}
            {foreach $array as $key=>$hotpost}{$i = $key+1}
          <li class="cl">
              <a href="{$hotpost.Url}" title="{$hotpost.Title}" target="_blank">
              <span class="img-box mb5"><img src="{if $hotpost->Metas->pic}{$hotpost->Metas->pic}{elseif $zbp->Config('new_media')->thumb2}{new_media_thumb2($hotpost,180,125,0)}{else}{new_media_thumbnail($hotpost)}{/if}"  alt="{$hotpost.Title}" /></span>
              <b class="sptit">{$hotpost.Title}</b> 
              </a> 
              <span class="op"><i class="iconfont icon-calendar-fill"></i>{$hotpost.Time('Y-m-d H:i:s')}</span> 
              
          </li>
          {/foreach}
        </ul>
      </div>
  </div>
<div class="clear"></div>
{else}

{if $module.Type=='ul'}
<div class="widget widget_{$module.FileName}"> {if (!$module.IsHideTitle)&&($module.Name)}
  <h4 class="bar">{$module.Name}</h4>
  {/if}
  <ul>
    {$module.Content}
  </ul>
</div>
{/if}
{if $module.Type=='div'}
<div class="widget widget_{$module.FileName}"> {if (!$module.IsHideTitle)&&($module.Name)}
  <h4 class="bar">{$module.Name}</h4>
  {/if}
  <div class="widget_div">{$module.Content}</div>
</div>
{/if}

{/if}