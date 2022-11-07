<?php echo'404';die();?>
{if $type=='article'}
<title>{if $article->Metas->new_media_articletitle}{$article->Metas->new_media_articletitle}-{$name}{else}{$title}-{$name}{/if}</title>
{php}
$aryTags = array();
foreach($article->Tags as $key){$aryTags[] = $key->Name;}
if(count($aryTags)>0){$keywords = implode(',',$aryTags);} else {$keywords = $zbp->name;}
$description = trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...';
{/php}
<meta name="keywords" content="{if $article->Metas->new_media_articlekeywords}{$article->Metas->new_media_articlekeywords}{else}{$keywords}{/if}" />
<meta name="description" content="{if $article->Metas->new_media_articledescription}{$article->Metas->new_media_articledescription}{else}{$description}{/if}" />
<meta name="author" content="{$article.Author.StaticName}" />
{if $article.Prev}<link rel='prev' title='{$article.Prev.Title}' href='{$article.Prev.Url}'/>{/if}
{if $article.Next}<link rel='next' title='{$article.Next.Title}' href='{$article.Next.Url}'/>{/if}
{elseif $type=='page'}
<title>{$title}-{$name}-{$subname}</title>
<meta name="keywords" content="{$title},{$name}" />
{php}
$description = trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...';
{/php}
<meta name="description" content="{$description}" />
{elseif $type=='index'}
<title>{if $zbp->Config('new_media')->index_title&&$page=='1'}{$zbp->Config('new_media')->index_title}{else}{$name}{if $page>'1'}_第{$pagebar.PageNow}页{/if}-{$subname}{/if}</title>
{if $zbp->Config('new_media')->index_keywords}<meta name="Keywords" content="{$zbp->Config('new_media')->index_keywords}" />
{/if}
{if $zbp->Config('new_media')->index_description}<meta name="description" content="{$zbp->Config('new_media')->index_description}" />{/if}
{elseif $type=='tag'}
<title>{if $tag->Metas->new_media_tagtitle}{$tag.Metas.new_media_tagtitle}{if $page>'1'}_第{$pagebar.PageNow}页{/if}{else}{$tag.Name}-{$name}{if $page>'1'}_第{$pagebar.PageNow}页{/if}-{$subname}{/if}</title>
<meta name="Keywords" content="{if $tag->Metas->new_media_tagkeywords}{$tag.Metas.new_media_tagkeywords}{else}{$tag.Name}{/if}">
{if $tag.Intro || $tag->Metas->new_media_tagdescription}<meta name="description" content="{if $tag->Metas->new_media_tagdescription}{$tag.Metas.new_media_tagdescription}{else}{$tag.Intro}{/if}">{/if}
{elseif $type=='category'}
<title>{if $category->Metas->new_media_catetitle}{$category->Metas->new_media_catetitle}{if $page>'1'}_第{$pagebar.PageNow}页{/if}{else}{$title}-{$name}{/if}</title>
<meta name="Keywords" content="{if $category->Metas->new_media_catekeywords}{$category.Metas.new_media_catekeywords}{else}{$title},{$name}{/if}" />
<meta name="description" content="{if $category->Metas->new_media_catedescription}{$category.Metas.new_media_catedescription}{else}{$title}-{$name}{/if}" />
{else}
<title>{$title}-{$name}</title>
<meta name="Keywords" content="{$title},{$name}" />
<meta name="description" content="{$title}-{$name}{if $page>'1'}_当前是第{$pagebar.PageNow}页{/if}" />
{/if}