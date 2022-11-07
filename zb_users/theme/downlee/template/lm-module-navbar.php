<li class="{$id}-item {if count($item.subs)}menu-item-has-children{/if}">
  <a href="{$item.href}" target="{$item.target}" title="{$item.title}">{$item.ico}{$item.text}</a>
  {if count($item.subs)}
  <ul class="sub-menu">
    {foreach $item.subs as $item}{template:lm-module-navbar}{/foreach}
  </ul>
  {/if}
</li>